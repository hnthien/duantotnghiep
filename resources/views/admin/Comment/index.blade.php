@extends('layouts.admin')
@section('admin','Quản lý bình luận - T20 News')
@section('content')
<main class="col-10 background-white">

    <section class="section col-padding  ">
    <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Quản Lý Bình Luận</h1>
        </div>
        <div class="row">
            <form class=" col-4 search" method="POST">
                <input class="search__input" type="search" placeholder="Search......" />
            </form>
        </div>
        <br>
        <div class="popular-post col-padding">
        <div class="row text-bold background-gray color-white text-align--center ">
            <div class="col-1 col-padding">Id</div>
            <div class="col-6 col-padding">Tên Bài Viết</div>
            <div class="col-3 col-padding">Số Lượng Bình Luận</div>
            <div class="col-2 col-padding">Chi Tiết</div>
        </div>
        <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
            <div class="col-1 col-padding">1</div>
            <div class="col-6 col-padding">Mùa Xuân</div>
            <div class="col-3 col-padding">1000000</div>
            <div class="col-2 "><a href="{{url('/comment/detail_comment')}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
        </div>
       
        </div>
        

    </section>
</main>
@endsection