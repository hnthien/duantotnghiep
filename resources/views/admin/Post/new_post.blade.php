@extends('layouts.admin') 
@section('admin','Quản lý bài viết - New post')
@section('content')
<script>
    $(document).ready(function() {
        $('#post_title').keyup(function() {
            var post_title = $('#post_title').val();
            $.ajax({
                url: "{{url('admin/post/url')}}",
                type: "get",
                data: {
                    post_title: post_title
                },
                success: function(res) {
                    $('#post_slug').val(res.slug);
                }
            })

        })
    })
</script>
<main>
    <section class="section ">
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Thêm bài viết mới</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bài viết <i class="fas fa-angle-right"></i>Thêm bài viết mới</span>
        </div>
        <form method="POST" action="{{url('admin/post/create_post')}}" enctype="multipart/form-data">
            @csrf
            <div class="popular-post col-padding">

                <h3>Tên Bài Viết:</h3>
                <input class="input" type="text" name="post_title" id="post_title" value="{{ old('post_title') }}" />
                <span class="text-danger"><b>{{ $errors->first('post_title') }}</b></span>

                <h3>Url:</h3>
                <input class="input" type="text" name="post_slug" id="post_slug" value="{{ old('post_slug') }}" />
                <span class="text-danger"><b>{{ $errors->first('post_slug') }}</b></span>
                <div class="row">
                    <div class="col-6">
                        <h3>Mô Tả:</h3>
                        <textarea class="input" type="text" name="post_intro" rows="14">{{ old('post_intro') }}</textarea>
                        <span class="text-danger"><b>{{ $errors->first('post_intro') }}</b></span>
                    </div>
                    <div class="col-6">
                        <h3>Ảnh Đại Diện</h3>
                        <div class="form__input box_input col-margin--top">
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <div class="file-upload">
                                <button class="btn background-gray col-border--none" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" name="post_image" id="images_user" value="{{ old('post_image') }}" type='file' onchange="readURL(this);" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="text-danger"><b>{{ $errors->first('post_image') }}</b></span>
                    </div>
                </div>
            
                    <h3>Chủ Đề:</h3>
                    @foreach($categorys as $row_categorys)
                    <ul style="margin:0px" class="col-3 col-float">
                        <li style="padding:10px">
                            <input type="radio" name="category_id" class="selectbox" value="{{$row_categorys->category_id}}" />{{$row_categorys->category_title}}
                            <ul style="margin-left: 15px;">
                                @foreach($categorys_branch as $row_categorys_branch)
                                @if($row_categorys_branch->category_branch == $row_categorys->category_id )
                                <li style="padding:5px">
                                    <input type="radio" name="category_id" class="selectbox" value="{{$row_categorys_branch->category_id}}" />{{$row_categorys_branch->category_title}}
                                </li>
                                @endif
                                @endforeach
                            </ul>

                        </li>
                    </ul>
                    @endforeach

                    <span class="text-danger"><b>{{ $errors->first('category_id') }}</b></span>
                    <div class="clearfix"></div>
                   
                  
               
                
               
                <script src="{{ URL::asset('js/js_tags') }}/jquery.min.js"></script>
                    <script src="{{ URL::asset('js/js_tags') }}/jqueryui.js"></script>
                    <script src="{{ URL::asset('js/js_tags') }}/selectize.js"></script>
                    <script src="{{ URL::asset('js/js_tags') }}/index.js"></script>
                    <link rel="stylesheet" href="{{ URL::asset('css/dist/css') }}/selectize.default.css">
                <div class="control-group">
                <h3>Tag:</h3>
               <input type="text" id="input-tags" name="post_tag" class="input-tags  demo-default" value="{{ old('post_tag') }}">
               <span class="text-danger"><b>{{ $errors->first('post_tag') }}</b></span>  
                </div>
               <script>
                $('#input-tags').selectize({
                plugins: ['remove_button'],
                persist: false,
                create: true,
                render: {
                item: function(data, escape) {
                    return '<div>"' + escape(data.text) + '"</div>';
                }
                 },
                onDelete: function(values) {
                    return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
                }
                 });
                </script>

            </div>
            <div class="popular-post col-padding">
                <h3>Nội Dung:</h3>
                <textarea id="post_content" name="post_content" cols="30" rows="100">{{ old('post_content') }}</textarea>
                <script src="{{url('ckeditor/ckeditor.js') }}"></script>
                <script>
                    CKEDITOR.replace('post_content', {
                        filebrowserBrowseUrl: "{{route('ckfinder_browser')}}",

                    });
                </script>
                @include('ckfinder::setup')
                <span class="text-danger"><b>{{ $errors->first('post_content') }}</b></span>
                <br>
                <!-- <input type="checkbox" name="post_status" id="checked-changes" class="selectbox" value="" />Lưu bản nháp             -->
            </div>
            <br>
            <div class="row col-4">
                <button type="submit" class="btn background-greed ">Gửi Bài Phê Duyệt</button>
           
            </div>

        </form>

    </section>
</main>
<script>
    let checked = $("#checked-changes").val(this.checked);
    checked.val(0);
        $("#checked-changes").change(function(e){            
            e.preventDefault();
            if(this.checked){
                checked.val(1);
            }else{
                checked.val(0);
            }
        });
</script>
@endsection