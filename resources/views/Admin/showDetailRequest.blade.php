@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 ><b class="bg-secondary text-white "> Task </b><b class=" bg-warning text-dark" > Request Restaurant </b> </h2>
                            </div>
                            <div class="col-sm-6">	
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name Restaurant</th>
                                <th>Owner Name</th>
                                <th>Detail</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach ($restaurant as $key => $item )
                        <tbody>
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->restaurant_Name}}</td>
                                <td>{{$item->detail}}</td>
                                <td>{{$item->detail}}</td>
                                <td>{{$item->phone}}</td>
                                <td><img src="<?php echo $item->photo; ?>"></td>
                                <td><button  class="btn btn-success"  >Approve</button>
                                    <button class="btn btn-danger" >Reject</button>
                                </td>
                        
                            </tr>
                        </tbody>
                        @endforeach 
                    </table>
                    
                </div>
                
            </div>        
        </div>
    </div>
    </div>
</div>
@endsection
