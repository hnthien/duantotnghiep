@extends('layouts.client')
@section('client','Thông tin tài khoản '.Auth::user()->name )
@section('content')
<main class="content">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="{{url('/')}}"><b><i class="fas fa-home text-color--gray"></i> Trang chủ <i class="fas fa-angle-right"></i></b></a></li>
            <li><a href="#">Tài khoản <i class="fas fa-angle-right"></i></a></li>

        </ul>
    </div>


    <section class="section reponsive_8_4">
        <div class="row">
            <div class="col-8 ">
                <div class="row popular-post ">
                    <h1 class="col-12 col-margin-left" style="font-size: 30px;">Thông Tin Tài Khoản</h1>
                </div>
                <form action="{{url('user/account')}}" method="POST" class="box-shadow col-padding background-white" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-3">
                            <img name="images_user" src="{{ URL::asset('images/user') }}/{{Auth::user()->images_user}}" class="img " />

                            <button type="submit"   class="btn background-gray col-border--none">Lưu</button>
                        </div>
                        <div class="col-9 col-col-margin-left ">
                          
                           </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br>
                        <span class="text-bold" ><i class="fas fa-user-edit"></i>Giới Thiệu.</span>
                       <br>
                       <textarea style="resize: none;" id="intro_user" name="intro_user" cols="35" rows="300">{{Auth::user()->intro_user}}</textarea>
                       <script src="{{url('ckeditor/ckeditor.js') }}"></script>
                        <script>
                         CKEDITOR.replace('intro_user', {
                         filebrowserBrowseUrl: "{{route('ckfinder_browser')}}",

                          });
                         </script>
                          @include('ckfinder::setup')
                            <div class="form__input box_input">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" />
                            </div>
                            <div class="box">
                                <i class="fas fa-envelope"></i>
                               <span style="font-size: 15px;">{{ Auth::user()->email}}</span> 
                               
                            </div>
                            <div class="form__input box_input">
                                <i class="fas fa-phone-alt"></i>
                                <input type="text" name="phone_user" id="phone_user" value="{{ Auth::user()->phone_user}}" />
                                @error('phone_user')
                                <span  class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           
                         
                            <div class="form__input box_input col-margin--top">
                                <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                <div class="file-upload">
                                    <button class="btn background-gray col-border--none" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" name="images_user" id="images_user" type='file' onchange="readURL(this);"  />
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                            <i class="fas fa-user-circle"></i>
                              
                                @if(Auth::user()->role_user == 0)
                                <span>Người Dùng</span>
                                @else
                                @if(Auth::user()->role_user == 1)
                                <span>Tác Giả</span>
                                @else
                                @if(Auth::user()->role_user == 2)
                                <span>Kiểm Duyệt</span>
                                @else
                                @if(Auth::user()->role_user == 3)
                                <span>Admin</span>
                                @endif
                                @endif
                                @endif
                                @endif
                                
                            </div>
                           

                        </div>
                    </div>
                </form>


            </div>

            <div class="col-4">
            <aside>
                 <!-- popular_posts -->
                    @include('popular_posts')
                    <!-- end popular_posts -->
                    <!-- category -->
                    @include('list_categories')
                    <!-- end category -->

                    <!-- follow_my -->
                    @include('follow_my')
                    <!-- end follow_my -->
 <!-- recommended -->
 @include('recommended')
                    <!-- end recommended -->

                </aside>
            </div>
        </div>
    </section>

</main>
@endsection