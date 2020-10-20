@extends('layouts.admin')
@section('admin','Đóng Góp Ý Kiến - T20 News')
@section('content')
<main class="col-10 background-white">

    <section class="section col-padding  ">
    <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Ý Kiến Người Dùng</h1>
        </div>
        <div class="row">
            <form class=" col-4 search" method="POST">
                <input class="search__input" type="search" placeholder="Search......" />
            </form>
        </div>
        <br>
        <div class="popular-post col-padding">
        <div class="row text-bold background-gray color-white text-align--center ">
            <div class="col-2 col-padding">Trạng Thái</div>
            <div class="col-5 col-padding">Tiêu Đề</div>
            <div class="col-3 col-padding">Người Gửi</div>
            <div class="col-2 col-padding">Chi Tiết</div>
        </div>
        <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
            <div class="col-2 col-padding">Đã Xem</div>
            <div class="col-7 col-padding--top">CẢI THIỆN BÀI VIẾT</div>          
            <div class="col-3 col-padding--top">HNTHIEN</div>
            <div class="col-2 "><a href="{{url('/feedback/detail_feedback')}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>

        </div>
      
     
        </div>
        

    </section>
</main>
@endsection