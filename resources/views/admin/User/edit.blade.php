@extends('layouts.admin')
@section('admin','Quản lý người dùng - Edit user')
@section('content')
        <main class="col-10 background-white">
        <section class="section col-padding  ">
        <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Chỉnh Sửa Người Dùng</h1>
        </div>
        <div class="col-2"> <a class="col-margin--bottom" href="new_user.html"><button class="btn background-greed">New User</button></a>
        </div>
        <br>
        <form method="GET">
            <div class="row popular-post col-padding">
                <div class="col-6">
                    <h3>Tên Người Dùng:</h3>
                    <input class="input" type="text" name="name_post" />
                    <h3>Email:</h3>
                    <input class="input" type="text" name="info_post" />
                    <h3>Mật Khẩu:</h3>
                    <input class="input" type="password" name="content_post" />
                    <h3>Nhập Lại Mật Khẩu:</h3>
                    <input class="input" type="password" name="content_post" />
                </div>
                <div class="col-6">
                    <h3>Ảnh Đại Diện</h3>
                    <input style="height: 157px;" class="input" type="file" name="images_post" />
                    <h3>Vai Trò:</h3>
                    <select class="input" name="code_category">
                        <option>Người Dùng</option>
                        <option>Tác Giả (Nhà Báo)</option>
                        <option>Kiểm Duyệt</option>
                        <option>Admin</option>
                    </select>
                </div>
            </div>
            <div class="row col-3">
                <button class="btn background-greed">Lưu</button>
            </div>

        </form>

    </section>
        </main>
@endsection 