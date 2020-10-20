@extends('layouts.admin')
@section('admin','Quản lý vi phạm - T20 News')
@section('content')
<main class="col-10 background-white">

    <section class="section col-padding  ">
    <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Quản Lý Vi Phạm</h1>
        </div>
        <br>
        <div class="popular-post col-padding">
            <h3>Tên Bài Viết</h3>
            <p>Người tố cáo:</p>
            <p>Người vi phạm:</p>
            <p>Lỗi vi phạm:</p>
            <p>Nội dung bình luận:</p> 
            <p>Trạng Thái: Bình thường</p>  
        </div>
        <div class="popular-post col-padding">
            <p>Cập nhật lại trạng thái bình luận:</p>
                <select class="input" name="code_category">
                    <option>Bình thường</option>
                    <option>Ẩn đi</option>
                </select>
        </div>
        

    </section>
</main>
@endsection