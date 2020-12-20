@extends('layouts.admin')
@section('admin','Quản lý bình luận - T20 News')
@section('content')

<main >

    <section class="section ">
    <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Quản Lý Bình Luận</h1>
        </div>
        <div class="row">
           
            <div class="col-4">  
             <div style="text-align: center;float: right;">{!!$comments->links()!!}</div>
            </div>
        </div>
        <br>
        <div class="popular-post col-padding">
       <h2>{{$post->post_title}}</h2>
       <p>Số lượng bình luận:
       @php
       $nur =0;
       foreach($comments as $row_comments){
           $nur++;
       }
       echo $nur;
       @endphp
       </p>
     
                    
                        <div class="comments-container">
                            <ul id="comments-list" class="comments-list">
                                @foreach($comments as $cmt)
                                @if($cmt->comment_status == 1)
                                <li>
                                <div class="row">
                                <div class="col-11">
                    
                                    <div class="comment-main-level row">
                                        <!-- Avatar -->
                                        @foreach($user as $av)
                                        @if($cmt->user_id == $av->id)
                                        <div class="comment-avatar col-1"><img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt="ảnh đại diện"></div>
                                        @endif
                                        @endforeach
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box col-11">
                                            <div class="comment-head background-linet-gray">
                                                <hp class="comment-name">
                                                    @foreach($user as $av)
                                                    @if($cmt->user_id == $av->id)
                                                    {{$av->name}}
                                                    @endif
                                                    @endforeach
                                                </hp>
                                                @php
                                                $carbon = new Illuminate\Support\Carbon;
                                                $carbon::setLocale('vi');
                                                $dt = $carbon::create(substr($cmt->created_at, 0, 4), substr($cmt->created_at, 5, 2), substr($cmt->created_at, 8, 2), substr($cmt->created_at, 11, 2), substr($cmt->created_at, 14, 2), substr($cmt->created_at, 17, 2));
                                                $now = $carbon::now();
                                                $datec = $dt->diffForHumans($now);
                                                @endphp
                                               
                                                <span>{{$datec}}</span>
                                               
                                            </div>
                                            <div class="comment-content background-linet-gray">
                                                {{$cmt->comment_content}}
                                                <span class="font-size-13 text-bold">Bình luận này đã bị ẩn đi</p>

                                            </div>
                                        </div>

                                    </div>


                                    <!-- Respuestas de los comentarios -->
                                    <ul class="comments-list reply-list ">
                                        @php
                                        $comment_branch = new App\Models\Comment();
                                        $data_comment_branch = $comment_branch->where('comment_branch',$cmt->comment_id)->orderBy('comment_id', 'DESC')->get()
                                        @endphp
                                        @foreach($data_comment_branch as $row_comment_branch)
                                        @if($row_comment_branch->comment_status == 1)
                                        <li >
                                        <div class="row ">
                                        <div class="col-10">
                                            <div class="row">
                                                <!-- Avatar -->
                                                <div class="comment-avatar col-1">
                                                    @foreach($user as $av)
                                                    @if($row_comment_branch->user_id == $av->id)
                                                    <img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt="">
                                                    @endif
                                                    @endforeach
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box col-11 " >
                                                    <div class="comment-head background-linet-gray">
                                                        <hp class="comment-name ">
                                                            @foreach($user as $av)
                                                            @if($row_comment_branch->user_id == $av->id)
                                                            {{$av->name}}
                                                            @endif
                                                            @endforeach
                                                        </hp>
                                                        @php
                                                        $carbon = new Illuminate\Support\Carbon;
                                                        $carbon::setLocale('vi');
                                                        $dt = $carbon::create(substr($row_comment_branch->created_at, 0, 4), substr($row_comment_branch->created_at, 5, 2), substr($row_comment_branch->created_at, 8, 2), substr($row_comment_branch->created_at, 11, 2), substr($row_comment_branch->created_at, 14, 2), substr($row_comment_branch->created_at, 17, 2));
                                                        $now = $carbon::now();
                                                        $dateb = $dt->diffForHumans($now);
                                                        @endphp
                                                        <span>{{$dateb}}</span>

                                                    </div>
                                                    <div class="comment-content background-linet-gray">
                                                        {{$row_comment_branch->comment_content}}
                                                        <span class="font-size-13 text-bold">Bình luận này đã bị ẩn đi</p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                               
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/1/{{$row_comment_branch->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye-slash"></i></button></a> 
                                </div>
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/0/{{$row_comment_branch->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn bỏ ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye"></i></button></a> 
                                </div>
                                </div>
                                        </li>
                                        @else
                                        <li>
                                        <div class="row">
                                        <div class="col-11">
                                            <div class="row">
                                                <!-- Avatar -->
                                                <div class="comment-avatar col-1">
                                                    @foreach($user as $av)
                                                    @if($row_comment_branch->user_id == $av->id)
                                                    <img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt="">
                                                    @endif
                                                    @endforeach
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box col-10">
                                                    <div class="comment-head">
                                                        <hp class="comment-name">
                                                            @foreach($user as $av)
                                                            @if($row_comment_branch->user_id == $av->id)
                                                            {{$av->name}}
                                                            @endif
                                                            @endforeach
                                                        </hp>
                                                        @php
                                                        $carbon = new Illuminate\Support\Carbon;
                                                        $carbon::setLocale('vi');
                                                        $dt = $carbon::create(substr($row_comment_branch->created_at, 0, 4), substr($row_comment_branch->created_at, 5, 2), substr($row_comment_branch->created_at, 8, 2), substr($row_comment_branch->created_at, 11, 2), substr($row_comment_branch->created_at, 14, 2), substr($row_comment_branch->created_at, 17, 2));
                                                        $now = $carbon::now();
                                                        $dateb = $dt->diffForHumans($now);
                                                        @endphp
                                                        <span>{{$dateb}}</span>

                                                    </div>
                                                    <div class="comment-content">
                                                        {{$row_comment_branch->comment_content}}
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/1/{{$row_comment_branch->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye-slash"></i></button></a> 
                                </div>
                                </div>
                                        </li>
                                        @endif
                                      

                                        @endforeach

                                    </ul>
                                    </div>
                                    <!-- cmt 0 -->
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/1/{{$cmt->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye-slash"></i></button></a> 
                                </div>
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/0/{{$cmt->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn bỏ ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye"></i></button></a> 
                                </div>
                                </div>
                                  </li>
                                @else
                                <li>
                                <div class="row">
                                <div class="col-11">
                    
                                    <div class="comment-main-level row">
                                        <!-- Avatar -->
                                        @foreach($user as $av)
                                        @if($cmt->user_id == $av->id)
                                        <div class="comment-avatar col-1"><img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt="ảnh đại diện"></div>
                                        @endif
                                        @endforeach
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box col-11">
                                            <div class="comment-head">
                                                <hp class="comment-name">
                                                    @foreach($user as $av)
                                                    @if($cmt->user_id == $av->id)
                                                    {{$av->name}}
                                                    @endif
                                                    @endforeach
                                                </hp>
                                                @php
                                                $carbon = new Illuminate\Support\Carbon;
                                                $carbon::setLocale('vi');
                                                $dt = $carbon::create(substr($cmt->created_at, 0, 4), substr($cmt->created_at, 5, 2), substr($cmt->created_at, 8, 2), substr($cmt->created_at, 11, 2), substr($cmt->created_at, 14, 2), substr($cmt->created_at, 17, 2));
                                                $now = $carbon::now();
                                                $datec = $dt->diffForHumans($now);
                                                @endphp
                                               
                                                <span>{{$datec}}</span>
                                               
                                            </div>
                                            <div class="comment-content">
                                                {{$cmt->comment_content}}

                                            </div>
                                        </div>

                                    </div>


                                    <!-- Respuestas de los comentarios -->
                                    <ul class="comments-list reply-list ">
                                        @php
                                        $comment_branch = new App\Models\Comment();
                                        $data_comment_branch = $comment_branch->where('comment_branch',$cmt->comment_id)->orderBy('comment_id', 'DESC')->get()
                                        @endphp
                                        @foreach($data_comment_branch as $row_comment_branch)
                                        @if($row_comment_branch->comment_status == 1)
                                        <li >
                                        <div class="row ">
                                        <div class="col-10">
                                            <div class="row">
                                                <!-- Avatar -->
                                                <div class="comment-avatar col-1">
                                                    @foreach($user as $av)
                                                    @if($row_comment_branch->user_id == $av->id)
                                                    <img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt="">
                                                    @endif
                                                    @endforeach
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box col-11 " >
                                                    <div class="comment-head background-linet-gray">
                                                        <hp class="comment-name ">
                                                            @foreach($user as $av)
                                                            @if($row_comment_branch->user_id == $av->id)
                                                            {{$av->name}}
                                                            @endif
                                                            @endforeach
                                                        </hp>
                                                        @php
                                                        $carbon = new Illuminate\Support\Carbon;
                                                        $carbon::setLocale('vi');
                                                        $dt = $carbon::create(substr($row_comment_branch->created_at, 0, 4), substr($row_comment_branch->created_at, 5, 2), substr($row_comment_branch->created_at, 8, 2), substr($row_comment_branch->created_at, 11, 2), substr($row_comment_branch->created_at, 14, 2), substr($row_comment_branch->created_at, 17, 2));
                                                        $now = $carbon::now();
                                                        $dateb = $dt->diffForHumans($now);
                                                        @endphp
                                                        <span>{{$dateb}}</span>

                                                    </div>
                                                    <div class="comment-content background-linet-gray">
                                                        {{$row_comment_branch->comment_content}}
                                                        <span class="font-size-13 text-bold">Bình luận này đã bị ẩn đi</p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                               
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/1/{{$row_comment_branch->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye-slash"></i></button></a> 
                                </div>
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/0/{{$row_comment_branch->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn bỏ ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye"></i></button></a> 
                                </div>
                                </div>
                                        </li>
                                        @else
                                        <li>
                                        <div class="row">
                                        <div class="col-11">
                                            <div class="row">
                                                <!-- Avatar -->
                                                <div class="comment-avatar col-1">
                                                    @foreach($user as $av)
                                                    @if($row_comment_branch->user_id == $av->id)
                                                    <img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt="">
                                                    @endif
                                                    @endforeach
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box col-10">
                                                    <div class="comment-head">
                                                        <hp class="comment-name">
                                                            @foreach($user as $av)
                                                            @if($row_comment_branch->user_id == $av->id)
                                                            {{$av->name}}
                                                            @endif
                                                            @endforeach
                                                        </hp>
                                                        @php
                                                        $carbon = new Illuminate\Support\Carbon;
                                                        $carbon::setLocale('vi');
                                                        $dt = $carbon::create(substr($row_comment_branch->created_at, 0, 4), substr($row_comment_branch->created_at, 5, 2), substr($row_comment_branch->created_at, 8, 2), substr($row_comment_branch->created_at, 11, 2), substr($row_comment_branch->created_at, 14, 2), substr($row_comment_branch->created_at, 17, 2));
                                                        $now = $carbon::now();
                                                        $dateb = $dt->diffForHumans($now);
                                                        @endphp
                                                        <span>{{$dateb}}</span>

                                                    </div>
                                                    <div class="comment-content">
                                                        {{$row_comment_branch->comment_content}}
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                              
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/1/{{$row_comment_branch->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye-slash"></i></button></a> 
                                </div>
                                </div>
                                        </li>
                                        @endif
                                      

                                        @endforeach

                                    </ul>
                                    </div>
                                <div class="col-1">
                                <a href="{{url('admin/comment/hidden')}}/1/{{$cmt->comment_id}}"><button onclick="return window.confirm('Bạn chắc chắn muốn ẩn bình luận này chứ !');" class="btn-admin background-gray"><i class="fas fa-eye-slash"></i></button></a> 
                                </div>
                                </div>
                                  </li>
                                @endif
               

                                @endforeach

                            </ul>

                        </div>
                        <!--  -->
        </div>
        

    </section>
</main>
@endsection