@extends('layouts.admin') @section('admin','Quản lý bài viết - Edit post')
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
                },
                error: function(error) {
                    alert('lỗi');
                }
            })

        })
    })
</script>
<main>
    <section class="section ">
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Chỉnh sửa bài viết</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bài viết <i class="fas fa-angle-right"></i>Chỉnh sửa bài viết</span>
        </div>

        <form method="post" action="{{url('/admin/post/update')}}/{{$post->post_id}}" enctype="multipart/form-data">
            @csrf

            <div class="popular-post col-padding">

                <h3>Tên Bài Viết:</h3>
                <input class="input" type="text" name="post_title" value="{{$post->post_title}}" id="post_title" />
                <span class="text-danger"><b>{{ $errors->first('post_title') }}</b></span>
                <h3>Url:</h3>
                <input class="input" type="text" name="post_slug" value="{{$post->post_slug}}" id="post_slug" />
                <span class="text-danger"><b>{{ $errors->first('post_slug') }}</b></span>

                <h3>Mô Tả:</h3>
                <textarea class="input" type="text" name="post_intro" rows="4">{{$post->post_intro}}</textarea>
                <span class="text-danger"><b>{{ $errors->first('post_intro') }}</b></span>

                <h3>Ảnh Đại Diện</h3>
                <div class="row">
                    <div class="col-6">
                        <div class="form__input box_input col-margin--top">
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <div class="file-upload">
                                <button class="btn background-gray col-border--none" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" name="post_image" id="images_user" type='file' onchange="readURL(this);" />
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

                    </div>
                    <div class="col-6">
                        <div class="col-margin--top">
                            <img style="height: 244px;width: 400px;margin-left: 10%;" width="100%" src="{{ URL::asset('images/post_image') }}/{{$post->post_image}}" alt="anh dai dien" />

                        </div>
                    </div>
                </div>
                <span class="text-danger"><b>{{ $errors->first('post_image') }}</b></span>

                <h3>Chủ Đề Đã Chọn:</h3>

              
                <h3>Chủ Đề:</h3>
                @foreach($categorys as $row_categorys)
                <ul style="margin:0px" class="col-3 col-float">
                    @if($row_categorys->category_id == $post->category_id)
                    <li style="padding:10px">
                        <input type="radio" checked name="category_id" class="selectbox" value="{{$row_categorys->category_id}}" />{{$row_categorys->category_title}}
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
                    @else
                    <li style="padding:10px">
                        <input type="radio" name="category_id" class="selectbox" value="{{$row_categorys->category_id}}" />{{$row_categorys->category_title}}
                        <ul style="margin-left: 15px;">
                            @foreach($categorys_branch as $row_categorys_branch)
                            @if($row_categorys_branch->category_branch == $row_categorys->category_id )
                            @if($row_categorys_branch->category_id == $post->category_id )
                            <li style="padding:5px">
                                <input type="radio" checked name="category_id" class="selectbox" value="{{$row_categorys_branch->category_id}}" />{{$row_categorys_branch->category_title}}
                            </li>
                            @else
                            <li style="padding:5px">
                                <input type="radio" name="category_id" class="selectbox" value="{{$row_categorys_branch->category_id}}" />{{$row_categorys_branch->category_title}}
                            </li>
                            @endif
                            @endif
                            @endforeach
                        </ul>

                    </li>
                    @endif

                </ul>
                @endforeach

                <span class="text-danger"><b>{{ $errors->first('category_id') }}</b></span>
                <div class="clearfix"></div>
                <h3>Tag:</h3>
                <input class="input" type="text" name="post_tag" value="@foreach($post->post_tag as $tag){{$tag}},@endforeach" />
                <span class="text-danger"><b>{{ $errors->first('post_tag') }}</b></span>

            </div>
            <div class="popular-post col-padding">
                <h3>Nội Dung:</h3>
                <textarea id="post_content" name="post_content" cols="30" rows="100">{{$post->post_content}}</textarea>
                <script src="{{url('ckeditor/ckeditor.js') }}"></script>
                <script>
                    CKEDITOR.replace('post_content', {
                        filebrowserBrowseUrl: "{{route('ckfinder_browser')}}",

                    });
                </script>
                @include('ckfinder::setup')
                <span class="text-danger"><b>{{ $errors->first('post_content') }}</b></span>
                <br>
                @if($post->post_status == 1)
                <input checked type="checkbox" name="post_status" class="selectbox" value="1" />Lưu bản nháp
                @endif
               
                @if(Auth::user()->role_user == 3 or Auth::user()->role_user == 2)
                <select name="post_status">
                    @if($post->post_status == 0)
                    <option selected value="0">Đang phê duyệt</option>
                    <option value="2">Phê duyệt</option>
                    <option value="3">Không được phê duyệt</option>
                    @endif
                    @if($post->post_status == 2)
                    <option selected value="2">Phê duyệt</option>
                    <option value="0">Đang phê duyệt</option>
                    <option value="3">Không được phê duyệt</option>
                    @endif
                    @if($post->post_status == 3)
                    <option selected value="3">Không được phê duyệt</option>
                    <option value="0">Đang phê duyệt</option>
                    <option value="2">Phê duyệt</option>
                    @endif                  
                </select>
                @endif
                
            </div>
            <br>
            <div class="row col-3">
                <button type="submit" class="btn background-greed ">Gửi Bài Phê Duyệt</button>
            </div>
        </form>
        <br>
        <div class="row ">
            <a class="col-3" href="{{url('admin/post/delete')}}/{{$post->post_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn xóa chứ !');" class="btn background-red"><i class="fas fa-trash"></i></button></a>
        </div>

    </section>
</main>
@endsection