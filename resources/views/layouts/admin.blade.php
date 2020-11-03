<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images')}}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('admin')</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ URL::asset('js') }}/images.js"></script>
    <link href="{{ URL::asset('css') }}/login.css" rel="stylesheet" />

</head>

<body>


    <div class="header-admintop">
        <div class="row">
            <div class="col-10 col-padding"><a href="{{url('/admin')}}" class=" col-8 "><img src="{{ URL::asset('images')}}/t20.png" alt="logo" width="150px" /></a>
            </div>

            <div class="col-2 col-padding--top">
                <div class="text-align--center text-bold">
                    @if (Route::has('login'))
                    @auth
                    <ul class="menuheader row " style="margin-bottom: 0px;">
                        <li class="col-3"><img style="border-radius: 50%;" width="40px" height="40px" src="{{ URL::asset('images/user') }}/{{ Auth::user()->images_user }}" /> </li>
                        <li class="menuheaderli col-9">
                            <a>{{ Auth::user()->name }} <i class="fas fa-caret-down"></i></a>
                            <ul class="menuheaderli__droplist">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>{{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                <li><a href="{{url('/user/profile')}}/{{Auth::user()->name}}"><i class="fas fa-info-circle"></i>Thông tin</a></li>
                                <li> <a href="{{url('/user/change_password')}}"><i class="fab fa-expeditedssl"></i>Đổi mật khẩu</a></li>
                                @if(Auth::user()->role_user == 1 or Auth::user()->role_user == 2 or Auth::user()->role_user == 3 )
                                <li> <a href="{{url('/')}}"><i class="fas fa-users-cog"></i>Rời khỏi admin</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>

                    @else
                    <div class="col-margin--top">
                        <a href="{{ route('login') }}">Đang nhập</a> |

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">Đăng ký</a>
                    </div>

                    @endif
                    @endauth

                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <header class=" col-margin--none col-2">
         @include('admin.header');

        </header>


        <div style="margin-top:65px" class="col-10 col-padding">
            @yield('content')
        </div>
    </div>


</body>

</html>