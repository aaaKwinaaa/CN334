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
           
                

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    You are Restaurant.
                </div> --}}
                @csrf
                @foreach ($restaurant as $item )
                @if ( Auth::user()->id == $item->user_id)
                    {{-- <div class="">
                        <div class="container mt-3 card" style="background-color: rgb(170, 170, 170);box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                            <h4><b>Restaurant Name : {{$item->restaurant_Name}}</b></h4> 
                            <p>Discription : {{$item->detail}}</p> 
                            <p>Phone NUmber : {{$item->phone}}</p>
                            <img src="{{ asset('image/restaurant/'.$item->photo)}}" width="100px" alt="Image" >
                        </div>
                    </div> --}}

                

                      <div class="card p-3 mt-5 d-flex justify-content-center" style="width: 100%">
                        <div class="d-flex align-items-center">
                            <div class="image"> <img src="{{ asset('image/restaurant/'.$item->photo)}}" style="width: 155px" alt="Image" > </div>
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
                        </div>
                    </div>
                @endif
                

                @endforeach 
                    
              
        </div>
    </div>
</div>




@endsection
