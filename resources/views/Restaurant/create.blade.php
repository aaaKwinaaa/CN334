@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
               
                <h2>Create Restaurant</h2>

                <form method="POST" action="{{ route('restaurant.manage.store') }}" >
                    @csrf

                    <div class="form-group row" >
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Name') }}</label>
                        <div class="col-md-6">
                            <input id="restaurant_name" type="text" class="form-control " name="restaurant_name" value="{{ old('restaurant_name') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Detail') }}</label>
                        <div class="col-md-6">
                            <input id="detail" type="text" class="form-control " name="detail" value="{{ old('detail') }}" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-6">
                            <input type="text" id="phone" name="phone" class="form-control "  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                            <small>Format: 090-123-4567</small><br><br>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                        <div class="col-md-6">
                            <input type="file" id="image" name="image"  accept="image/png, image/jpeg, image/jpg">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Create Restaurant') }}
                            </button>
                        </div>
                    </div>
                </form>
                
        
    </div>
</div>
@endsection
