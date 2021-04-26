@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('restaurant.manage.create') }}"  class="btn btn-info col-md-3 " >Create Restaurant</a>
                

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
                    <div class="card">
                        <img src="{{$item->photo}}"  style="width:100%">
                        <div class="container">
                            <h4><b>{{$item->restaurant_Name}}</b></h4> 
                            <p>{{$item->detail}}</p> 
                            <p>{{$item->phone}}</p>
                        </div>
                    </div>
                @endif
                

                @endforeach 
                    
              
        </div>
    </div>
</div>




@endsection
