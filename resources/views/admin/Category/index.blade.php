@extends('layouts.admin') 
@section('admin','Quản lý chủ đề - T20 News')
@section('content')

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
                    <button class="btn background-greed">+ Thêm Danh mục</button>
                </a>
            </div>
            <div class="col-3">
                <div style="text-align: center;float: right;">{!!$categorys->links()!!}</div>
            </div>
        </div>
        <br>
        <table class="popular-post col-padding">
            <tr>
                <th>Id</th>
                <th>Danh mục</th>
                <th>Danh mục con</th>
                <th style="width:140px">Thêm Danh mục con</th>
                <th>Xóa</th>
                <th>Sửa</th>
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
                            <a href="{{url('admin/category/edit')}}/{{ $row_branch->category_slug}}/{{ $row_branch->category_id}}">
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
                        <button class="btn background-greed">+ Danh mục</button>
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
                    <a href="{{url('admin/category/edit')}}/{{ $row->category_slug}}/{{ $row->category_id}}">
                        <button class="btn-admin background-blue">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        
    </section>
</main>
@endsection