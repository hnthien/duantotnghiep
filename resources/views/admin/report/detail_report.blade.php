@extends('layouts.admin')
@section('admin','Quản lý vi phạm - T20 News')
@section('content')
<main >
    <section class="section">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Chi tiết vi phạm</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Vi phạm <i class="fas fa-angle-right"></i>Chi tiết vi phạm</span>
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