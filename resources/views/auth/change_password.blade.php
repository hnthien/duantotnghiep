@extends('layouts.app')
@section('app','Change Passwword')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <h1 class="form__name">CHANGE PASSWORD</h1>  
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                console.log('Submission was successful.');
                               

                            },
                            error: function(data) {
                                console.log('An error occurred.');
                                console.log(data);
                            },
                        })

                    })
                })             
            </script>          
              <div id="review"></div>
                <div class="card-body">
                    <form method="POST" id='form_comment' action="{{url('/user/edit_password')}}/{{Auth::user()->id}}" enctype="multipart/form-data">
                   
                    {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>Email</b></label>

                            <div class="col-md-6">
                           
                               
                                <input id="email" type="text" placeholder="email" class="form-control" name="email" value=""  autocomplete="email" autofocus>
                           
                                <span class="text-danger"><b>{{ $errors->first('email') }}</b></span>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>Old Password</b></label>

                            <div class="col-md-6">
                           
                               
                                <input id="password" type="password" placeholder="password" class="form-control" name="password" value=""  autocomplete="password" autofocus>
                                <span class="text-danger"><b>{{ $errors->first('password') }}</b></span>
                              
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="newpassword" class="col-md-4 col-form-label text-md-right"><b>New Password</b></label>

                            <div class="col-md-6">
                           
                               
                                <input id="newpassword" type="password" placeholder="New Password" class="form-control " name="newpassword" value=""  autocomplete="newpassword" autofocus>
                                <span class="text-danger"><b>{{ $errors->first('newpassword') }}</b></span>
                                
                            </div>
                        </div> <div class="form-group row">
                            <label for="confirmpassword" class="col-md-4 col-form-label text-md-right"><b>Confirm Password</b></label>

                            <div class="col-md-6">
                           
                               
                                <input id="confirmpassword" type="password" placeholder="Confirm Password" class="form-control " name="confirmpassword" value=""  autocomplete="confirmpassword" autofocus>
                                <span class="text-danger"><b>{{ $errors->first('confirmpassword') }}</b></span>
                                
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn--hover">
                                    <button type="submit" class="btn__button col-padding-btn">Register</button>
                                    <div class="btn__hover"></div>
                                </div>
                            </div>
                        </div>
                       
                    </form>


                </div>
                <div style="text-align: center;margin-top: 50px;" >
                    <a href="{{url('/')}}"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
                    <p>© 2018 T20News | Made by T20</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection