@extends('layouts.admin')
@section('admin','Quản lý bình luận - T20 News')
@section('content')


<main >

    <section class="section ">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý bình luận</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bình luận <i class="fas fa-angle-right"></i>Quản lý bình luận</span>
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
        @foreach($comments as $cmt)
        
        <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
            <div class="col-1 col-padding">{{$cmt->comment_id}}</div>
            @foreach($post as $p)
            @if($cmt->post_id == $p->post_id)
            <div class="col-6 col-padding">{{$p->post_title}}</div>
            @endif
            @endforeach
            <div class="col-3 col-padding">69</div>
            <div class="col-2 "><a href="{{url('/admin/comment/detail_comment')}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
        </div>
        @endforeach
       
        </div>
        

    </section>
</main>
@endsection