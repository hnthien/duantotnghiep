@extends('layouts.client')
@section('client',$post->post_title,$post->post_id)
@section('content')
<main class="content col-margin--top col-padding">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="{{url('/')}}"><b><i class="fas fa-home text-color--gray"></i> Home <i class="fas fa-angle-right"></i></b></a></li>
            <li class="color-red text-bold">Tin Tức <i class="fas fa-angle-right"></i></li>
            @foreach($categorys_branch as $category)
            @if($post->category_id == $category->category_id)
            @foreach($categorys as $row_category)
            @if($category->category_branch == $row_category->category_id )
            <li class="color-red text-bold"> <a href="{{url('/category/')}}/{{$row_category->category_slug}}/{{$row_category->category_id}}">{{$row_category->category_title}}</a> <i class="fas fa-angle-right"></i> </li>
            @endif
            @endforeach
            @endif
            @endforeach
            <li class="color-red text-bold">
                @foreach($categorys_branch as $category)
                @if($post->category_id == $category->category_id)
                <a href="{{url('/category/')}}/{{$category->category_slug}}/{{$category->category_id}}">{{$category->category_title}}</a>
                @endif
                @endforeach
            </li>
        </ul>
    </div>
    <section class="section ">
        <div class="row">
            <div class="col-8  ">
                <div class="row ">
                    <div class=" popular-post post-contect">
                        <h1 class="text-title-post">{{$post->post_title}}</h1>
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
                        <!-- like -->
                        <script>
                            $(document).ready(function() {
                                $('#post_like').load("{{url('post_like')}}/{{$post->post_id}}");
                            })
                        </script>
                       
                        <div class="row col-margin--bottom">
                            <div style="margin-left: 0px;" class="col-4" id="post_like"">

                                </div>
                                <div style=" padding-top: 10px;box-sizing: border-box;" class="col-8 col-right">
                                <span><b>{{$post->post_view}} view </b></span>&ensp;
                                <span> <i class="fas fa-comments"></i>
                                @php
                                $dislike = 0;
                                foreach($comments as $row_comments){$dislike++;}
                                echo '<b>' . $dislike . '</b>';
                                @endphp
                                
                                </span>
                            </div>
                        </div>

                        <!-- endlike -->
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

                    </div>



                </div>
                     <script>
                $(document).ready(function() {
                    $('#form_comment').submit(function(event) {
                        event.preventDefault();
                        var comment = $('#comment_content').val();
                        var post_id = $('#post_id').val();
                       
                        $.ajax({
                            url: "{{url('admin/comment/create_comment')}}",
                            cache: false,
                            type: "post",
                            data: {
                                comment: comment,
                                post_id: post_id,
                                "_token": '{{ csrf_token() }}'
                            },
                            success: function(data) {                             
                                $('#comment_content').val("");                     
                                setTimeout(function() {
                                    $('#comment_view').load("{{url('comment/comment_view')}}/{{$post->post_id}}");
                                }, 1000);
                            },
                            error: function(data) {
                               
                            },
                        })

                    })
                   
                
                });
                $(document).ready(function() {
                    $('#comment_view').load("{{url('comment/comment_view')}}/{{$post->post_id}}");
                    return;
                });
                </script>
                <div class="popular-post post-contect ">
                <h2>Bình Luận (@php
                                $dislike = 0;
                                foreach($comments as $row_comments){$dislike++;}
                                echo '<b>' . $dislike . '</b>';
                                @endphp)</h2>
                    
                    <!-- write comment zone -->
                    @if (Auth::check())
                    <form id='form_comment' action="{{url('comment/create_comment')}}" method="post">
                        @csrf
                        <div class="form-comment">
                            <div class="make-comment">
                                <span class="text-danger"><b id="review"></b></span>
                                <textarea name="comment_content" id="comment_content"  class="form-textarea" maxlength="4999" placeholder="Nhập bình luận..."></textarea>                         
                                <input id="post_id"  type=hidden name="post_id" value="{{$post->post_id}}" />

                            </div>
                            <button type="submit" class="btn-submit btn-style">Post Comment</button>
                        </div>
                    </form>
                    @else
                    <p class="color-light-gray">Vui lòng <a href="{{ route('login') }}">đăng nhập </a> để bình luận </p>
                    @endif
                    <!-- views comment zone -->
                    @if (session('report'))
                    <script>
                    alert("{{ session('report') }}");
                    </script>               
                    @endif   
                    <div id="comment_view" >
                       
                    </div>
                
                  
                </div>
                
            </div>

            <div class="col-4">
                <aside>
                    <!-- popular_posts -->
                    @include('popular_posts')
                    <!-- end popular_posts -->
                    <!-- category -->
                    @include('list_categories')
                    <!-- end category -->
                    <div class="popular-post col-padding">
                        <h2>LET'S HANG OUT ON SOCIAL</h2>
                        <div class="row">
                            <div class="col-6">
                                <a href="#"><button class="btn col-margin--bottom background-dark-blue"><i class="fab fa-facebook-f"></i> FACEBOOK</button></a>
                                <a href="#"><button class="btn col-margin--bottom background-blue"><i class="fab fa-twitter"></i> TWITTER</button></a>
                                <a href="#"><button class="btn background-red"><i class="fab fa-youtube"></i> YOUTUBE</button></a>
                            </div>
                            <div class="col-6">
                                <a href="#"><button class="btn col-margin--bottom background-orangered"><i class="fab fa-google-plus-g"></i> GOOGLE</button></a>
                                <a href="#"><button class="btn col-margin--bottom background-orchid"><i class="fab fa-instagram"></i> INSTAGRAM</button></a>
                                <a href="#"><button class="btn background-oranger"><i class="fas fa-rss"></i>RSS</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- recommended -->
                    @include('recommended')
                    <!-- end recommended -->

                </aside>
            </div>
        </div>
    </section>
</main>
@endsection