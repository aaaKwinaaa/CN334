@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl">
            
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                         <div class="col-sm-6">
                            <h2 ><b class=" text-white "> Task </b><b class=" text-secondary" > Request Restaurant </b> </h2>
                        </div>
                    </div>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name Restaurant</th>
                                <th>Owner Name</th>
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
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->phone}}</td>
                                <td><img src="{{ asset($item->photo)}}" style="width:100px; height:100px;"></td>
                                <td>
                                    
                                    <a class="btn btn-info"  href="{{ route('admin.task.show', $item->id) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i> Show
                                    </a>

                                    <form  action="{{ route('admin.task.edit', $item->id) }}"  method="POST" style="display: inline-block;">
                                        
                                        <input type="hidden" name="_method" value="Approve">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-success" value="Approve" >
                                        
                                    </form>
                                
                                    <form  action="{{ route('admin.task.destroy', $item->id) }}"  method="POST" style="display: inline-block;">
                                        
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Reject" >
                                        
                                    </form>
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
@endsection
