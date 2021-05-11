@extends('layouts.layout')

@section('content')


<div class="container mt-3" >
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if (count($restaurant) == 0)
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
                                        <div class="d-flex flex-column" > <span class="articles">Phone NUmber : {{$item->phone}}</span> </div>
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
                                    
                            
                                <form  action=""  method="POST" style="display: inline-block;">
                                        
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    {{-- <input type="submit" class="btn btn-xs btn-danger " value="Delete" >  --}}
                                    <button type="submit" class="btn btn-secondary" value="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            
                        </div>
                    @endif
                

                @endforeach 
                    
              
        </div>
    </div>
</div>




@endsection
