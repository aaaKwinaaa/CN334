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
                                <h2 class="mb-4 mt-4">Restaurant in This Web</h2>
                                <p>All restaurant in this web is waiting you to review.</p>
                            </div>
                        </div>
                    </div>
                    <div class="container-wrap">
                        <div class="row no-gutters d-flex">
                             @foreach ($restaurant as $item) 
                                {{-- <div class="col-lg-4 d-flex ftco-animate fadeInUp ftco-animated">
                                    <div class="services-wrap d-flex">
                                       
                                        <div class="text p-4">
                                            <h3>{{$item->restaurant_Name}}</h3>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia </p>
                                        </div>
                                    </div>
                                </div>  --}}

                                <div class = "card col-4 d-flex ftco-animate fadeInUp ftco-animated  mt-1" style="width:300px">
                                    <img class="card-img-top" src="https://d2eohwa6gpdg50.cloudfront.net/wp-content/uploads/sites/8/2021/03/08111903/Restaurant_201113_1.jpg" alt="Card image" style="width:100%">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->restaurant_Name}}</h5>
                                      <p class="card-text">{{$item->rating}} </p>
                                      <br>
                                      <a class="btn btn-info"  href="{{ route('reviewer.page.show', $item->id) }}" title="view">
                                        <i class="fas fa-eye text-success  fa-lg"></i> View
                                      </a>
                                      

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


</div>

@endsection





