<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Review;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $restaurant = Restaurant::all();
        $data = [$wait,$approved,$active,$unActive,$restaurant];
        return view('Admin.adminHome',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $restaurantDetail = Restaurant::find($id);
        return view('admin.showDetailRequest', compact('restaurantDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status_approve' => '',
            'status_active' => ''
        ]);
        
        $restaurants = Restaurant::find($id);
        $restaurants->status_approve = true;
        $restaurants->status_active = true;
        $restaurants->save();

        return redirect()->route('admin.task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $reviewThisRestaraurant = Review::all()->where('Restaurant_restaurant_id', $id); 
        $reviewThisRestaraurant->delete();


        $reject = Restaurant::find($id);
        $reject->delete();

        return redirect()->route('admin.task.index');
    }
}