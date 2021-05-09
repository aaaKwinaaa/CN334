@extends('layouts.app')

@section('content')
<div class="container">
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

                                <div class = "card col-3 d-flex ftco-animate fadeInUp ftco-animated  mt-1" style="width:300px">
                                    <img class="card-img-top" src="https://d2eohwa6gpdg50.cloudfront.net/wp-content/uploads/sites/8/2021/03/08111903/Restaurant_201113_1.jpg" alt="Card image" style="width:100%">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->restaurant_Name}}</h5>
                                      <p class="card-text">{{$item->score}} 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                      </p>
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





