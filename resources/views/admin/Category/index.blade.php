@extends('layouts.admin')
@section('admin','Quản lý chủ đề - T20 News')
@section('content')
<main class="col-10 background-white">

    <section class="section col-padding  ">
    <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Quản Lý Chủ Đề</h1>
        </div>
        <div class="row">
            <div class="col-2">
                <a class="col-margin--bottom" href="{{url('/category/new_category')}}"><button class="btn background-greed">New User</button></a>
            </div>
            <form class=" col-4 search" method="POST">
                <input class="search__input" type="search" placeholder="Search......" />
            </form>
        </div>
        <br>
        <div class="popular-post col-padding">
        <div class="row text-bold background-gray color-white text-align--center ">
            <div class="col-1 col-padding">Id</div>
            <div class="col-9 col-padding">Tên Chủ Đề</div>
            <div class="col-1 col-padding">Delete</div>
            <div class="col-1 col-padding">Update</div>
        </div>
        <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
            <div class="col-1 col-padding--top">1</div>          
            <div class="col-9 col-padding--top">Giáo Dục</div>
            <div class="col-1 "><button class="btn-admin background-red"><i class="fas fa-trash"></i></button></div>
            <div class="col-1 "><a href="{{url('/category/edit')}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
        </div>
       
        </div>
        

    </section>
</main>
@endsection