@extends('layouts.admin')
@section('admin','Quản lý người dùng - Edit user')
@section('content')
<main >
    <section class="section ">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Cấp quyền tài khoản</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Người dùng <i class="fas fa-angle-right"></i>Cấp quyền tài khoản</span>
        </div>
        <div class="col-2">    </div>
        <br>
        <form action="{{url('admin/user/updata')}}/{{$data->id}}" method="POST" class="box-shadow col-padding background-white" enctype="multipart/form-data">
            @csrf
            <div class="row col-position" >
                <div class="col-3">
                    <img name="images_user" src="{{ URL::asset('images/user') }}/{{$data->images_user}}" alt="images" class="img " />

                    <button type="submit" class="btn background-gray col-border--none">Lưu</button>
                </div>
                <div class="col-9 col-margin-left col-position ">
                <span class="text-bold" ><i class="fas fa-user-edit"></i>Giới Thiệu.</span>

                <div style="height:100%;width: 100%;padding-top:10px; overflow: auto;">{{$data->intro_user }}</div>


                </div>

                
            </div>
           
            <div class="row" style="margin:0px 5px">
                <div class="col-12">
                    <div class="box col-margin--bottom">
                        <i class="fas fa-user"></i>
                        <span style="font-size: 15px;">{{$data->name}}</span>
                    </div>
                    <div class="box col-margin--bottom">
                        <i class="fas fa-envelope"></i>
                        <span style="font-size: 15px;">{{$data->email}}</span>

                    </div>
                    <div class="box ">
                        <i class="fas fa-phone-alt"></i>
                        <span style="font-size: 15px;">{{$data->phone_user}}</span>
                    </div>
                    <div class="form__input box_input ">
                        <i class="fas fa-user-circle"></i>
                        <select name="role_user">
                            @if($data->role_user==0)
                            <option selected value="0">Người Dùng</option>
                            <option value="1">Kiểm Duyệt</option>
                            <option value="2">Nhà Báo</option>
                            <option value="3">Admin</option>
                            @else
                            @if($data->role_user==1)
                            <option value="0">Người Dùng</option>
                            <option selected value="1">Kiểm Duyệt</option>
                            <option value="2">Nhà Báo</option>
                            <option value="3">Admin</option>
                            @else
                            @if($data->role_user==2)
                            <option value="0">Người Dùng</option>
                            <option value="1">Kiểm Duyệt</option>
                            <option selected value="2">Nhà Báo</option>
                            <option value="3">Admin</option>
                            @else
                            @if($data->role_user==3)
                            <option value="0">Người Dùng</option>
                            <option value="1">Kiểm Duyệt</option>
                            <option value="2">Nhà Báo</option>
                            <option selected value="3">Admin</option>
                            @else
                            @endif
                            @endif
                            @endif
                            @endif
                        </select>
                    </div>
                    <div class="form__input box_input ">
                        <i class="fas fa-user-circle"></i>
                        <select name="guilty_user">
                            @if($data->guilty_user==0)
                            <option selected value="0">Bình thường</option>
                            <option value="1">Cấm bình luận 1 ngày</option>
                            <option value="2">Cấm bình luận 10 ngày</option>                          
                            @else
                            @if($data->guilty_user==1)
                            <option value="0">Bình thường</option>
                            <option selected value="1">Cấm bình luận 1 ngày</option>
                            <option value="2">Cấm bình luận 10 ngày</option>                          
                            @else
                            @if($data->guilty_user==2)
                            <option value="0">Bình thường</option>
                            <option value="1">Cấm bình luận 1 ngày</option>
                            <option selected  value="2">Cấm bình luận 10 ngày</option>  
                            @else                       
                            @endif
                            @endif
                            @endif
                        </select>
                    </div>
                </div>
            </div>


        </form>




    </section>
</main>
@endsection