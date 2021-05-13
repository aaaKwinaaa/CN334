@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl">
            <div class="row">
                <div class="col-sm-6">
                    <h2 ><b class=" text-white "> Task </b><b class=" text-secondary" > Request Restaurant </b> </h2>
                
                    <h4 class=" text-white "> Name Restaurant : {{$restaurantDetail->restaurant_Name}}</h4>
                    <p class=" text-white "> Owner Name : {{$restaurantDetail->user->name}}</p>
                    <p class=" text-white ">Detail : {{$restaurantDetail->detail}}</p>
                    <p class=" text-white ">Phone : {{$restaurantDetail->phone}} </p>
                    <img src="{{ asset('image/restaurant/'.$restaurantDetail->photo)}}" style="width: 300px" alt="Image" > 
                    <br>
                    <br>

                    <form  action="{{ route('admin.task.update', $restaurantDetail->id) }}"  method="post" style="display: inline-block;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="submit" class="btn btn-success" value="Approve" >
                        
                    </form>
                
                    <form  action="{{ route('admin.task.destroy', $restaurantDetail->id) }}"  method="POST" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-xs btn-danger" value="Reject" >
                        
                    </form>
                </div>
            </div>     
        </div>
    </div>
</div>
@endsection
