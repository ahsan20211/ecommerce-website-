<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use App\Models\Product;
use App\Models\Client;
use App\Models\Order;
use App\Models\Order_items;
use Crypt;
use Faker\Guesser\Name;
use Laravel\Socialite\Facades\Socialite;

use function Monolog\alert;


class PageController extends Controller
{

    public function index()

    {
        $productData = Product::with('category', 'brand')->limit(4)->get();
        return view('frontend.Pages.home', compact('productData'));
    }


    public function dummyData()
    {

        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        if ($response->successful()) {
            $dummyProduct = $response->json();
            //return response()->json($dummyProduct);
            //            dd($dummyProduct);
            return view('frontend.Pages.home', compact('dummyProduct'));
        } else {
            return abort(500, 'Error fetching users');
        }
    }

    public function product_detail($id)
    {
        $show = Product::find($id);
        return view('frontend.Pages.product_detail', compact('show'));
    }

    public function view_cart()
    {

        $cart = session()->get('cart', []);
        //dd($cart);
        //session()->forget('cart');
        return view('frontend.Pages.view-cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {

        //        dd($request->all());
        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {

            $cart[$request->product_id]['product_qty'] += $request->productQuantity;
        } else {
            $cart[$request->product_id] = [

                'product_id' => $request->product_id,
                'product_qty' => $request->productQuantity,
                'productTitle' => $request->productTitle,
                'productCategory' => $request->productCategory,
                'productImg' => $request->productImg,
                'productPrice' => $request->productPrice

            ];
        }
        session()->put('cart', $cart);
        return response()->json(['success' => 'Product added to cart successfully!']);
    }

    public function deleteCart(string $id)

    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect('/view-cart');
    }


    public function edit(string $id) {}

    public function update(Request $request, string $id) {}

    public function increment(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if ($cart[$id]) {

            $cart[$id]['product_qty'] += 1;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function decrement(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['product_qty'] > 1) {
                $cart[$id]['product_qty'] -= 1;
            } else {

                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function checkout(Request $request)

    {

        $request->validate([

            'address' => 'required',
            'f_name' => 'required',
            'country' => 'required',
            'l_name' => 'required',

        ]);
        //        dd($request->all());
        $cart = session()->get('cart', []);
        if (empty($cart)) {

            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        DB::transaction(function () use ($request, $cart) {
            $auth = Auth::user()->id;
            $order = new Order();
            $order->l_name = $request->l_name;
            $order->f_name = $request->f_name;
            $order->address = $request->address;
            $order->country = $request->country;
            $order->total_price = $request->total_price;
            $order->user_id = $auth;

            foreach ($cart as $details) {

                $order_items = new Order_items();
                $order_items->user_id = $auth;
                $order_items->title = $details['productTitle'];
                $order_items->product_id = $details['product_id'];
                $order_items->quantity = $details['product_qty'];
                $order_items->category = $details['productCategory'];
                $order_items->price = $details['productPrice'];
                $order_items->save();
            }
            $order->save();
        });

        session()->forget('cart');
        return redirect('/')->with('success', 'Order placed successfully!');
    }

    public function redirect()
    {

        return Socialite::driver('google')->redirect();
    }

    // public function callbackGoogle()
    // {
    //     try {

    //         $google_user  = Socialite::driver('google')->user();
    //         // dd($google_user);

    //         $user = Client::where('google_id', $google_user->getId())->first();
    //         if (!$user) {
    //             $new_user = Client::create(
    //                 [
    //                     'name' => $google_user->getName(),
    //                     'email' => $google_user->getEmail(),
    //                     'google_id' => $google_user->getId(),

    //                 ]);

    //                 Auth::guard('client')->login($user);
    //                 return redirect()->intended('/');
    //         }
    //         else{
    //             Auth::login(  $user );
    //             return redirect()->intended('/');

    //         }
    //     } 
    //     catch (\Throwable $th) {
    //         dd('something went wrong' .$th->getMessage());


    //     }
    // }



    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = Client::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $user = Client::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);
            }

            Auth::guard('client')->login($user);

            return redirect()->intended('/');
        } catch (\Throwable $th) {
            dd('Something went wrong: ' . $th->getMessage());
        }
    }
}
