@extends('layouts.admin') @section('admin','Quản lý bài viết - New post')
@section('content')
<main >
    <section class="section ">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Thêm bài viết mới</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bài viết <i class="fas fa-angle-right"></i>Thêm bài viết mới</span>
        </div>

        <form  method="POST" action="{{url('admin/post/create_post')}}"  enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="popular-post col-padding">

                <h3>Tên Bài Viết:</h3>
                <input class="input" type="text" name="post_title"/>
                <h3>Slug:</h3>
                <input class="input" type="text" name="post_slug"/>
                <h3>Mô Tả:</h3>
                <textarea class="input" type="text" name="post_intro" rows="4"></textarea>
                <div class="row">
                    <div class="col-6">
                        <h3>Ảnh Đại Diện</h3>
                        <input class="input" type="file" name="images_post"/>
                    </div>
                    <div class="col-6">
                        <img src=""/>
                    </div>
                </div>

                <h3>Chủ Đề:</h3>
                <select class="input" name="category_id">
                    @foreach($categorys as $ct)
                    <option value="{{$ct->category_id}}">{{$ct->category_title}}</option>
                    @endforeach
                </select>
                <h3>Tag:</h3>
                <input class="input" type="text" name="post_tag"/>
            </div>
            <div class="popular-post col-padding">
                <h3>Nội Dung:</h3>
                <textarea type="text" class="input" name="post_content" value="" rows="5"></textarea>

            </div>
            <br>
            <div class="row col-4">
                <button type="submit" class="btn background-greed ">Gửi Bài Phê Duyệt</button>
                <button class="btn background-greed col-margin-left">Lưu Bản Nháp</button>
            </div>

        </form>

    </section>
</main>
@endsection