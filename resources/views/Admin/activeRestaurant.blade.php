@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl">
            <div class="table-wrapper" >
                <div class="table-title">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <h1 ><b class=" text-info "> Active </b><b class=" text-secondary" > Restaurant </b> </h1>
                        </div>
                    </div>

                    <table class="table table-striped table-dark  mt-3 "  >
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
                                @if ($item->status_active == 1)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->restaurant_Name}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>
                                                {{-- <img src="{{ asset($item->photo)}}" style="width:100px; height:100px;"> --}}
                                                <img src="{{ asset('image/restaurant/'.$item->photo)}}" style="width: 155px" alt="Image" > 

                                            </td>
                                            <td>

                                                <form  action="{{ route('admin.active.destroy', $item->id) }}"  method="POST" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Delete" >
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                @endif 
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