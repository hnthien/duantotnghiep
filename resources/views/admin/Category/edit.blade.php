@extends('layouts.admin')
@section('admin','Quản lý chủ đề - Edit user')
@section('content')
        <main class="col-10 background-white">
        <section class="section col-padding  ">
        <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Chỉnh Sửa Chủ Đề</h1>
        </div>
        <div class="col-2"> <a class="col-margin--bottom" href="new_user.html"><button class="btn background-greed">New User</button></a>
        </div>
        <br>
        <form method="GET">
            <div class=" popular-post col-padding">
               
                    <h3>ID:</h3>
                    <input class="input" type="text" name="name_post" />
                    <h3>Tên Chủ Đề:</h3>
                    <input class="input" type="text" name="name_post" />
            </div>
            <div class="row col-3">
                <button class="btn background-greed">Lưu</button>
            </div>

        </form>

    </section>
        </main>
@endsection 