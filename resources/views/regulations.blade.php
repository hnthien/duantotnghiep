@extends('layouts.client')
@section('client','Quy định - T20NEWS')
@section('content')
<main class="content col-margin--top ">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="{{url('/')}}"><b><i class="fas fa-home text-color--gray"></i> Trang chủ<i class="fas fa-angle-right"></i></b></a></li>
            <li><a class="color-gray" href="{{url('gioi-thieu-t20news')}}">Quy định</a></li>
        </ul>
    </div>
    <section class="section">
       <div class="row">
           <div class="col-8">
           <div class="row ">
                    <div class=" popular-post post-contect">
                        <h1 class="text-title-post">Quy định của chúng tôi</h1>
                        
                       <br>
                        <p>
Mọi bình luận gây đã kích, phản cảm , gây gỗ và phản động ... đều bị ẩn đi . Hay là con người văn minh khi sử dụng website 
                          
                            <img class="img" alt="T20news" src="https://erasmusplus.org.ge/files/news/news-1.jpg"/><br><br>
                        </p>
                    </div>
           </div>
           </div>
           <div class="col-4">
                <aside>
                    <!-- popular_posts -->
                    @include('popular_posts')
                    <!-- end popular_posts -->
                    <!-- category -->
                    @include('list_categories')
                    <!-- end category -->
                    <div class="popular-post col-padding">
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
                    <!-- recommended -->
                    @include('recommended')
                    <!-- end recommended -->

                </aside>
            </div>
       </div>
    </section>
</main>
@endsection