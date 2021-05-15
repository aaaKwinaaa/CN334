@extends('layouts.adminLayout')

@section('content')
<div class="container">
    {{-- Card Dashboard --}}
    <div class="row justify-content-around">
        <div class="col-4">
                <button onclick="{location.href='{{route('admin.task.index')}}'}" class="card"style="width:100%; height:120px; background-color:#F99D20;" >
                    <div class="container">
                        <h4 class="mt-3 "><b>Waiting Approve </b></h4>
                        <p style=" font-size:35px"><b>{{$data[0]}}</b></p> 
                    </div>
                </button>  
            
        </div>
        <div class="col-4">
            <button onclick="{location.href='{{route('admin.comment.index')}}'}" class="card"style="width:100%; height:120px; background-color:#60FF3F;" >
                <div class="container">
                    <h4 class="mt-3 "><b>All Comment </b></h4>
                    <p style=" font-size:35px"><b>{{$data[5]}}</b></p> 
                </div>
            </button>
        </div>
        <div class="col-4">
            <button onclick="{location.href='{{route('admin.active.index')}}'}" class="card"style="width:100%; height:120px; background-color:#6f96ff;" >
                <div class="container">
                    <h4 class="mt-3"><b>Active Status</b></h4>
                    <p style=" font-size:35px"><b>{{$data[2]}}</b></p> 
                    
                </div>
            </button>
        </div>

        
    </div>

    {{-- table Task --}}
    <div class="row justify-content-around mt-5">
        <div class="container-xl">
            
            <div class="table-wrapper" style="width: 100%">
                <div class="table-title">
                    <div class="row">
                         <div class="col-sm-6">
                            <h1 ><b class=" text-white "> Task </b><b class=" text-secondary" > Request Restaurant </b> </h1>
                        </div>
                    </div>

                    <table class="table table-striped table-dark mt-2 " >
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

                        <?php
                            $count = 1;
                        ?>
                        
                        
                        @foreach ($data[4] as $key => $item )
                     
                        <tbody>

                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$item->restaurant_Name}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>
                                        {{-- <img src="{{ asset($item->photo)}}" style="width:100px; height:100px;"> --}}
                                        <img src="{{ asset('image/restaurant/'.$item->photo)}}" style="width: 155px" alt="Image" > 
                                        
                                    </td>
                                    <td>
                                        
                                        <a class="btn btn-info"  href="{{ route('admin.task.show', $item->id) }}" title="show">
                                            <i class="fas fa-eye text-success  fa-lg"></i> Show
                                        </a>

                                        <form  action="{{ route('admin.task.update', $item->id) }}"  method="post" style="display: inline-block;" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="submit" class="btn btn-success" value="Approve" >
                                            
                                        </form>
                                    
                                        <form  action="{{ route('admin.task.destroy', $item->id) }}"  method="POST" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Reject" >
                                            
                                        </form>
                                    </td>
                            
                                </tr>
                                <?php
                                    $count += 1;
                                ?>
                            
                        </tbody>
                        @endforeach 
                    </table>
                </div>
            </div>  
        </div>
    </div>
</div>


{{-- {{!!  $data->link() !!}} --}}
@endsection

