@extends('layouts.admin')
@section('admin','Quản lý tất cả bình luận - T20 News')
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
<main >

    <section class="section ">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý bình luận</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bình luận <i class="fas fa-angle-right"></i>Quản lý bình luận</span>
        </div>
        <div class="row">
            <form class=" col-4 search" method="POST">
                <span class="item"><i class="fa fa-search"></i></span>
                <input class="search__input" id="search" type="search" placeholder="Tìm kiếm......" />
                <div class="results_search" id="SearchResults"></div>
            </form>
            <div class="col-4">  
             <div style="text-align: center;float: right;">{!!$post->links()!!}</div>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-2">
                <a href="{{url('admin/comment/')}}">
                    <button  class="btn background-gray">Bài viết của tôi</button>
                </a>
            </div>
        </div>
        <br>
        <table class="popular-post ">
        <tr >
            <th>#</th>
            <th>Tên bài viết</th>
            <th>Ngày viết</th>
            <th>Số lượng bình luận</th>
            <th>Chi tiết</th>
        </tr>
        @foreach($post as $row_post)
        
        <tr>
           
            <td>{{$row_post->post_id}}</td>
            <td class="text-bold"><a target="_blank" href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">{{$row_post->post_title}}</a></td>
            <td>
            <p> @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2).'<br>'; echo substr($row_post->created_at ,0,10) ; @endphp</p>
           
            </td>
            <td>
            @php
                                $nur= 0;
                                foreach($comments as $row_comments){
                                    if($row_comments->post_id ==$row_post->post_id ){
                                    $nur++;
                                }
                                }
                                
                                echo '<b>' . $nur . '</b>';
                                @endphp
                                </td>
            <td>
           
            <a href="{{url('/admin/comment/detail_comment')}}/{{$row_post->post_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a>            
           
            </td>
        </tr>
        @endforeach
       
        </table>
        

    </section>
</main>
@endsection