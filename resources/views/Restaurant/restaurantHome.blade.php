@extends('layouts.layout')

@section('content')


<div class="container mt-5" >
    <div class="row justify-content-center">
        <div class="col-md-8">
                <?php 
                    $enableButton = true;
                    foreach ($restaurant as $key => $value){
                        if($restaurant[$key]->user_id == Auth::user()->id){
                            $enableButton = false;
                        }
                    }
                ?>

                @if ($enableButton)
                    <a href="{{ route('restaurant.manage.create') }}" style="background-color: rgb(169, 169, 255); width:150px;" class="btn col-md-3 "  >Create Restaurant</a>
               
                @else
                    <a href="#" style="background-color: rgb(105, 105, 105); width:150px;" class="btn col-md-3 " >Create Restaurant</a>
                @endif

                @csrf
                @foreach ($restaurant as $item )
                    @if ( Auth::user()->id == $item->user_id)
                        <div class="card p-3 mt-5 d-flex justify-content-center" style="width: 100%">
                            <div class="d-flex align-items-center">
                                <div class="image"> 
                                    <img src="{{ asset('image/restaurant/'.$item->photo)}}" style="width: 155px" alt="Image" > 
                                </div>

                                <div class="ml-3 w-100">
                                    <h4 class="mb-0 mt-0">{{$item->restaurant_Name}}</h4> <span>Discription : {{$item->detail}}</span>
                                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats"style="width: 230px">
                                        <div class="d-flex flex-column" > <span class="articles">Phone Number : {{$item->phone}}</span> </div>
                                    </div>
                                    @if ($item->status_approve == 0)
                                        <div class="p-2 mt-2  d-flex justify-content-between rounded text-white stats" style="width: 150px; background-color: rgb(252, 170, 93);">
                                            <div class="d-flex flex-column"  > <span class="articles">Status : Unavtive</span> </div>
                                        </div>
                                    @else
                                        <div class="p-2 mt-2  d-flex justify-content-between rounded text-black stats" style="width: 150px; background-color: rgb(96, 245, 91);">
                                            <div class="d-flex flex-column"  > <span class="articles">Status : Active</span> </div>
                                        </div>
                                    @endif
                                    
                                </div>

                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#reviewModal" style="display: inline-block;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg>
                                </a>
                                 <!-- Modal -->
                                 <form method="POST" action="{{ route('restaurant.manage.update',$item->id) }}"  enctype="multipart/form-data">
                                    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Restaurant</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="userEditForm"  action="#" >
                                                        @csrf
                                                        @method('PUT')
                                                        {{-- @method('PUT') --}}
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input id="name" type="text" class="form-control " name="name" value="{{ $item->restaurant_Name }}"  />
                                                        
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="detail">Detail</label>
                                                            <input><textarea id="detail" type="text" class="form-control" style="height: 100px" name="detail">{{ $item->detail }}</textarea>
                                                        
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">Phone Number</label>
                                                            <input id="text" type="text" class="form-control" name="phone" value="{{ $item->phone }}"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/>
                                                            <small>Format: 090-123-4567</small><br><br>
                                                        </div>

                                                        {{-- <div class="form-group">
                                                            <label for="name"  >{{ __('Image') }}</label>
                                                            <img src="{{ asset('image/restaurant/'.$item->photo)}}" style="width: 155px" alt="Image" > 
                                                            <input id="image" type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg">
                                                        </div> --}}

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button   type="submit" class="btn btn-primary"  >SAVE</button> 
                                                        </div>
                                                        
                                                        {{-- <button type="submit" class="btn btn-success"  > SAVE </button> --}}
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    
                            
                                <form  action="{{ route('restaurant.manage.destroy', $item->id) }}"  method="POST" style="display: inline-block;">
                                        
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger " value="Delete" > 
                                    
                                    
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                    </svg> --}}

                                    
                                </form>
                            </div>
                            
                        </div>
                    @endif
                

                @endforeach 
                {{-- <div id="review" style="width:800px ;">
                    <div class="col-sm-6 card " > 
                        <?php
                        // print_r($data[1])    
                        ?>
                        @foreach ($data[1] as $item)
                                {{$item->user->name }} : 
                                {{$item->detail}}
                                &starf; {{$item->rating}} 
                                <br>
                        @endforeach
                   </div>
                </div> --}}
                    
              
        </div>
    </div>
</div>




@endsection
