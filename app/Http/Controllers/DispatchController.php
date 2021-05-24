<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Restaurant;
use App\Models\Review;

class DispatchController extends Controller
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
        }else if(auth()->user()->role_id == 3){
            return redirect()->route('restaurant.home');
        }else{
            return view('welcome2');
        }
       
    }
     
    public function adminHome()
    {
        
        return redirect()->route('admin.task.index');
    }

    public function reviewerHome()
    {
        return redirect()->route('reviewer.page.index');
    }

    public function restaurantHome()
    {
        return redirect()->route('retaurant.manage.index');
    }
}
