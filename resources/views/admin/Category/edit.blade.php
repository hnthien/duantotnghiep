@extends('layouts.admin')
@section('admin','Quản lý chủ đề - Edit user')
@section('content')
        <main >
        <section class="section ">
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Đổi tên chủ đề</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Chủ đề <i class="fas fa-angle-right"></i>Đổi tên chủ đề</span>
        </div>
        <div class="col-2"> <a class="col-margin--bottom" href="new_user.html"><button class="btn background-greed">New User</button></a>
        </div>
        <br>
        <form method="post" action="{{route('category.update',$categorys->category_id)}}">
        @method('PATCH') 
        @csrf
            <div class=" popular-post col-padding">
                    <h3>Tên Chủ Đề:</h3>
                    <input class="input" type="text" name="category_title" value="{{$categorys->category_title}}" />
                    <h3>Branch</h3>
                    <input class="input" type="number" name="category_branch" value="{{$categorys->category_branch}}" />
                    <h3>Intro</h3>
                    <input class="input" type="text" name="category_intro" value="{{$categorys->category_intro}}" />
            </div>
            <div class="row col-3">
                <button class="btn background-greed">Lưu</button>
            </div>

        </form>

    </section>
        </main>
@endsection 