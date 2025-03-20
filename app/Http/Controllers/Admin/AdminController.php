<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Admin;
use function Monolog\alert;


class AdminController extends Controller
{

    public function register()
    {

        return view('Admin.auth.register');
    }


    public function store(Request $request)
    {
        $siteusers = new Admin();
        $siteusers->name = $request->name;
        $siteusers->email = $request->email;
        $siteusers->password = md5($request->password);
        $siteusers->number = $request->number;
        $siteusers->save();
        return redirect('/admin/login');
    }

    public function login(Request $request)

    {
        return view('Admin.auth.login');

    }

    public function loginStore(Request $request)
    {
        $user = Admin::where('email', $request->input('email'))
            ->where('password', md5($request->input('password')))
            ->first();
        if ($user) {
            Auth::guard('admin')->login($user);
            return redirect('/admin/product');
        }
        return redirect()->back()->with('error', 'Email or password incorrect');
    }


}
