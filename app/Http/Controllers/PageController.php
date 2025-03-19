<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Client;
use Crypt;
use function Monolog\alert;


class PageController extends Controller
{

    public function index()

    {
        $productData = Product::with('category', 'brand')->limit(4)->get();
        return view('frontend.Pages.home', compact('productData'));

    }

    public function product_detail($id)
    {
        $show = Product::find($id);
        return view('frontend.Pages.product_detail', compact('show'));

    }

    public function view_cart()
    {

        $cart = session()->get('cart', []);
//         dd($cart);
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


    public function edit(string $id)
    {


    }

    public function update(Request $request, string $id)
    {


    }

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


}
