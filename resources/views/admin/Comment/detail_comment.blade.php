@extends('layouts.admin')
@section('admin','Quản lý bình luận - T20 News')
@section('content')
<main >

    <section class="section ">
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
       <h2>Tên Bài Viết</h2>
       <p>Số lượng bình luận:</p>
       <p>Bao nhiêu người bình luận:</p>
       <div class="row text-bold background-gray color-white text-align--center ">
            <div class="col-3 col-padding">Người Bình Luận</div>
            <div class="col-6 col-padding">Nội Dung</div>
            <div class="col-3 col-padding">Trạng Thái</div>
        </div>
        <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
            <div class="col-3 col-padding">hn thiện</div>
            <div class="col-6 col-padding">rất hay</div>
            <div class="col-3 col-padding"><span></span>Bị ẩn vì vi phạm nguyên tắc</div>
        </div>
        </div>
        

    </section>
</main>
@endsection