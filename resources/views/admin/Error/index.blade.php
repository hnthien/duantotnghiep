@extends('layouts.admin')
@section('admin','Báo Lỗi - T20 News')
@section('content')
<script>
    $(document).ready(function() {
        $("#not_seen_box").show();
        $('#not_seen').click(function() {
            $("#not_seen_box").show();
            $("#watched_box").hide();

        });
        $('#watched').click(function() {
            $("#watched_box").show();
            $("#not_seen_box").hide();
        });

    });

    $(document).ready(function() {
        $('#search').keyup(function() {
            var keyword = $('#search').val();
            $.ajax({
                url: "{{url('admin/error/search')}}",
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
    <section >
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý bug</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bug <i class="fas fa-angle-right"></i>Quản lý bug</span>
        </div>
        <div class="row">
            <form class=" col-4 search" method="POST">
                <span class="item"><i class="fa fa-search"></i></span>
                <input class="search__input" id="search" type="search" placeholder="Tìm kiếm......" />
                <div class="results_search" id="SearchResults"></div>
            </form>
            <div class="col-4">
                <div class="row">
                    <button class="btn col-6 background-red" id="not_seen">Chưa xem</button>
                    <button class="btn col-6 background-greed" id="watched">Đã xem</button>
                </div>
            </div>
        </div>
        <?php
        $error = new App\Error();
        $not_seen = $error->where('error_status', 0)->orderBy('error_id', 'DESC')->paginate(9);
        $watched = $error->where('error_status', 1)->orderBy('error_id', 'DESC')->paginate(9);
        $user = new App\User();
        $data1 = $user->all();
        ?>
        <br>
        <table>
            <tr>
                <th>ID</th>
                <th>Trạng Thái</th>
                <th>Tiêu Đề</th>
                <th>Người Gửi</th>
                <th>ngày</th>
                <th>Chi Tiết</th>
            </tr>
            <!-- not_seen_box  -->
           
                @foreach($not_seen as $row)
                <tr id='not_seen_box'>
                    <td>{{$row->error_id}}</td>
                    <td>@if($row->error_status == 0)<span style="color: red;"><i title="chưa xem" class="fas fa-eye"></i>Chưa xem</span>@endif</td>
                    <td>{{$row->error_title}}</td>
                    <td>
                        @foreach($data1 as $row1)
                        @if($row1->id == $row->user_id)
                        {{$row1->name}}<br>
                        {{$row1->email}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <p>@php echo substr($row->created_at ,0,10) @endphp</p>
                        <p> @php echo substr($row->created_at ,10,3).' giờ '.substr($row->created_at ,14,2).' phút' @endphp</p>

                    </td>
                    <td><a href="{{url('/admin/error/detail_error')}}/{{$row->error_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></td>

                </tr>
                @endforeach
            <!-- watched_box  -->
           
                @foreach($watched as $row)
                <tr id='watched_box'>
                 <td>{{$row->error_id}}</td>
                    <td>@if($row->error_status == 0)<span style="color: red;">Chưa xem</span>@else<span style="color:green;"><i title="đã xem" class="fas fa-eye"></i> Đã Xem</span>@endif</td>
                    <td>{{$row->error_title}}</td>
                    <td>
                        @foreach($data1 as $row1)
                        @if($row1->id == $row->user_id)
                        {{$row1->name}}<br>
                        {{$row1->email}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <p>@php echo substr($row->created_at ,0,10) @endphp</p>
                        <p>@php echo substr($row->created_at ,10,3).' giờ '.substr($row->created_at ,14,2).' phút' @endphp</p>

                    </td>
                    <td><a href="{{url('/admin/error/detail_error')}}/{{$row->error_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></td>

                </tr>
                @endforeach

              

        </table>

        <div id='watched_box' style="position: relative;left: 40%;text-align: center;width:20%">{!!$watched->links()!!}</div>         
        <div id='not_seen_box' style="position: relative;left: 40%;text-align: center;width:20%">{!!$not_seen->links()!!}</div>
            
    </section>
</main>
@endsection