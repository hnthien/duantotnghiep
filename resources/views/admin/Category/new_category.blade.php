@extends('layouts.admin')
@section('admin','Quản lý chủ đề - New user')
@section('content')
<main >
    <section class="section ">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Thêm chủ đề</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Chủ đề <i class="fas fa-angle-right"></i>Thêm chủ đề</span>
        </div>
        <div class="col-2"> <a class="col-margin--bottom" href="new_user.html"><button type="submit" class="btn background-greed">New User</button></a>
        </div>
        <br>
        
        <form action="{{route('category.store')}}" method="post">
        @csrf
            <div class="popular-post col-padding">
                    <h3>Tên Chủ Đề:</h3>
                    <input class="input" type="text" name="category_title"/>
                    <h3>Branch:</h3>
                    <input class="input" type="text" name="category_branch"/>
                    <h3>Intro:</h3>
                    <input class="input" type="text" name="category_intro"/>
            </div>
            <div class="row col-3">
                <button type="submit" class="btn background-greed">Thêm</button>
            </div>

        </form>

    </section>
</main>
@endsection