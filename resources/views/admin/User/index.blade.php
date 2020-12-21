@extends('layouts.admin')
@section('admin','Quản lý người dùng - T20 News')
@section('content')
<main>
    <section class="section">
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý tài khoản</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Người dùng <i class="fas fa-angle-right"></i>Quản lý tài khoản</span>
        </div>
        <div class="row">

            <script>
                $(document).ready(function() {
                    $('#search').keyup(function() {
                        var keyword = $('#search').val();

                        $.ajax({
                            url: "{{url('admin/user/search')}}",
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
           @php
            $user = new App\User();
            $data = $user->orderBy('id', 'DESC')->paginate(15);

            @endphp
            <div class=" col-4 search">
                <span class="item"><i class="fa fa-search"></i></span>
                <input id="search" class="search__input" type="search" placeholder="Tìm kiếm......" />
                <div class="results_search" id="SearchResults"></div>

            </div>
            <div class="col-4">
                <div  style="text-align: center;float: right;">{!!$data->links()!!}</div>
            </div>
        </div>
        <br>
        <div class="row">
           

                <table class="popular-post col-12 ">
                    <tr>
                        <th >Id</th>
                        <th >Ảnh</th>
                        <th >Tên</th>
                        <th >Email</th>
                        <th >Số điện thoại</div>
                        <th >Chức vụ</th>
                        <th >Xóa</th>
                        <th >Sửa</th>
                    </tr>
                    @foreach ($data as $row)
                    <tr >
                        <td >{{$row->id}}</td>
                        <td >
                            <img src="{{ URL::asset('images/user') }}/{{$row->images_user}}" style="width:50px;height:50px;border-radius:50%" />
                        </td>
                        <td ><b>{{$row->name}}</b></td>
                        <td >{{$row->email}}</td>
                        <td >{{$row->phone_user}}</td>
                        <td >
                            @if($row->role_user == 0)
                           Người dùng
                            @else
                            @if($row->role_user == 1)
                            Kiểm Duyệt
                            @else
                            @if($row->role_user == 2)
                           Nhà Báo
                            @else
                            Admin
                            @endif
                            @endif
                            @endif
                        </td>
                        <td><a href="{{url('admin/user/delete')}}/{{$row->id}}" onclick="return window.confirm('Đại ca muốn đuổi thằng  này chứ !');"><button class="btn-admin background-red"><i class="fas fa-trash"></i></button></a></td>
                        <td><a href="{{url('admin/user/edit')}}/{{$row->id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></td>
                   
                         </tr>
                    @endforeach
                </table>
           
       
        </div>


     

    </section>
</main>

@endsection