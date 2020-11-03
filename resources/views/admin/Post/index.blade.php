@extends('layouts.admin')
@section('admin','Quản lý bài viết - T20 News')
@section('content')
        <main >
            <section class="section ">
            <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý bài viết</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bài viết <i class="fas fa-angle-right"></i>Quản lý bài viết</span>
        </div>
                <div class="row">
                    <div class="col-2">
                        <a class="col-margin--bottom" href="{{url('/post/new_post')}}"><button class="btn background-greed">New Post</button></a>
                    </div>
                    <form class=" col-4 search" method="POST">
                        <input class="search__input" type="search" placeholder="Search......" />
                    </form>
                </div>

                <br>
                <div class="popular-post col-padding">
                <div class="row text-bold background-gray color-white text-align--center ">
                    <div class="col-1 col-padding">Id</div>
                    <div class="col-2 col-padding">Ảnh </div>
                    <div class="col-4 col-padding">Tên Tiêu Đề</div>
                    <div class="col-3 col-padding">Giới Thiệu</div>
                    <div class="col-1 col-padding">Delete</div>
                    <div class="col-1 col-padding">Update</div>
                </div>
                <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
                    <div class="col-1 col-padding--top">1</div>
                    <div class="col-2 ">
                        <img class="img" src="../../style/images/User/photo-5-1584724728351316096626.jpg" class=" col-border-radius-admin" />
                    </div>
                    <div class="col-4 col-padding--top">Administrator</div>
                    <div class="col-3 col-padding--top">Admin</div>
                    <div class="col-1 "><button class="btn-admin background-red"><i class="fas fa-trash"></i></button></div>
                    <div class="col-1 ">
                        <a href="{{url('/post/edit')}}">
                            <button class="btn-admin background-blue"><i class="fas fa-edit"></i></button>
                        </a>
                    </div>
                </div>
                </div>


            </section>
        </main>
@endsection
   