<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Restaurant;

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
        $dashboard = Restaurant::all();
        $wait = 0;
        $approved = 0;
        $active = 0;
        $unActive = 0;
        foreach($dashboard as $item){

            //Check Status Approve
            if($item->status_approve != true){    
                $wait +=1;
            }else{
                $approved +=1;
            }
        
            //Check Status Active
            if ($item->status_active == true) {
                $active +=1;
            }else{
                $unActive +=1;
            }
        }
        
        //Add to Array 
        $data = [$wait,$approved,$active,$unActive];
        return view('Admin.adminHome',compact('data'));
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
