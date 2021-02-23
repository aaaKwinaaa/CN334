<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role_id == 1){
            return redirect()->route('admin.home');
        }else if(auth()->user()->role_id == 2){
            return redirect()->route('reviewer.home');
        }else {
            return redirect()->route('restaurant.home');
        }
       
    }
     
    public function adminHome()
    {
        return view('Admin.adminHome');
    }

    public function reviewerHome()
    {
        return view('Reviewer.reviewerHome');
    }

    public function restaurantHome()
    {
        return view('Restaurant.restaurantHome');
    }
}
