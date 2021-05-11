@extends('layouts.layout')

@section('content')

<style>
    .rating {
        float:left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
    follow these rules. Every browser that supports :checked also supports :not(), so
    it doesn’t make the test unnecessarily selective */
    .rating:not(:checked) > input {
        position:absolute;
        top:-9999px;
        clip:rect(0,0,0,0);
    }

    .rating:not(:checked) > label {
        float:right;
        width:1em;
        padding:0 .1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:200%;
        line-height:1.2;
        color:#ddd;
        text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
    }

    .rating:not(:checked) > label:before {
        content: '★ ';
    }

    .rating > input:checked ~ label {
        color: #f70;
        text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
    }

    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
        color: gold;
        text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
    }

    .rating > input:checked + label:hover,
    .rating > input:checked + label:hover ~ label,
    .rating > input:checked ~ label:hover,
    .rating > input:checked ~ label:hover ~ label,
    .rating > label:hover ~ input:checked ~ label {
        color: #ea0;
        text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
    }

    .rating > label:active {
        position:relative;
        top:2px;
        left:2px;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="container-xl ">
            <div class="row">
                <div class="col-sm-6 card " style="width: 700px ; height:600px">
                    <br>
                    <h4>Name Restaurant : {{$data[0]->restaurant_Name}}</h4>
                    <p class="card-text">Rate Review : {{$data[0]->rating}}
                        <span style="font-size:25px;color:rgb(255, 255, 50);" >&starf;</span>
                    </p>
                    <img class="card-img-top" src="https://d2eohwa6gpdg50.cloudfront.net/wp-content/uploads/sites/8/2021/03/08111903/Restaurant_201113_1.jpg" alt="Card image" style="width:100%">
                    <br>
                    <p class="card-text">Detail : {{$data[0]->detail}} </p>
                    <p class="card-text">Phone : {{$data[0]->phone}} </p>
                    
                </div>
                <div class="col-sm-6" >
                    <div id="review">
                        <div class="col-sm-6 card " style="width:100% ;"> 
                            <?php
                            // print_r($data[1])    
                            ?>
                            @foreach ($data[1] as $item)
                                    {{$item->user->name }} : 
                                    {{$item->detail}}
                                    {{$item->rating}}
                                    <br>
                            @endforeach
                       </div>
                    </div>
                    <div>
                        <!-- Write Review Form  -->
                        <br>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#reviewModal">Review</a>
                        <!-- Modal -->
                        <form method="POST" action="{{ route('reviewer.page.store') }}" >
                            @csrf
                            <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Write Review</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="reviewForm" action="#" >
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Review</label>
                                                    <input id="detail" type="text" class="form-control " name="detail" value="{{ old('detail') }}"  required />
                                                
                                                </div>
                                                
                                                <fieldset class="rating">
                                                    <legend>Please rate:</legend>
                                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                                </fieldset>
                                                

                                                <div class="form-group" hidden>
                                                    <label for="name">Restaurant ID</label>
                                                    <input id="resturant_id" type="text" class="form-control " name="resturant_id" value="{{$data[0]->id}}" required />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">SEND</button> 
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div> 
               
        </div>
    </div>
</div>
@endsection
