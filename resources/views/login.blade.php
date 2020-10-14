<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
    <link href="{{ URL::asset('css') }}/login.css" rel="stylesheet" />
</head>

<body>
    <main class="content col-margin--top ">
        <div style="position: absolute;right: 1%; " class="text-bold">
            <a class="hover-underlined " href="{{url('/login')}}">Login</a> | <a class="hover-underlined" href="{{url('/registration')}}">Registration</a>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 popular-post col-padding">
                <form method="GET" class="form col-padding">
                    <h3 class="form__name">LOGIN</h3>
                    <div class="form__input">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder=" E-Mail Adresse" />
                    </div>
                    <div class="form__input">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="********" />
                    </div>
                    <button class="form__button btn">LOGIN</button>
                    <div class="form__text">Do not have an account ?<a class="hover-underlined " href="{{url('/registration')}}">Register</a></div>
                </form>
                <div class="text-align--center">
                    <a href="index.html"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
                    <p>© 2018 T20News | Made by T20</p>
                </div>

            </div>
            <div class="col-4"></div>
        </div>


    </main>

</body>

</html>