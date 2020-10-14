<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images')}}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng - T20 News</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
</head>

<body>
    <div class="row ">

        <header class="col-margin--none ">
        @include('../admin/header');



        </header>
        <main class="col-10 background-white">
            <section class="section col-padding  ">
                <h1>Quản lý người dùng</h1>
                <div class="row">
                    <div class="col-2">
                        <a class="col-margin--bottom" href="{{url('/user/new_user')}}"><button class="btn background-greed">New User</button></a>
                    </div>
                    <form class=" col-4 search" method="POST">
                        <input class="search__input" type="search" placeholder="Search......" />
                    </form>
                </div>
                <br>
                <div class="row text-bold background-gray color-white text-align--center ">
                    <div class="col-1 col-padding">Id</div>
                    <div class="col-1 col-padding">Ảnh</div>
                    <div class="col-5 col-padding">Tên Người Dùng</div>
                    <div class="col-3 col-padding">Vai Trò</div>
                    <div class="col-1 col-padding">Delete</div>
                    <div class="col-1 col-padding">Update</div>
                </div>
                <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
                    <div class="col-1 col-padding--top">1</div>
                    <div class="col-1 ">
                        <img src="../../style/images/User/photo-5-1584724728351316096626.jpg" class="img" />
                    </div>
                    <div class="col-5 col-padding--top">Administrator</div>
                    <div class="col-3 col-padding--top">Admin</div>
                    <div class="col-1 "><button class="btn-admin background-red"><i class="fas fa-trash"></i></button></div>
                    <div class="col-1 "><a href="{{url('/user/edit')}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
                </div>
                <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
                    <div class="col-1 col-padding--top">1</div>
                    <div class="col-1 ">
                        <img src="../../style/images/User/photo-5-1584724728351316096626.jpg" class="img" />
                    </div>
                    <div class="col-5 col-padding--top">Administrator</div>
                    <div class="col-3 col-padding--top">Admin</div>
                    <div class="col-1 "><button class="btn-admin background-red"><i class="fas fa-trash"></i></button></div>
                    <div class="col-1 "><a href="edit.html"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
                </div>
                <div class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
                    <div class="col-1 col-padding--top">1</div>
                    <div class="col-1 ">
                        <img src="../../style/images/User/photo-5-1584724728351316096626.jpg" class="img" />
                    </div>
                    <div class="col-5 col-padding--top">Administrator</div>
                    <div class="col-3 col-padding--top">Admin</div>
                    <div class="col-1 "><button class="btn-admin background-red"><i class="fas fa-trash"></i></button></div>
                    <div class="col-1 "><a href="edit.html"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a></div>
                </div>

            </section>
        </main>
    </div>


</body>

</html>