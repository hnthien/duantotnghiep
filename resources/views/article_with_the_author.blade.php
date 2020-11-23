@extends('layouts.client')
@section('client','Posts by the same writer')
@section('content')
    <main class="content col-margin--top ">
        <div class=" col-margin--bottom">
            <ul class="list-horizontal">
                <li><a href="index.html"><b><i  class="fas fa-home text-color--gray"></i> Home <i class="fas fa-angle-right"></i></b></a></li>
                <li><a href="#">Journalist <i class="fas fa-angle-right"></i></a></li>
                <li><a href="#">Posts by the same writer</a></li>
            </ul>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-8 ">
                    <article>
                        <div class="row popular-post ">
                            <h1 class="col-12 col-margin-left" style="font-size: 30px;">Posts by the same writer</h1>
                        </div>

                        <div class="row popular-post col-padding">
                            <div class="col-3">
                                <img src="{{ URL::asset('images/user') }}/photo-5-1584724728351316096626.jpg" class="img " />
                            </div>
                            <div class="col-9 col-padding">
                                <h3 class="text-bold">Name : DeoThemes</h3>
                                <p>Số bài viết: </p>
                                <p>Giới Thiệu: </p>
                            </div>
                        </div>
                        <div class="row popular-post col-padding ">
                            <div class="col-6 col-position ">
                                <img class="col-border-radius img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_1.jpg" alt="image post" />
                                <a class="list-theme background-blue" href="{{url('/catergories')}}">World</a>
                            </div>
                            <div class="col-6 ">
                                <a href="news.html">
                                    <h3>3 Founders With Booming Businesses Share Stories About Their Difficult Early</h3>
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
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                            </div>

                        </div>
                        <div class="row popular-post col-padding ">
                            <div class="col-6 col-position ">
                                <img class="col-border-radius img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_2.jpg" alt="image post" />
                                <a class="list-theme background-blue" href="{{url('/catergories')}}">World</a>
                            </div>
                            <div class="col-6 ">
                                <a href="news.html">
                                    <h3>3 Founders With Booming Businesses Share Stories About Their Difficult Early</h3>
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
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                            </div>

                        </div>
                        <div class="row popular-post col-padding ">
                            <div class="col-6 col-position ">
                                <img class="col-border-radius img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_3.jpg" alt="image post" />
                                <a class="list-theme background-blue" href="{{url('/catergories')}}">World</a>
                            </div>
                            <div class="col-6 ">
                                <a href="news.html">
                                    <h3>3 Founders With Booming Businesses Share Stories About Their Difficult Early</h3>
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
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                            </div>

                        </div>
                        <div class="row popular-post col-padding ">
                            <div class="col-6 col-position ">
                                <img class="col-border-radius img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_4.jpg" alt="image post" />
                                <a class="list-theme background-blue" href="{{url('/catergories')}}">World</a>
                            </div>
                            <div class="col-6 ">
                                <a href="news.html">
                                    <h3>3 Founders With Booming Businesses Share Stories About Their Difficult Early</h3>
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
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                            </div>

                        </div>
                    </article>
                </div>
                <div class="col-4">
                <aside>
                    <!-- popular_posts -->
                    @include('popular_posts')
                    <!-- end popular_posts -->
                   
                    <div class="popular-post col-padding background-white">
                        <h2>FAN PAGE</h2>

                    </div>
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
                     <!-- category -->
                     @include('list_categories')
                    <!-- end category -->

                </aside>
                </div>
            </div>
        </section>
    </main>
@endsection
  