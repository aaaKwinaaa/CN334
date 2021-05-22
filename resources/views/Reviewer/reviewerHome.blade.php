@extends('layouts.layout')

@section('content')
<div class="container mt-5" >
    <div class="justify-content-center">
        <div class="">
            <div class="card">
                <section class="ftco-section">
                    <div class="container">
                        <div class="row justify-content-center mb-5 pb-3">
                            <div class="col-md-7 heading-section ftco-animate text-center fadeInUp ftco-animated">
                                {{-- <img  src="{{ asset('image/revoir-icon.png')}}"  class="mt-3"  style="height:50px"> --}}
                                <h2 class="mb-4 mt-4">Restaurant on This Web</h2>
                                <p>All restaurant in this web is waiting you to review.</p>
                            </div>
                        </div>
                    </div>
                   
                    <div class="container-wrap">
                        <div class="row no-gutters d-flex">
                             @foreach ($data[0] as $item) 
                                @if ($item->status_active == true)
                                    <div class = "card col-3 d-flex ftco-animate fadeInUp ftco-animated  mt-1 " style="width:300px; ">
                                        <img src="{{ asset('image/restaurant/'.$item->photo)}}"  alt="Card image" style="height:175px">
                                        <div class="card-body">
                                            <h6 class="card-title">{{$item->restaurant_Name}}</h6>
                                            {{-- <p class="card-text">{{$item->rating}} <span style="font-size:25px;color:rgb(255, 217, 0);" >&starf;</span> </p> --}}
                                            <br>
                                            <a class="btn btn-info"  href="{{ route('reviewer.page.show', $item->id) }}" title="view">
                                                View Restaurant 
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


</div>

@endsection





