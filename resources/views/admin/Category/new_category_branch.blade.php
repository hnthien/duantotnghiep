@extends('layouts.admin')
@section('admin','Quản lý chủ đề -T20 News ')
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
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Thêm chủ đề con</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Chủ đề <i class="fas fa-angle-right"></i>Thêm chủ đề con</span>
        </div>
        <br>       
        <form action="{{url('admin/category/create_category_branch')}}/{{$categorys->category_id}}" method="post">
        @csrf
            <div class="popular-post col-padding">
            <h2 >Thuộc chủ đề: {{$categorys->category_title}}</h2>
                    <h3>Tên chủ đề:</h3>
                    <input class="input" type="text" name="category_title" id="category_title"/>
                    <span  class="text-danger"><b>{{ $errors->first('category_title') }}</b></span>
                    <h3>Url:</h3>
                    <input class="input" type="text" name="category_slug" id="category_slug" value="{{ old('category_slug') }}"/>
                    <span  class="text-danger"><b>{{ $errors->first('category_slug') }}</b></span>

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