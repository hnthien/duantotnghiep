@extends('layouts.admin')
@section('admin','Quản lý chủ đề - Edit user')
@section('content')
<script>
    $(document).ready(function() {
        $('#category_title').keyup(function() {
            var category_title = $('#category_title').val();
            $.ajax({
                url: "{{url('admin/category/url')}}",
                type: "get",
                data: {
                    category_title: category_title
                },
                success: function(res) {
                    $('#category_slug').val(res.slug);
                }
            })

        })
    })
</script>
        <main >
        <section class="section ">
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Đổi tên chủ đề</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Chủ đề <i class="fas fa-angle-right"></i>Đổi tên chủ đề</span>
        </div>
         <br>
        <form method="post" action="{{url('admin/category/update')}}/{{ $categorys->category_slug}}/{{ $categorys->category_id}}">
        @csrf
            <div class=" popular-post col-padding">
                    <h3>Tên Chủ Đề:</h3>
                    <input class="input" type="text" name="category_title" id="category_title" value="{{$categorys->category_title}}" />
                    <span  class="text-danger"><b>{{ $errors->first('category_title') }}</b></span>
                    <h3>Url:</h3>
                    <input class="input" type="text" name="category_slug" id="category_slug" value="{{$categorys->category_slug}}"/>
                    <span  class="text-danger"><b>{{ $errors->first('category_slug') }}</b></span>

                    <h3>Intro</h3>
                    <input class="input" type="text" name="category_intro" value="{{$categorys->category_intro}}" />
            </div>
            <div class="row col-3">
                <button type="submit" class="btn background-greed">Lưu</button>
            </div>

        </form>

    </section>
        </main>
@endsection 