@extends('layouts.client')
@section('client','Profile '.Auth::user()->name )
@section('content')
<main class="content">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="index.html"><b><i class="fas fa-home text-color--gray"></i> Home <i class="fas fa-angle-right"></i></b></a></li>
            <li><a href="#">Account <i class="fas fa-angle-right"></i></a></li>

        </ul>
    </div>


    <section class="section reponsive_8_4">
        <div class="row">
            <div class="col-8 ">
                <div class="row popular-post ">
                    <h1 class="col-12 col-margin-left" style="font-size: 30px;">User Profile</h1>
                </div>
                <form action="{{url('user/account')}}" method="POST" class="box-shadow col-padding background-white" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-3">
                            <img name="images_user" src="{{ URL::asset('images/user') }}/{{Auth::user()->images_user}}" class="img " />

                            <button type="submit"   class="btn background-gray col-border--none">Lưu</button>
                        </div>
                        <div class="col-9 col-col-margin-left ">
                            <span class="text-bold "><i class="fas fa-user-edit"></i>Introduce something interesting.</span>
                            <br>
                          <textarea name="address_user"  style="height: 90%;width: 100%;margin-top:10px ;padding:10px;box-sizing: border-box;">{{ Auth::user()->address_user }}</textarea>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
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
                    <div class="popular-post col-padding">
                        <h2>POPULAR POSTS</h2>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_1.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="news.html">
                                    <h4>Follow These Smartphone Habits of Successful Entrepreneurs</h4>
                                </a>
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>
                                        <a href="#">DeoThemes</a>
                                    </li>
                                    <li>
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_2.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="news.html">
                                    <h4>Follow These Smartphone Habits of Successful Entrepreneurs</h4>
                                </a>
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>
                                        <a href="#">DeoThemes</a>
                                    </li>
                                    <li>
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_3.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="news.html">
                                    <h4>Follow These Smartphone Habits of Successful Entrepreneurs</h4>
                                </a>
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>
                                        <a href="#">DeoThemes</a>
                                    </li>
                                    <li>
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_4.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="news.html">
                                    <h4>Follow These Smartphone Habits of Successful Entrepreneurs</h4>
                                </a>
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>
                                        <a href="#">DeoThemes</a>
                                    </li>
                                    <li>
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="popular-post col-padding background-white">
                            <h2>NEWSLETTER</h2>
                            <p><i class="far fa-envelope"></i> Subscribe for our daily news</p>
                            <form class="row" method="GET">
                                <div class="col-9"><input class="input col-border" type="email" placeholder="Email..." /></div>
                                <div class="col-3"> <button class="btn background-gray col-border"> <i class="fas fa-paper-plane"></i></button> </div>
                            </form>
                        </div> -->
                    <div class="popular-post col-padding background-white">
                        <h2>LET'S HANG OUT ON SOCIAL</h2>
                        <div class="row">
                            <div class="col-6">
                                <a href="#"><button class="btn col-margin--bottom background-dark-blue"><i class="fab fa-facebook-f"></i> FACEBOOK</button></a>
                                <a href="#"><button class="btn col-margin--bottom background-blue"><i class="fab fa-twitter"></i> TWITTER</button></a>
                                <a href="#"><button class="btn background-red"><i class="fab fa-youtube"></i> YOUTUBE</button></a>
                            </div>
                            <div class="col-6">
                                <a href="#"><button class="btn col-margin--bottom background-orangered"><i class="fab fa-google-plus-g"></i> GOOGLE</button></a>
                                <a href="#"><button class="btn col-margin--bottom background-orchid"><i class="fab fa-instagram"></i> INSTAGRAM</button></a>
                                <a href="#"><button class="btn background-oranger"><i class="fas fa-rss"></i>RSS</button></a>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>

</main>
@endsection