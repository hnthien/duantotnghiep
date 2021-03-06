@extends('layouts.app')
@section('app','Đăng ký')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card box-shadow">
            <h1 class="form__name">{{ __('Đăng Ký') }}</h1>
                <div class="card-body">
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><b>{{ __('Tên') }}</b></label>

                            <div class="col-md-6">
                           
                               
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                           
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>{{ __('E-Mail') }}</b></label>

                            <div class="col-md-6">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                     </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>{{ __('Mật khẩu') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>{{ __('Nhập lại mật khẩu') }}</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Password confirm"  type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <label for="phone_user" class="col-md-4 col-form-label text-md-right"><b>{{ __('Số điện thoại') }}</b></label>

                            <div class="col-md-6">
                                <input id="phone_user" placeholder="Phone" type="number" class="form-control @error('phone_user') is-invalid @enderror" name="phone_user" value="{{ old('phone_user') }}"  autocomplete="phone_user">

                                @error('phone_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span style="font-size:12px;color:darkgray">Gợi ý: Sử dụng email của bản thân để lấy lại mật khẩu khi quên.</span>              
                            </div>                           
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn--hover">
                                    <button type="submit" class="btn__button col-padding-btn">  {{ __('Đăng ký') }}</button>
                                    <div class="btn__hover"></div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>

                <div style="text-align: center;" >
                        <a href="{{url('/')}}"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
                        <p style="margin-top: 10px;"><a style="color: black;" class="btn-link" href="{{url('/') }}">Trang chủ</a> | © 2018 T20News | Made by T20</p>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
