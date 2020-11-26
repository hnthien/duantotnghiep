@extends('layouts.app')
@section('app','Đăng nhập thành công')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="margin-top: 60px;" class="card box-shadow">
            <h1 class="form__name">Logged In Successfully</h1>
                <div class="card-body">              
                <div style="text-align: center;" class="alert alert-success" role="alert">
                You are logged in!
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
</div>
@endsection