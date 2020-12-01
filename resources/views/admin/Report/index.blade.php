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
            <form class=" col-4 search" method="POST">
                <input class="search__input" type="search" placeholder="Search......" />
            </form>
        </div>
        <br>
        <table >
        <tr >
            <th>Trạng Thái</th>
            <th>Nội dung bình luận</th>
            <th>Người Vi Phạm</th>
            <th>Người Gửi</th>
            <th>Chi tiết</th>
        </tr>
        @foreach($comment_report as $row_comment_report)
        <tr >
            <td>@if($row_comment_report->comment_report_status == 0)
             Chưa xem
             @endif
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
            <td><a href="{{url('/report/detail_report')}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></td>
        </tr>
       @endforeach
        </table>
        

    </section>
</main>
@endsection