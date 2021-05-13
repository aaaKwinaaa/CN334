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


    #style-1::-webkit-scrollbar
    {
        width: 12px;
        border-radius: 25px;
        background-color: #00000018;
    }

    #style-1::-webkit-scrollbar-thumb
    {
        border-radius: 25px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: rgb(78, 78, 78);
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="container-xl ">
            <div class="row">
                <div class="col-sm-6 card " style="width: 700px ; height:600px">
                    <br>
                    <h4>Name Restaurant : {{$data[0]->restaurant_Name}}</h4>
                    <p class="card-text">Rate Review : {{$data[2]}}
                        <span style="font-size:25px;color:rgb(255, 208, 0);" >&starf;</span> 
                    </p>
                    <img src="{{ asset('image/restaurant/'.$data[0]->photo)}}"  alt="Card image" style="height:350px">
                    <br>
                    <p class="card-text">Detail : {{$data[0]->detail}} </p>
                    <p class="card-text">Phone : {{$data[0]->phone}} </p>
                    
                </div>
                <div class="col-sm-6" >
                    <h5 >
                        <b class="" style="color:rgb(161, 161, 161); margin-left:150px;">{{$data[3]}} comments</b>
                        
                            <svg class="svg-icon" viewBox="0 0 20 20" style="width:25px;display: inline-flex;align-self: center;position: relative;">
                                <path d="M17.211,3.39H2.788c-0.22,0-0.4,0.18-0.4,0.4v9.614c0,0.221,0.181,0.402,0.4,0.402h3.206v2.402c0,0.363,0.429,0.533,0.683,0.285l2.72-2.688h7.814c0.221,0,0.401-0.182,0.401-0.402V3.79C17.612,3.569,17.432,3.39,17.211,3.39M16.811,13.004H9.232c-0.106,0-0.206,0.043-0.282,0.117L6.795,15.25v-1.846c0-0.219-0.18-0.4-0.401-0.4H3.189V4.19h13.622V13.004z"></path>
                            </svg>
                       
                    </h5>
  
                    <div id="style-1" class="mt-3" style=" width:400px; margin: auto; height:470px; overflow-y: scroll;  ">
                        <div class="col" > 
                            @foreach ($data[1] as $item)
                                <p class="chip" ><b>{{$item->user->name }} :</b> 
                                     
                                    @for ($i = 0; $i < $item->rating; $i++)
                                        <span style="font-size:15px;color:rgb(255, 208, 0);">&starf;</span>
                                    @endfor
                                    <br>
                                    {{$item->detail}}
                                </p>
                            @endforeach
                       </div>
                    </div>
                    <div style=" margin-left:100px;">
                        <!-- Write Review Form  -->
                        <br>
                        <a href="#" class="btn btn-success mx-5" style="width: 200px;"  data-toggle="modal" data-target="#reviewModal">Review</a>
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
                                                    <input id="detail" type="text" class="form-control " name="detail" value=" {{ old('detail') }}"  required />
                                                
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
