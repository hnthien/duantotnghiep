<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <div class="col-3"></div>
            <div class="col-6 popular-post col-padding">
                <form method="GET" class="form col-padding">
                    <h3 class="form__name">REGISTER</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="form__input">
                                <i class="fas fa-user-alt"></i>
                                <input type="text" name="name" id="name" placeholder="User Name" />
                            </div>
                            <div class="form__input">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form__input">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" id="email" placeholder=" E-Mail Adresse" />
                            </div>
                            <div class="form__input">
                                <i class="fas fa-check-circle"></i>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                            </div>
                        </div>
                    </div>

                    <div class="btn--hover">
                          <button class="btn__button">REGISTER</button>
                          <div class="btn__hover"></div>
                      </div>

                    <div class="form__text">Do not have an account ?<a class="hover-underlined " href="{{url('/registration')}}">Register</a></div>
                </form>
                <div class="text-align--center">
                    <a href="{{url('/')}}"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
                    <p>© 2018 T20News | Made by T20</p>
                </div>

            </div>
            <div class="col-3"></div>
        </div>


    </main>

</body>

</html>