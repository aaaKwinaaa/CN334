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

    .chipRestaurant {
            display: inline-block;
            padding: 0 20px;
            height: 120px;
            width: 100%;
            font-size: 16px;
            line-height: 30px;
            border-radius: 5px;
            border: 1px solid rgb(196, 231, 255);
            background-color: #ffffff;
            box-shadow: 8px 8px 8px 0px rgba(0,0,0,0.2);
          }
</style>
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="container-xl ">
            <div class="row">
                <div class="col" >
                    <h2>
                        <b class="" style="color:rgb(161, 161, 161); margin-left:300px;">{{$data[2]}} comments</b>
                        
                        <svg class="svg-icon" viewBox="0 0 20 20" style="width:25px;display: inline-flex;align-self: center;position: relative;">
                            <path d="M17.211,3.39H2.788c-0.22,0-0.4,0.18-0.4,0.4v9.614c0,0.221,0.181,0.402,0.4,0.402h3.206v2.402c0,0.363,0.429,0.533,0.683,0.285l2.72-2.688h7.814c0.221,0,0.401-0.182,0.401-0.402V3.79C17.612,3.569,17.432,3.39,17.211,3.39M16.811,13.004H9.232c-0.106,0-0.206,0.043-0.282,0.117L6.795,15.25v-1.846c0-0.219-0.18-0.4-0.401-0.4H3.189V4.19h13.622V13.004z"></path>
                        </svg>
                    </h2>

                    <h5 class="card-text mt-5 mx-3"><b>Rate Review : {{$data[1]}}</b>
                        <span style="font-size:25px;color:rgb(255, 208, 0);" >&starf;</span> 
                    </h5>
                    <br>
                    <div id="style-1" class="row"  style=" width:900px; max-height:400px; overflow-y: scroll;  ">
                        <div class="col" > 
                            @foreach ($data[0] as $item)
                                <p class="chipRestaurant" >
                                    <b>{{$item->user->name}} :</b> 
                                    @for ($i = 0; $i < $item->rating; $i++)
                                        <span style="font-size:15px;color:rgb(255, 208, 0);">&starf;</span>
                                    @endfor
                                    <br>
                                    {{$item->detail}}
                                </p>
                            @endforeach
                       </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</div>         
 
@endsection
