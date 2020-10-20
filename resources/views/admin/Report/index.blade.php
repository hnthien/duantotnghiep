@extends('layouts.admin')
@section('admin','Quản lý vi phạm - T20 News')
@section('content')
<main class="col-10 background-white">

    <section class="section col-padding  ">
    <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Quản Lý Vi Phạm</h1>
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
            <div class="col-4 col-padding">Lỗi Vi Phạm</div>
            <div class="col-2 col-padding">Người Vi Phạm</div>
            <div class="col-2 col-padding">Người Gửi</div>
            <div class="col-2 col-padding">Chi tiết</div>
        </div>
        <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
            <div class="col-2 col-padding">Chưa xem</div>
            <div class="col-4 col-padding">Từ Ngữ Thô Tục</div>
            <div class="col-2 col-padding">hn</div>
            <div class="col-2 col-padding">thien</div>
            <div class="col-2 "><a href="{{url('/report/detail_report')}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
        </div>
       
        </div>
        

    </section>
</main>
@endsection