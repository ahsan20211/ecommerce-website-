<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Client;
use function Monolog\alert;


class ClientController extends Controller
{


    public function register()
    {

        return view('frontend.Pages.register');
    }


    public function store(Request $request)

    {

        $siteusers = new Client();
        $siteusers->name = $request->name;
        $siteusers->email = $request->email;
        $siteusers->password = md5($request->password);
        $siteusers->number = $request->number;
        $siteusers->save();
        return redirect('/home');
    }

    public function login(Request $request)

    {
        return view('frontend.Pages.login');

    }

    public function loginStore(Request $request)
    {
        $user = Client::where('email', $request->input('email'))
            ->where('password', md5($request->input('password')))
            ->first();
        if ($user) {
            Auth::guard('client')->login($user);
            return redirect('/home');
        }
        return redirect()->back()->with('error', 'Email or password incorrect');
    }
git
    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        return redirect('/home')->with('success', 'Logged out successfully');
    }


}
