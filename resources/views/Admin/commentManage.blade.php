@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl">
            <div class="row">
                <h1 class="mx-3" ><b  style="color: rgb(87, 150, 243)"> All </b><b style="color: rgb(255, 255, 255)" >  Comment </b> </h1>
                <div class="col-sm-12  tablecomment  mt-3" >
                    <table class="table table-striped table-dark  "  >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name Review</th>
                                <th>Detail</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        

                        @foreach ($comment as $key => $item )
                       
                        <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->detail}}</td>
                                    <td>{{$item->rating}}</td>
                                    <td>

                                        <form  action="{{ route('admin.comment.destroy', $item->id) }}"  method="POST" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete" >
                                            
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
