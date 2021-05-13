@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="container-xl">
            <div class="row">
                <div class="col-sm-6">
                    <h2 ><b class=" text-white "> PROFILE Admin</b> </h2>

                    <div class="card p-3 mt-5 d-flex justify-content-center" style="width: 150%">
                        <div class="d-flex align-items-center">
                            <div class="image"> 
                                <img src="https://www.americanaircraftsales.com/wp-content/uploads/2016/09/no-profile-img.jpg" style="width: 155px" alt="Image" > 
                            </div>

                            <div class="ml-3 w-100">
                                <h4 class=" mb-0 mt-0 text-primary "><b>Name: {{$profile->name}}</b></h4><br>
                                <span>Email : {{$profile->email}}</span><br>
                                <span >Password : *********</span>
                            </div>
                                
                        
                            {{-- <button type="submit" class="btn btn-info" value="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                  </svg>
                            </button> --}}
                            
                                <!-- Write Review Form  -->
                                <br>
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#reviewModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg>
                                </a>

                                
                                <!-- Modal -->
                                <form method="POST" action="{{ route('admin.account.update',$profile->id) }}"  enctype="multipart/form-data">
                                    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="userEditForm"  action="#" >
                                                        @csrf
                                                        @method('PUT')
                                                        {{-- @method('PUT') --}}
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input id="name" type="text" class="form-control " name="name" value="{{ $profile->name }}"  />
                                                        
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input id="email" type="email" class="form-control " name="email" value="{{ $profile->email }}"  />
                                                        
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input id="password" type="password" class="form-control " name="password" value="{{ old('password') }}" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button   type="submit" class="btn btn-primary"  >SAVE</button> 
                                                        </div>
                                                        
                                                        {{-- <button type="submit" class="btn btn-success"  > SAVE </button> --}}
                                                        
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
</div>
@endsection
