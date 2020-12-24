@extends('layouts.admin')
@section('admin','Đóng Góp Ý Kiến - T20 News')
@section('content')
<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            var keyword = $('#search').val();
            $.ajax({
                url: "{{url('admin/feedback/search')}}",
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
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý phản hồi</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Phản hồi <i class="fas fa-angle-right"></i>Quản lý phản hồi</span>
        </div>
        <div class="row">
            <div class=" col-4 search">
                <span class="item"><i class="fa fa-search"></i></span>
                <input class="search__input" id="search" type="search" placeholder="Tìm kiếm......" />
                <div class="results_search" id="SearchResults"></div>
            </div>
            <div class="col-4">
            <div class="row">
                    <div class="col-6">
                <a href="{{url('admin/feedback')}}">
                    <button class="btn background-red" id="not_seen">Chưa xem</button>
                </a>
                </div>
                <div class="col-6">
                    <a href="{{url('admin/feedback/watched')}}">
                    <button class="btn  background-greed" id="watched">Đã xem</button>
                    </a>
                    </div>
                
                </div>
            </div>
        </div>
        @php
        $feedback = new App\Models\Feedback();
        $watched = $feedback->where('feedback_status', 1)->orderBy('feedback_id', 'DESC')->paginate(30);
        $user = new App\User();
        $data1 = $user->all();
        @endphp
        <br>
        <table class="popular-post col-padding">
            <tr>
                <th>ID</th>
                <th >Trạng Thái</th>
                <th >Tiêu Đề</th>
                <th >Người Gửi</th>
                <th >Ngày</th>
                <th>Chi Tiết</th>
            </tr>
           
                @foreach($watched as $row)
                <tr >
                    <td>{{$row->feedback_id}}</td>
                    <td>@if($row->feedback_status == 0)<span style="color: red;">Chưa xem</span>@else<span style="color:green;"><i title="đã xem" class="fas fa-eye"></i>Đã Xem</span>@endif</td>
                    <td>{{$row->feedback_title}}</td>
                    <td class="col-2 col-padding--top">
                        @foreach($data1 as $row1)
                        @if($row1->id == $row->user_id)
                        {{$row1->name}}<br>
                        {{$row1->email}}
                        @endif
                        @endforeach
                    </td>
                    <td class="col-2 col-padding--top">
                        <p>@php echo substr($row->created_at ,0,10) @endphp</p>
                        <p>@php echo substr($row->created_at ,10,3).' giờ '.substr($row->created_at ,14,2).' phút' @endphp</p>
                    </td>
                    <td class="col-2 "><a href="{{url('/admin/feedback/detail_feedback')}}/{{$row->feedback_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></td>

                </tr>
                @endforeach

              

        </table>
           <div   style="position: relative;left: 40%;text-align: center;width:20%">{!!$watched->links()!!}</div>
          

    </section>
</main>
@endsection