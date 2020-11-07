@extends('layouts.admin') @section('admin','Quản lý bài viết - Edit post')
@section('content')
<main >
    <section class="section ">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Chỉnh sửa bài viết</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bài viết <i class="fas fa-angle-right"></i>Chỉnh sửa bài viết</span>
        </div>

        <form method="post" action="{{url('/admin/post/update/'. $post->post_id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}

            <div class="popular-post col-padding">

                <h3>Tên Bài Viết:</h3>
                <input class="input" type="text" name="post_title" value="{{$post->post_title}}"/>
                <h3>Slug:</h3>
                <input class="input" type="text" name="post_slug" value="{{$post->post_slug}}"/>
                <h3>Mô Tả:</h3>
                <textarea class="input" type="text" name="post_intro" rows="4">{{$post->post_intro}}</textarea>
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
                <input class="input" type="text" name="post_tag" value="{{$post->post_tag}}"/>
            </div>
            <div class="popular-post col-padding">
                <h3>Nội Dung:</h3>
                <textarea type="text" class="input" name="post_content" rows="5">{{$post->post_content}}</textarea>

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