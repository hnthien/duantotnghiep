@extends('layouts.app')
@section('app','Đăng nhập')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card box-shadow">
                <h1 class="form__name">{{ __('Đăng nhập') }}</h1>


                <div class="card-body ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                       
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right "><b>{{ __('E-Mail') }}</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>

                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>{{ __('Mật Khẩu') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Nhơ mật khẩu') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn--hover">
                                    <button type="submit" class="btn__button col-padding-btn"> {{ __('Đăng nhập') }}</button>
                                    <div class="btn__hover"></div>
                                </div>

                                @if (Route::has('password.request'))
                                <a style="color: black;" class="btn-link" href="{{ route('password.request') }}">
                                    {{ __('Nhớ mật khẩu ?') }}
                                </a>
                                @endif
                                            </div>
                        </div>
                    </form>


                </div>
                <div style="text-align: center;margin-top: 40px;">
                    <a href="{{url('/')}}"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
                    <p style="margin-top: 10px;"><a style="color: black;" class="btn-link" href="{{url('/') }}">Trang chủ</a> | © 2018 T20News | Made by T20</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection