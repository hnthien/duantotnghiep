@extends('layouts.admin')
@section('admin','Quản lý bài viết - New post')
@section('content')
<main >
    <section class="section ">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Thêm bài viết mới</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bài viết <i class="fas fa-angle-right"></i>Thêm bài viết mới</span>
        </div>

        <form method="GET" enctype="multipart/form-data">
            <div class="popular-post col-padding">

                <h3>Tên Bài Viết:</h3>
                <input class="input" type="text" name="name_post" />
                <h3>Slug:</h3>
                <input class="input" type="text" name="name_post" />
                <h3>Mô Tả:</h3>
                <textarea class="input"  name="info_post" rows="4" > </textarea>
                <div class="row">
                    <div class="col-6">
                        <h3>Ảnh Đại Diện</h3>
                        <input class="input" type="file" name="images_post" />
                    </div>
                    <div class="col-6">
                        <img src=""/>
                    </div>
                </div>

                <h3>Chủ Đề:</h3>
                <select class="input" name="code_category">
                    <option>Thế Giới</option>
                    <option>Thời Trang</option>
                    <option>Đời Sống</option>
                    <option>Công Nghệ</option>
                </select>
                <h3>Tag:</h3>
                <input class="input" type="text" name="name_post[]" />
            </div>
            <div class="popular-post col-padding">
                <h3>Nội Dung:</h3>
                <textarea class="input" name="content_post" rows="5"></textarea>
                <h3>Ngày Viết:</h3>
                <input class="input" type="date" name="content_post" />
            </div>
            <br>
            <div class="row col-4">
                <button class="btn background-greed ">Gửi Bài Phê Duyệt</button>
                <button class="btn background-greed col-margin-left">Lưu Bản Nháp</button>
            </div>

        </form>

    </section>
</main>
@endsection