@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl">
            <div class="row">
                <div class="col-sm-6">
                    <h2 ><b class=" text-white "> Task </b><b class=" text-secondary" > Request Restaurant </b> </h2>
                
                    <h4 class=" text-white "> Name Restaurant : {{$restaurantDetail->restaurant_Name}}</h4>
                    <p class=" text-white "> Owner Name : {{$restaurantDetail->detail}}</p>
                    <p class=" text-white ">Detail : {{$restaurantDetail->detail}}</p>
                    <p class=" text-white ">Phone : {{$restaurantDetail->phone}} </p>
                    <?php echo '<img src="data:image/JPG;base64,'.base64_encode($restaurantDetail->photo).'"/>'; ?>
                    <p class=" text-white ">Image : <img src="<?php echo $restaurantDetail->photo; ?>"></p> 
                    <p class=" text-white " >Actions</p>
                    <button  class="btn btn-success"  >Approve</button>
                    <button class="btn btn-danger" >Reject</button>
                </div>
            </div>     
        </div>
    </div>
</div>
@endsection
