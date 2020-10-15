@extends('layouts.admin')
@section('admin','Quản lý bài viết - New post')
@section('content')
        <main class="col-10 background-white">
            <section class="section col-padding  ">
                <h1>Thêm Bài Viết</h1>
                <div class="col-2"> <a class="col-margin--bottom" href="new_post.html"><button class="btn background-greed">New User</button></a>
                </div>
                <br>
                <form method="GET" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <h3>Tên Bài Viết:</h3>
                            <input class="input" type="text" name="name_post" />
                            <h3>Mô Tả:</h3>
                            <input class="input" type="text" name="info_post" />
                            <h3>Nội Dung:</h3>
                            <input class="input" type="text" name="content_post" />
                            <h3>Ngày Viết:</h3>
                            <input class="input" type="date" name="content_post" />
                        </div>
                        <div class="col-6">
                            <h3>Ảnh Đại Diện</h3>
                            <input class="input" type="file" name="images_post" />

                            <img src="" />
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
                    </div>
                    <br>
                    <div class="row col-4">
                        <button class="btn background-greed">Gửi Bài Phê Duyệt</button>
                        <button class="btn background-greed">Lưu Bản Nháp</button>
                    </div>

                </form>

            </section>
        </main>
   @endsection