@extends('layouts.admin')
@section('admin','Quản lý bình luận - T20 News')
@section('content')


<main >

    <section class="section ">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý bình luận</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bình luận <i class="fas fa-angle-right"></i>Quản lý bình luận</span>
        </div>
        <div class="row">
            <form class=" col-4 search" method="POST">
                <input class="search__input" type="search" placeholder="Search......" />
            </form>
            <div class="col-4">  
             <div style="text-align: center;float: right;">{!!$post->links()!!}</div>
            </div>
        </div>
        <br>
        <table class="popular-post ">
        <tr >
            <th>#</th>
            <th>Tên bài viết</th>
            <th>Ngày viết</th>
            <th>Số lượng bình luận</th>
            <th>Chi tiết</th>
        </tr>
        @foreach($post as $row_post)
        
        <tr>
           
            <td>{{$row_post->post_id}}</td>
            <td>{{$row_post->post_title}}</td>
            <td>
            <p> @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2).'<br>'; echo substr($row_post->created_at ,0,10) ; @endphp</p>
           
            </td>
            <td>
            @php
                                $nur= 0;
                                foreach($comments as $row_comments){
                                    if($row_comments->post_id ==$row_post->post_id ){
                                    $nur++;
                                }
                                }
                                
                                echo '<b>' . $nur . '</b>';
                                @endphp
                                </td>
            <td>
            @if($row_post->user_id == Auth::user()->id)
                <a href="{{url('/admin/comment/detail_comment')}}/{{$row_post->post_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a>
            @else 
            @if(Auth::user()->role_user == 3 or Auth::user()->role_user == 1)
            <a href="{{url('/admin/comment/detail_comment')}}/{{$row_post->post_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a>            
            @endif 
            @endif
            </td>
        </tr>
        @endforeach
       
        </table>
        

    </section>
</main>
@endsection