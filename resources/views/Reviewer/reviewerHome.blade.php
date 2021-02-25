@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    You are Reviewer.
                </div> --}}

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
                            <div class="col-lg-4 d-flex ftco-animate fadeInUp ftco-animated">
                                <div class="services-wrap d-flex">
                                    <a href="#" class="img" style="background-image: url(images/pizza-1.jpg);"></a>
                                    <div class="text p-4">
                                        <h3>Italian Pizza</h3>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            {{-- </div>
        </div> --}}
    </div>
</div>
@endsection
