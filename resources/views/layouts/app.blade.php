<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('app')</title>
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <link href="{{ URL::asset('css') }}/login.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .box-shadow {
    box-shadow: 0 1.1px 5.3px rgba(0, 0, 0, 0.013), 0 3.6px 17.9px rgba(0, 0, 0, 0.033), 0 16px 80px rgba(0, 0, 0, 0.07);
}
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  ">
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><b>{{ __('Đăng nhập') }}</b></a>
                        </li>
                        @if (Route::has('register'))

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><b>{{ __('Đăng ký') }}</b></a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img style="border-radius: 50%;" width="40px" height="40px" src="{{ URL::asset('images/user') }}/{{ Auth::user()->images_user }}" /> <b style="text-transform: capitalize">{{ Auth::user()->name }}</b> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Đăng xuất') }}
                                </a>
                                 @php
                        $slug = Str::slug(Auth::user()->name, '-');
                        @endphp
                                <a class="dropdown-item" href="{{url('/user/thong-tin-tai-khoan')}}/{{$slug}}"><i class="fas fa-info-circle"></i> Thông tin</a>
                                <a class="dropdown-item" href="{{url('/user/change_password')}}"><i class="fab fa-expeditedssl"></i> Đổi mật khẩu</a>
                                @if(Auth::user()->role_user != 0)
                                <a class="dropdown-item" href="{{url('/admin')}}"><i class="fas fa-users-cog"></i> Vào admin</a>
                                @endif

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>