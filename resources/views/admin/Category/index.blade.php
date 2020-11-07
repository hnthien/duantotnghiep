@extends('layouts.admin') @section('admin','Quản lý chủ đề - T20 News')
@section('content')

<script>
 function myFunction() {
alert("Bạn có muốn xóa!!");
}
 </script>
<main class="col-10 background-white">

    <section class="section col-padding  ">
        <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Quản Lý Chủ Đề</h1>
        </div>
        <div class="row">
            <div class="col-2">
                <a class="col-margin--bottom" href="{{route('category.create')}}">
                    <button class="btn background-greed">New User</button>
                </a>
            </div>
            <form class=" col-4 search" method="POST">
                <input class="search__input" type="search" placeholder="Search......"/>
            </form>
        </div>
        <br>
        <?php
             $user = new App\Category();
             $categorys = $user->orderBy('category_id','DESC')->paginate(9) ;
            
            ?>
        <div class="popular-post col-padding">
            <div class="row text-bold background-gray color-white text-align--center ">
                <div class="col-1 col-padding">Id</div>
                <div class="col-3 col-padding">Tên Chủ Đề</div>
                <div class="col-3 col-padding">Branch</div>
                <div class="col-3 col-padding">Intro</div>
                <div class="col-1 col-padding">Delete</div>
                <div class="col-1 col-padding">Update</div>
            </div>
            
            @foreach($categorys as $cat)
            <div
                class="row col-border-bottom text-align--center  col-padding--top col-padding--bottom">
                <div class="col-1 col-padding--top">{{$cat->category_id}}</div>
                <div class="col-3 col-padding--top">{{$cat->category_title}}</div>
                <div class="col-3 col-padding--top">{{$cat->category_branch}}</div>
                <div class="col-3 col-padding--top">{{$cat->category_intro}}</div>
                <div class="col-1 ">
                <form action="{{route('category.destroy',$cat->category_id)}}" method="post">
                @csrf @method('DELETE')
                    <button onclick="myFunction()" class="btn-admin background-red">
                        <i class="fas fa-trash"></i>
                    </button>
                    
                    </form>
                </div>
                <div class="col-1 ">
                    <a href="{{route('category.edit', $cat->category_id)}}">
                        <button class="btn-admin background-blue">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </section>
</main>
@endsection