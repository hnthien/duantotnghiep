@extends('layouts.admin')
@section('admin','Quản lý vi phạm - T20 News')
@section('content')
<main >

    <section class="section">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý vi phạm</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Vi Phạm <i class="fas fa-angle-right"></i>Quản lý vi phạm</span>
        </div>
        <div class="row">
        <div class="col-2">
                <a href="{{url('/admin/report')}}">
                    <button id="your_all" class="btn background-gray">Bình Thường</button>
                </a>

            </div>
            <div class="col-2">
                <a href="{{url('/admin/report/hidden')}}">
                    <button id="your_is_not_approved" class="btn background-red">Bị ẩn</button>
                </a>
            </div>
            <div class="col-4">
            </div>
            <div class="col-3">
                <div style="text-align: center;float: right;">{!!$comment_report->links()!!}</div>
            </div>
        </div>
        <br>
        <table >
        <tr >
            <th>Trạng Thái</th>
            <th>Tên bài viết</th>
            <th>Nội dung bình luận</th>
            <th>Người Vi Phạm</th>
            <th>Người Gửi</th>
            <th>Thời gian</th>
            <th>Hành động</th>
           
        </tr>
        @foreach($comment_report as $row_comment_report)
        <tr >
            <td>
            @foreach($comments as $row_comments)
            @if($row_comment_report->comment_id ==  $row_comments->comment_id )
            @if($row_comments->comment_status == 0) 
            <span class="color-green">Bình thường</span>
            @else
            <span class="color-red">Bị ẩn</span>
            @endif
            @endif
            @endforeach
            </td>
            <td>
            @foreach($comments as $row_comments)
            @if($row_comment_report->comment_id ==  $row_comments->comment_id )
            @php
            $data = new App\Models\Post();
            $post=$data->all();
            @endphp
            @foreach($post as $row_post)
            @if($row_comments->post_id == $row_post->post_id)
            {{$row_post->post_title}} 
            @endif
            @endforeach
            @endif
            @endforeach
            </td>
            <td>
            @foreach($comments as $row_comments)
            @if($row_comment_report->comment_id ==  $row_comments->comment_id )
            {{$row_comments->comment_content}} 
            @endif
            @endforeach
            </td>
            <td> 
            @foreach($comments as $row_comments)
            @if($row_comment_report->comment_id ==  $row_comments->comment_id )
            @foreach($user as $row_user)
            @if($row_user->id == $row_comments->user_id)
            {{$row_user->name}} 
            @endif
            @endforeach
            @endif
            @endforeach
            </td>
            <td>
            @foreach($user as $row_user)
            @if($row_user->id == $row_comment_report->comment_report_user_id)
            {{$row_user->name}} 
            @endif
            @endforeach</td>
            <td>
            <p>@php echo substr($row_comment_report->created_at ,0,10) @endphp</p>
                        <p> @php echo substr($row_comment_report->created_at ,10,3).' giờ : '.substr($row_comment_report->created_at ,14,2).' phút' @endphp</p>

            </td>
            
            <td>  <a href="{{url('admin/report/hidden')}}/0/{{$row_comment_report->comment_id}}/{{$row_comment_report->comment_report_id}}" title="Bỏ ẩn bình luận"><button onclick="return window.confirm('Bạn chắc chắn muốn bỏ ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye"></i></button></a>  </td>
           
           
        </tr>
       @endforeach
        </table>
        

    </section>
</main>
@endsection