@extends('layouts.admin')
@section('admin','Quản lý bài viết - Bài viết của tôi đã được phê duyệt - T20 News')
@section('content')
<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            var keyword = $('#search').val();
            $.ajax({
                url: "{{url('admin/post/search')}}",
                type: "get",
                data: {
                    keyword: keyword
                },
                success: function(res) {
                    $('#SearchResults').html(res);
                },
                error: function(error) {
                    alert('lỗi');
                }
            })

        })
    })
</script>
<main>
    <section>
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý bài viết</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bài viết <i class="fas fa-angle-right"></i>Quản lý bài viết <i class="fas fa-angle-right"></i>Bài viết của tôi đã được phê duyệt</span>
        </div>
        <div class="row">
            <div class="col-2">
                <a class="col-margin--bottom" href="{{url('admin/post/new_post')}}"><button class="btn background-greed">+ Add New Post</button></a>
            </div>
            <form class=" col-4 search" method="POST">
                <span class="item"><i class="fa fa-search"></i></span>
                <input class="search__input" id="search" type="search" placeholder="Search......" />
                <div class="results_search" id="SearchResults"></div>
            </form>
        </div>

        <br>


        <div class="row">
            <div class="col-2">
                <a href="{{url('admin/post/my_is_approved')}}">
                    <button id="your_is_approved" class="btn background-greed">Đã  kiểm duyệt</button>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('admin/post/my_is_not_approved')}}">
                    <button id="your_is_not_approved" class="btn background-red">Chưa  kiểm duyệt</button>
                </a>
            </div>

            <div class="col-7">
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <p id="is_approved_p" class="color-light-gray" style="font-size:12px;">Bài viết của tôi đã được phê duyệt.</p>
            </div>
            <div class="col-6"></div>
            <div class="col-3">
                <div style="text-align: center;float: right;">{!!$posts->links()!!}</div>
            </div>
        </div>
        <br>
        <table class="popular-post col-padding">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th>
                    <th style="width:100px;text-align: center;">Chủ đề</th>
                    <th style="width:100px;text-align: center;">Tác giả</th>
                    <th style="width:100px;text-align: center;">Phê duyệt</th>
                    <th style="width:80px;text-align: center;">Ngày viết</th>
                    <th>Trạng thái</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                    <th>Xem</th>
                </tr>
            </thead>

            <tbody>

                @foreach($posts as $p)
                @if($p->user_id == Auth::user()->id)
              
                <tr class="font-size-13">
                    <td>{{$p->post_id}}</td>
                    <td>
                        <img width="140px" height="80px" src="{{ URL::asset('images/post_image') }}/{{$p->post_image}}" alt="logo" />
                    </td>
                    <td>{{$p->post_title}}</td>
                    <td>{{$p->post_intro}}</td>
                    <td>
                       
                        @foreach($category as $row)
                        @if($row->category_id == $p->category_id)
                        <span class="col-border-category">{{$row->category_title}}</span>
                        @endif
                        @endforeach
                       
                    </td>
                    <td>
                        @foreach($user as $row1)
                        @if($row1->id == $p->user_id)
                        {{$row1->name}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($user as $row1)
                        @if($row1->id == $p->censor_id)
                        {{$row1->name}}
                        @endif
                        @endforeach
                    </td>
                    <td style="font-size: 14px;">
                        <p> @php echo substr($p->created_at ,10,3).':'.substr($p->created_at ,14,2).'<br>'; echo substr($p->created_at ,0,10) ; @endphp</p>
                    </td>
                    <td>
                        @if($p->post_status ==1 )
                        <span class="col-border-category background-linet-gray color-white ">Bản nháp</span>
                        @else
                        @if($p->post_status == 0 )
                        <span class="col-border-category background-red color-white">Đang phê duyệt</span>
                        @else
                        @if($p->post_status == 2 )
                        <span class="col-border-category background-greed color-white">Đã đăng</span>
                        @else
                        @if($p->post_status == 3)
                        <span class="col-border-category background-orangered color-white">Không Được phê duyệt</span>
                        @endif
                        @endif
                        @endif
                        @endif
                    </td>
                    <td><a href="{{url('admin/post/delete')}}/{{$p->post_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn xóa chứ !');" class="btn-admin background-red"><i class="fas fa-trash"></i></button></a> </td>
                    <td>
                        <a href="{{url('admin/post/edit')}}/{{$p->post_slug}}/{{$p->post_id}}">
                            <button class="btn-admin background-blue"><i class="fas fa-edit"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="{{url('admin/post/approval')}}/{{$p->post_slug}}/{{$p->post_id}}">
                            <button class="btn-admin background-blue">Xem</button>
                        </a> 
                    </td>
                </tr>
                @endif
               
                @endforeach
            </tbody>

        </table>
     



    </section>
</main>
@endsection