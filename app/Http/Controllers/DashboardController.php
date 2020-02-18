<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function login()
    {
    	if (Auth::check() == 'true') {
    		return redirect()->back();
    	}else{
    		return view('login');
    	}
    }

    public function home()
    {
    	return view('home');
    }

    public function search()
    {
        return view('search');
    }

    public function detailProduct()
    {   
        return view('detail-product');
    }

    public function profile(Request $request)
    {
       $cart = $request->session()->get('cart');

       

    return view('profile', compact('cart'));

        // return view('profile');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

}
