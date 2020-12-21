@extends('layouts.app')
@section('app','Đổi mật khẩu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card box-shadow">
                <h1 class="form__name">Đổi Mật Khẩu</h1>
                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#form_comment').submit(function(event) {
                            event.preventDefault();
                            var email = $('#email').val();
                            var password = $('#password').val();
                            var newpassword = $('#newpassword').val();
                            var confirmpassword = $('#confirmpassword').val();

                            $.ajax({
                                url: "{{url('/user/edit_password')}}/{{Auth::user()->id}}",
                                cache: false,
                                type: "post",
                                data: {
                                    email: email,
                                    password: password,
                                    newpassword: newpassword,
                                    confirmpassword: confirmpassword,
                                    "_token": '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    $('#review').html(data);
                                    $('#newpassword').val("");
                                    $('#confirmpassword').val("");
                                    console.log('Submission was successful.');

                                },
                                error: function(data) {
                                    console.log('An error occurred.');
                                    console.log(data);
                                },
                            })

                        })
                    })
                </script> -->
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <span id="review" style="position:absolute;top:14%;color:red;font-weight: bold;">
                            </span>
                        </div>

                    </div>
                    <br>
                    <form method="POST" id='form_comment' action="{{url('/user/edit_pass')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>Email</b></label>

                            <div class="col-md-6">


                                <input id="email" type="text" placeholder="email" class="form-control  @if (session('email'))is-invalid @endif @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                <span class="text-danger"><b>
                                        @if (session('email'))
                                       
                                            {{ session('email') }}
                                       
                                        @endif
                                        {{ $errors->first('email') }}

                                    </b></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>Mật khẩu cũ</b></label>

                            <div class="col-md-6">


                                <input id="password" type="password" placeholder="password" class="form-control @if (session('pass'))is-invalid @endif @error('pass') is-invalid @enderror" name="password" value="{{ old('pass') }}" autocomplete="password" autofocus>
                                <span class="text-danger"><b>
                                        @if (session('pass'))                                      
                                            {{ session('pass') }}                                    
                                        @endif
                                        {{ $errors->first('password') }}
                                    </b></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newpassword" class="col-md-4 col-form-label text-md-right"><b>Mật khẩu mới</b></label>

                            <div class="col-md-6">


                                <input id="newpassword" type="password" placeholder="New Password" class="form-control @error('newpassword') is-invalid @enderror " name="newpassword" value="{{ old('newpassword') }}" autocomplete="newpassword" autofocus>
                                <span class="text-danger"><b>{{ $errors->first('newpassword') }}</b></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirmpassword" class="col-md-4 col-form-label text-md-right"><b>Nhập lại mật khẩu</b></label>

                            <div class="col-md-6">


                                <input id="confirmpassword" type="password" placeholder="Confirm Password " class="form-control @error('confirmpassword') is-invalid @enderror " name="confirmpassword" value="{{ old('confirmpassword') }}" autocomplete="confirmpassword" autofocus>
                                <span class="text-danger"><b>{{ $errors->first('confirmpassword') }}</b></span>

                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn--hover">
                                    <button type="submit" class="btn__button col-padding-btn">Đổi mật khẩu</button>
                                    <div class="btn__hover"></div>
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
                <div style="text-align: center;margin-top: 40px;">
                    <a href="{{url('/')}}"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
                    <br>
                    <p style="margin-top: 10px;"><a style="color: black;" class="btn-link" href="{{url('/') }}">Trang chủ</a> | © 2018 T20News | Made by T20</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection