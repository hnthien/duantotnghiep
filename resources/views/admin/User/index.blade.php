@extends('layouts.admin')
@section('admin','Quản lý người dùng - T20 News')
@section('content')
<main class="col-10 background-white">

    <section class="section col-padding  ">
    <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Quản Lý Người Dùng</h1>
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
            <form class=" col-4 search" method="POST">
                <input id="search" class="search__input" type="search" placeholder="Search......" />
                <div class="results_search"  id="SearchResults"></div>

            </form>
        </div>
        <br>
        <div class="popular-post col-padding">
        <div class="row  background-gray color-white text-align--center ">
            <div class="col-1 col-padding">Id</div>
            <div class="col-1 col-padding">Ảnh</div>
            <div class="col-2 col-padding">Tên Người Dùng</div>
            <div class="col-2 col-padding">Email</div>
            <div class="col-2 col-padding">Phone</div>
            <div class="col-2 col-padding">Vai Trò</div>
            <div class="col-1 col-padding">Delete</div>
            <div class="col-1 col-padding">Role</div>
        </div>
        <?php 
        $user = new App\User();
        $data = $user->orderBy('id','DESC')->paginate(9) ;
        
        ?>
        @foreach ($data as $row)
        <div class="row col-border-bottom text-align--center  col-padding--top ">
            <div class="col-1 col-padding--top"><samp>{{$row->id}}</samp></div>
            <div class="col-1 ">
                <img src="{{ URL::asset('images/user') }}/{{$row->images_user}}" style="width:50px;height:50px;border-radius:50%" />
            </div>
            <div class="col-2 col-padding--top"><samp>{{$row->name}}</samp></div>
            <div class="col-2 col-padding--top"><samp>{{$row->email}}</samp></div>
            <div class="col-2 col-padding--top"><samp>{{$row->phone_user}}</samp></div>
            <div class="col-2 col-padding--top">
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
            <div class="col-1 "><a href="{{url('admin/user/delete')}}/{{$row->id}}"><button onclick="confirm('Bạn muốn xóa tài khoản này!')" class="btn-admin background-red"><i class="fas fa-trash"></i></button></a></div>
            <div class="col-1 "><a href="{{url('admin/user/edit')}}/{{$row->id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
        </div>
        @endforeach
        <div style="position: relative;left: 40%;text-align: center;width:20%">{!!$data->links()!!}</div>
        </div>
        

    </section>
</main>
@endsection