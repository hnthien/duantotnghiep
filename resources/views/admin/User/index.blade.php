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
            <?php
            $user = new App\User();
            $data = $user->orderBy('id', 'DESC')->paginate(9);

            ?>
            <form class=" col-4 search" method="POST">
                <span class="item"><i class="fa fa-search"></i></span>
                <input id="search" class="search__input" type="search" placeholder="Search......" />
                <div class="results_search" id="SearchResults"></div>

            </form>
        </div>
        <br>
        <div class="row">
            <form class="col-12" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4 col-margin--bottom">
                        <button type="submit" onclick="return window.confirm('Đại ca có chắc muốn đuổi tất cả bọn nó ra khỏi hội !');" formaction="{{url('admin/user/delete_all')}}" class="btn background-red">Delete all select</button>
                    </div>
                    <div class="col-6 col-padding color-red">
                        @if (session('notification'))
                        <b>{{ session('notification') }}</b>
                        @endif
                    </div>
                </div>

                <table class="popular-post col-12 ">
                    <tr>
                        <th><input type="checkbox" class="selectall" /></th>
                        <th >Id</th>
                        <th >Ảnh</th>
                        <th >User name</th>
                        <th >Email</th>
                        <th >Phone</div>
                        <th >Role</th>
                        <th >Delete</th>
                        <th >Edit</th>
                    </tr>
                    @foreach ($data as $row)
                    <tr >
                        <td><input type="checkbox" name="ids[]" class="selectbox" value="{{$row->id}}" /></td>
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
                        <!-- <div class="col-1 col-padding--top"><a href="{{url('admin/user/delete')}}/{{$row->id}}" onclick="return window.confirm('Đại ca muốn đuổi thằng  này chứ !');"><button class="btn-admin background-red"><i class="fas fa-trash"></i></button></a></div>
                        <div class="col-1 col-padding--top"><a href="{{url('admin/user/edit')}}/{{$row->id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
                    -->
                        <td ><button  onclick="return window.confirm('Đại ca muốn đuổi thằng  này chứ !');" formaction="{{url('admin/user/delete')}}/{{$row->id}}" class="btn-admin background-red"><i class="fas fa-trash"></i></button></td>
                        <td ><button formaction="{{url('admin/user/edit')}}/{{$row->id}}" class="btn-admin background-blue"><i class="fas fa-edit"></i></button></td>                                                    
                    </tr>
                    @endforeach
                </table>
            </form>
       
        </div>


        <div style="position: relative;left: 40%;text-align: center;width:20%">{!!$data->links()!!}</div>

    </section>
</main>
<script type="text/javascript">
    $('.selectall').click(function() {
        $('.selectbox').prop('checked', $(this).prop('checked'));
    });

    $('.selectbox').change(function() {
        var total = $('.selectall').length;
        var number = $('.selectall:checked').length;
        if (total == number) {
            $('.selectall').prop('checked', true);
        } else {
            $('.selectall').prop('checked', false);
        }
    });
</script>
@endsection