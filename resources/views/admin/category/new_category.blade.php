@extends('layouts.admin')
@section('admin','Quản lý chủ đề - T20 News')
@section('content')
<main>
    <section class="section ">
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Thêm chủ đề</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Chủ đề <i class="fas fa-angle-right"></i>Thêm chủ
                đề</span>
        </div>
        <br>
        <form action="{{url('admin/category/create_category')}}" method="post">
            @csrf
            <div class="popular-post col-padding">
                <h3>Tên Chủ Đề:</h3>
                <input class="input" type="text" name="category_title" />
                <span class="text-danger"><b>{{ $errors->first('category_title') }}</b></span>

                <h3></h3>
                <input class="input" type="text" name="category_intro" />


            </div>
            <div class="row col-3">
                <button type="submit" class="btn background-greed">Thêm</button>
            </div>

        </form>

    </section>
</main>
@endsection