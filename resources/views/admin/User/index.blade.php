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
        <form  method="POST">
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

            <div class="popular-post ">
                <div class="row  background-gray color-white text-align--center ">
                    <div class="col-1 col-padding"><input type="checkbox" class="selectall" /></div>
                    <div class="col-1 col-padding">Id</div>
                    <div class="col-1 col-padding">Ảnh</div>
                    <div class="col-2 col-padding">User name</div>
                    <div class="col-2 col-padding">Email</div>
                    <div class="col-2 col-padding">Phone</div>
                    <div class="col-1 col-padding">Role</div>
                    <div class="col-1 col-padding">Delete</div>
                    <div class="col-1 col-padding">Role</div>
                </div>
                @foreach ($data as $row)
                <div class="row col-border-bottom text-align--center  col-padding--top ">
                    <div class="col-1 col-padding--top"><input type="checkbox" name="ids[]" class="selectbox" value="{{$row->id}}" /></div>
                    <div class="col-1 col-padding--top"><samp>{{$row->id}}</samp></div>
                    <div class="col-1 ">
                        <img src="{{ URL::asset('images/user') }}/{{$row->images_user}}" style="width:50px;height:50px;border-radius:50%" />
                    </div>
                    <div class="col-2 col-padding--top"><samp>{{$row->name}}</samp></div>
                    <div class="col-2 col-padding--top"><samp>{{$row->email}}</samp></div>
                    <div class="col-2 col-padding--top"><samp>{{$row->phone_user}}</samp></div>
                    <div class="col-1 col-padding--top">
                        @if($row->role_user == 0)
                        <samp>Người dùng</samp>
                        @else
                        @if($row->role_user == 1)
                        <samp>Kiểm Duyệt</samp>
                        @else
                        @if($row->role_user == 2)
                        <samp>Nhà Báo</samp>
                        @else
                        <samp>Admin</samp>
                        @endif
                        @endif
                        @endif
                    </div>
                    <div class="col-1 "><a href="{{url('admin/user/delete')}}/{{$row->id}}"><button onclick="return window.confirm('Đại ca muốn đuổi thàng này này chứ !');" class="btn-admin background-red"><i class="fas fa-trash"></i></button></a></div>
                    <div class="col-1 "><a href="{{url('admin/user/edit')}}/{{$row->id}}"><button formaction="{{url('admin/user/edit')}}/{{$row->id}}" class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
     
                </div>
                @endforeach
            </div>
        </form>
        @foreach($data as $row)
         @endforeach
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