@extends('layouts.admin') @section('admin','Quản lý chủ đề - T20 News')
@section('content')

<script>
    function myFunction() {
        alert("Bạn có muốn xóa!!");
    }
</script>
<main>

    <section>
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý chủ đề</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Chủ đề <i class="fas fa-angle-right"></i>Quản lý chủ đề</span>
        </div>
        <div class="row">
            <div class="col-2">
                <a class="col-margin--bottom" href="{{url('admin/category/new_category')}}">
                    <button class="btn background-greed">+ Add New Category</button>
                </a>
            </div>
            <form class=" col-4 search" method="POST">
                <input class="search__input" type="search" placeholder="Search......" />
            </form>
        </div>
        <br>
        <table class="popular-post col-padding">
            <tr>
                <th>Id</th>
                <th>Tên Chủ Đề</th>
                <th>Sub-Categories</th>
                <th style="width:140px">Add Subcategory</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>

            @foreach($categorys as $row)
            <tr>
                <td>{{$row->category_id}}</td>
                <td>{{$row->category_title}}</td>
                <td>
                    <table>
                        @foreach($categorys_branch as $row_branch)
                        @if($row_branch->category_branch == $row->category_id )
                        <tr>
                        <td>{{$row_branch->category_title}}</td>
                        <td style="width:50px">
                            <a href="{{url('admin/category/delete')}}/{{ $row_branch->category_id}}">
                                <button onclick="return window.confirm('Bạn chắc chắn muốn xóa chứ !');" class="btn-admin background-red">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </a>

                        </td>
                        <td class="col-1 ">
                            <a href="{{url('admin/category/edit')}}/{{ $row_branch->category_id}}">
                                <button class="btn-admin background-blue">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                        </td>
                        </tr>
                        
                        @endif
                        @endforeach
                    </table>
                </td>
                <td> <a href="{{url('admin/category/new_category_branch')}}/{{ $row->category_id}}">
                        <button class="btn background-greed">+ Subcategory</button>
                    </a>
                </td>
                <td>
                    <a href="{{url('admin/category/delete')}}/{{ $row->category_id}}">
                        <button onclick="return window.confirm('Bạn chắc chắn muốn xóa chứ !');" class="btn-admin background-red">
                            <i class="fas fa-trash"></i>
                        </button>
                    </a>

                </td>
                <td class="col-1 ">
                    <a href="{{url('admin/category/edit')}}/{{ $row->category_id}}">
                        <button class="btn-admin background-blue">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        <div style="text-align: center">{!!$categorys->links()!!}</div>
    </section>
</main>
@endsection