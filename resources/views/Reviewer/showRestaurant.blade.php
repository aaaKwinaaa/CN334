@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl ">
            <div class="row">
                <div class="col-sm-6 card " style="width: 700px ; height:600px">
                    <br>
                    <h4>Name Restaurant : {{$data[0]->restaurant_Name}}</h4>
                    <p class="card-text">Rate Review : {{$data[0]->score}}
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
                                    {{$item->point}}
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
