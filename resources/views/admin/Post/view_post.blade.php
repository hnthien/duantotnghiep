@extends('layouts.admin')
@section('admin','Quản lý bài viết - T20 News')
@section('content')
<main>
        <section>
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Quản lý bài viết</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Bài viết <i class="fas fa-angle-right"></i>Quản lý bài viết</span>
        </div>
        <br>
        
</section>
<section class="post-contect">
    <h1 class="text-title-post" style="font-size: 20px;">{{$post->post_title}}</h1>
    <div class="col-position ">
                            @foreach($categorys_branch as $category)
                            @if($post->category_id == $category->category_id)
                            @foreach($categorys as $row_category)
                           
                            @if($category->category_branch == $row_category->category_id )
                            <a href="{{url('/category')}}/{{$row_category->category_slug}}/{{$row_category->category_id}}"><button class="col-border-categorys_title">{{$row_category->category_title}}</button></a>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            <!--  -->
                            @foreach($categorys_branch as $category)
                            @if($post->category_id == $category->category_id)
                            <a href="{{url('/category')}}/{{$category->category_slug}}/{{$category->category_id}}"><button class="col-border-categorys">{{$category->category_title}}</button></a>
                            @endif
                            @endforeach

                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="row ">
                            <div class="col-12">
                                <ul class="list-horizontal">
                                    <li>
                                        <span>Từ</span>

                                        @foreach($user as $row_user)
                                        @php
                                        $slug = Str::slug($row_user->name, '-');
                                        @endphp
                                        @if($row_user->id == $post->user_id)
                                        <a href="{{url('/user/author')}}/{{$slug}}/{{$row_user->id}}">{{$row_user->name}}</a>
                                        @endif
                                        @endforeach

                                    </li>
                                    <li>{{$date}}
                                        @php echo substr($post->created_at ,10,3).':'.substr($post->created_at ,14,2)." "; echo substr($post->created_at,5,2).'/'.substr($post->created_at ,8,2).'/'.substr($post->created_at,0,4) ; @endphp
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="text-contect-post">
                            @php echo $post->post_content @endphp
                        </div>
                        <br>
                        <div>
                            <i class="fas fa-tags"></i>
                            @foreach($post->post_tag as $tag)
                            <a href="{{url('/posts/searchs')}}/{{$tag}}">
                                <button class="col-border-categorys ">{{$tag}}</button>
                            </a>
                            @endforeach

                        </div>
                   @if(Auth::user()->role_user == 3 or Auth::user()->role_user == 1)
                   @if(Auth::user()->id != $post->user_id )
                   <form method="post" action="{{url('/admin/post/approval_updata')}}/{{$post->post_id}}" enctype="multipart/form-data">
                   @csrf          
                   <div>
                    <h3>Trạng thái</h3>
                   
                    <select name="post_status" class="input">
                    @if($post->post_status == 0)
                    <option selected value="0">Đang phê duyệt</option>
                    <option value="2">Phê duyệt</option>
                    <option value="3">Không được phê duyệt</option>
                    @endif
                    @if($post->post_status == 2)
                    <option class="background-greed" selected value="2">Phê duyệt</option>
                    <option value="0">Đang phê duyệt</option>
                    <option value="3">Không được phê duyệt</option>
                    @endif
                    @if($post->post_status == 3)
                    <option selected value="3">Không được phê duyệt</option>
                    <option value="0">Đang phê duyệt</option>
                    <option value="2">Phê duyệt</option>
                    @endif                  
                    </select>
                   
                   </div>
                   
                    <br>
                    <div class="row col-3">
                     <button type="submit" class="btn background-greed ">Phê duyệt </button>
                    </div>
                    </form>
                    @endif
                    @endif
                    
                     <div class="row">
                  @if(Auth::user()->id == $post->user_id )
                 <a class="col-3" href="{{url('admin/post/delete_my')}}/{{$post->post_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn xóa chứ !');" class="btn background-red"><i class="fas fa-trash"></i></button></a>
                 @else
                 @if(Auth::user()->role_user == 3)
                  <a class="col-3" href="{{url('admin/post/delete_my')}}/{{$post->post_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn xóa chứ !');" class="btn background-red"><i class="fas fa-trash"></i></button></a>
            
                 @endif
                 @endif
        </div>
                   @if($post->post_status==2)
                   <div>
                   <h3>Xem bình luận</h3>
                   @if($post->user_id == Auth::user()->id)
                   <a href="{{url('/admin/comment/detail_comment')}}/{{$post->post_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a>
                   @else 
                   @if(Auth::user()->role_user == 3 or Auth::user()->role_user == 1)
                   <a href="{{url('/admin/comment/detail_comment')}}/{{$post->post_id}}"><button class="btn-admin background-blue"><i class="fas fa-edit"></i></button></a>            
                   @endif 
                     @endif
                   </div>
                   @endif
                   
</section>
</main>
@endsection