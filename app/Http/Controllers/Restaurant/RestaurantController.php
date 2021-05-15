<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Review;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::all();
        return view('restaurant.restaurantHome',compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => '',
            'detail' => '',
            'phone' => '',
            'image' => '',
            'user_id' => '',
            
        ]);
        
        $restaurants = new Restaurant;
        $restaurants->restaurant_name = $request->restaurant_name;
        $restaurants->detail = $request->detail;
        $restaurants->phone = $request->phone;


        // $restaurants->photo = $request->image;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/restaurant/', $filename);
            $restaurants->photo = $filename;
        }else{
            $restaurants->photo = '';

        }
        $restaurants->user_id = auth()->user()->id;
        $restaurants->status_approve = false;
        $restaurants->status_active = false;
        $restaurants->save();

        return redirect()->route('restaurant.manage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::where('Restaurant_restaurant_id', $id);
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
            'name' => [ 'string', 'max:255'],
            'detail' => [ 'string', 'max:255'],
            'phone' => [ 'string', ],
            'image' => '',
        ]);
        
        $rerstaurantEdit = Restaurant::find($id);
        $rerstaurantEdit->restaurant_Name = $request->name;
        $rerstaurantEdit->detail = $request->detail;
        $rerstaurantEdit->phone = $request->phone;
        $rerstaurantEdit->status_approve = false;

        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('image/restaurant/', $filename);
        //     $rerstaurantEdit->photo = $filename;
        // }else{
        //     $rerstaurantEdit->photo = '';

        // }

        $rerstaurantEdit->save();

        return redirect()->route('restaurant.manage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reviewThisRestaraurant = Review::where('Restaurant_restaurant_id', $id); 
        $reviewThisRestaraurant->delete();
 
        $reject = Restaurant::find($id);
        $reject->delete();
        

        return redirect()->route('restaurant.manage.index');
    }

  
}
