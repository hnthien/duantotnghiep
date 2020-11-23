@extends('layouts.client')
@section('client','404 not found')
@section('content')
    <main class="content col-margin--top ">

        <div class=" col-margin--bottom">
            <ul class="list-horizontal">
                <li><a href="index.html"><b><i  class="fas fa-home text-color--gray"></i> Home <i class="fas fa-angle-right"></i></b></a></li>
                <li><a href="#">404 <i class="fas fa-angle-right"></i></a></li>
            </ul>
        </div>
        <section class="section row">

            <div class="col-8 popular-post col-padding">
                <div class="row">
                    <div class="col-12 col-padding">
                        <h1>404 not found</h1>
                        <p>
                            Xin lỗi! <br> Địa chỉ bạn tìm kiếm không tồn tại có thể đã bị xóa hoặc bị lỗi! <br>Vui lòng không truy cập vào đó nữa.
                        </p>
                        <br>
                        <a class="btn background-greed" href="index.html ">Quay Lại Trang Chủ</a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-10 col-padding">
                        <img class="img" src="{{ URL::asset('images') }}/sua-loi-404-tren-may-tinh.1PNG.png" alt="not found" />

                    </div>
                </div>

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
        </section>
    </main>
@endsection    