@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl">
            <div class="row">
                <div class="col-sm-6">
                    <h2 ><b class="bg-secondary text-white "> Task </b><b class=" bg-warning text-dark" > Request Restaurant </b> </h2>
                
                    <h4> Name Restaurant : {{$restaurantDetail->restaurant_Name}}</h4>
                    <p> Owner Name : {{$restaurantDetail->detail}}</p>
                    <p>Detail : {{$restaurantDetail->detail}}</p>
                    <p>Phone : {{$restaurantDetail->phone}} </p>
                    <?php echo '<img src="data:image/JPG;base64,'.base64_encode($restaurantDetail->photo).'"/>'; ?>
                    <p>Image : <img src="<?php echo $restaurantDetail->photo; ?>"></p> 
                    <p>Actions</p>
                    <button  class="btn btn-success"  >Approve</button>
                    <button class="btn btn-danger" >Reject</button>
                </div>
            </div>     
        </div>
    </div>
</div>
@endsection
