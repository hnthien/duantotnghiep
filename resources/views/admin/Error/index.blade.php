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
<main class="col-10 background-white">

    <section class="section col-padding  ">
        <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Lỗi Người Dùng Báo Cáo</h1>
        </div>
        <div class="row">
            <form class=" col-4 search" method="POST">
                <input class="search__input" id="search" type="search" placeholder="Search......" />
                <div class="results_search"  id="SearchResults"></div>
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
        <div class="popular-post col-padding">
            <div class="row text-bold background-gray color-white text-align--center ">
                <div class="col-1 col-padding">ID</div>
                <div class="col-2 col-padding">Trạng Thái</div>
                <div class="col-4 col-padding">Tiêu Đề</div>
                <div class="col-3 col-padding">Người Gửi</div>
                <div class="col-2 col-padding">Chi Tiết</div>
            </div>
            <!-- not_seen_box  -->
            <div id='not_seen_box'>
                @foreach($not_seen as $row)
                <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
                    <div class="col-1 col-padding">{{$row->error_id}}</div>
                    <div class="col-2 col-padding">@if($row->error_status == 0)<span style="color: red;">Chưa xem</span>@else<span style="color:green;">Đã Xem</span>@endif</div>
                    <div class="col-4 col-padding--top text-bold">{{$row->error_title}}</div>
                    <div class="col-3 col-padding--top">
                        @foreach($data1 as $row1)
                        @if($row1->id == $row->user_id)
                        {{$row1->name}}<br>
                        {{$row1->email}}
                        @endif
                        @endforeach
                    </div>
                    <div class="col-2 "><a href="{{url('/admin/error/detail_error')}}/{{$row->error_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>

                </div>
                @endforeach

                <div style="position: relative;left: 40%;text-align: center;width:20%">{!!$not_seen->links()!!}</div>
            </div>
            <!-- watched_box  -->
            <div id='watched_box'>
                @foreach($watched as $row)
                <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
                    <div class="col-1 col-padding">{{$row->error_id}}</div>
                    <div class="col-2 col-padding">@if($row->error_status == 0)<span style="color: red;">Chưa xem</span>@else<span style="color:green;">Đã Xem</span>@endif</div>
                    <div class="col-4 col-padding--top text-bold">{{$row->error_title}}</div>
                    <div class="col-3 col-padding--top">
                        @foreach($data1 as $row1)
                        @if($row1->id == $row->user_id)
                        {{$row1->name}}<br>
                        {{$row1->email}}
                        @endif
                        @endforeach
                    </div>
                    <div class="col-2 "><a href="{{url('/admin/error/detail_error')}}/{{$row->error_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>

                </div>
                @endforeach

                <div style="position: relative;left: 40%;text-align: center;width:20%">{!!$watched->links()!!}</div>
            </div>

        </div>


    </section>
</main>
@endsection