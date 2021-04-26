<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head  >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FoodReview Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body >
    <div id="app" >
        <div class="row"> 
            <nav class="col navbar navbar-expand-md navbar-light  shadow-sm"  style=" background-color:rgb(71, 71, 71)"  >
                <div class="container"  >
                    {{-- <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776;</span> --}}
                    <a class="navbar-brand ml-3"  style="color:rgb(255, 255, 255)" href="{{ url('/') }}">
                        FoodReview Admin
                    </a>
                    <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class=" col collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul style="color:rgb(255, 255, 255)"  class="navbar-nav ml-auto" >
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" style="color:rgb(255, 255, 255)" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Admin : {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{url('/admin/home')}}"  class="dropdown-item" >Dashboard</a>
                                        <a href="{{route('admin.task.index')}}"  class="dropdown-item" >Task</a>
                                        <a href="#"  class="dropdown-item" >Profile</a>
                                        <a href="#"  class="dropdown-item" >User Admin</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            
        </div>
      
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
