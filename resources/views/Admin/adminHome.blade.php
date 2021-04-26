@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-4">
        
                <button onclick="{location.href='{{route('admin.task.index')}}'}" class="card"style="width:300px; height:120px; background-color:#F99D20;" >
                    <div class="container">
                        <h4 class="mt-3 "><b>Waiting Approve </b></h4>
                        <p style=" font-size:35px"><b>{{$data[0]}}</b></p> 
                    </div>
                </button>  
            
        </div>
        {{-- <div class="col-4">
            <button onclick="" class="card"style="width:300px; height:120px; background-color:#60FF3F;" >
                <div class="container">
                    <h4 class="mt-3 "><b>Approved Restaurants </b></h4>
                    <p style=" font-size:35px"><b>{{$data[1]}}</b></p> 
                </div>
            </button>
        </div> --}}
        <div class="col-4">
            <button onclick="" class="card"style="width:300px; height:120px; background-color:#6f96ff;" >
                <div class="container">
                    <h4 class="mt-3"><b>Active Status</b></h4>
                    <p style=" font-size:35px"><b>{{$data[2]}}</b></p> 
                </div>
            </button>
        </div>
        
    </div>
</div>
@endsection

