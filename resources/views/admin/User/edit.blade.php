<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images')}}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng - Edit user</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
</head>

<body>
    <div class="row">
        <header class="col-margin--none ">
        @include('../admin/header');



        </header>
        <main class="col-10 background-white">
            <section class="section col-padding  ">
                <h1>Chỉnh Sửa Người Dùng</h1>
                <div class="col-2"> <a class="col-margin--bottom" href="new_user.html"><button class="btn background-greed">New User</button></a>
                </div>
                <br>
                <form method="GET">
                    <div class="row">
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
                            <input class="input" type="file" name="images_post" />
                            <h3>Vai Trò:</h3>
                            <select class="input" name="code_category">
                                <option>Người Dùng</option>
                                <option>Tác Giả (Nhà Báo)</option>
                                <option>Kiểm Duyệt</option>
                                <option>Admin</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row col-3">
                        <button class="btn background-greed">Updata</button>
                    </div>

                </form>

            </section>
        </main>
    </div>


</body>

</html>