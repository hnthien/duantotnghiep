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
            @php
            $slug = Str::slug($row_category->category_title,'-');
            @endphp
            @if($category->category_branch == $row_category->category_id )
            <li class="color-red text-bold"> <a href="{{url('/category/')}}/{{$slug}}/{{$row_category->category_id}}">{{$row_category->category_title}}</a> <i class="fas fa-angle-right"></i> </li>
            @endif
            @endforeach
            @endif
            @endforeach
            <li class="color-red text-bold">
                @foreach($categorys_branch as $category)
                @php
                $slug = Str::slug($category->category_title,'-');
                @endphp
                @if($post->category_id == $category->category_id)
                <a href="{{url('/category/')}}/{{$slug}}/{{$category->category_id}}">{{$category->category_title}}</a>
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
                            @php
                            $slug = Str::slug($row_category->category_title,'-');
                            @endphp
                            @if($category->category_branch == $row_category->category_id )
                            <a href="{{url('/category')}}/{{$slug}}/{{$row_category->category_id}}"><button class="col-border-categorys_title">{{$row_category->category_title}}</button></a>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            <!--  -->
                            @foreach($categorys_branch as $category)
                            @php
                            $slug = Str::slug($category->category_title,'-');
                            @endphp
                            @if($post->category_id == $category->category_id)
                            <a href="{{url('/category')}}/{{$slug}}/{{$category->category_id}}"><button class="col-border-categorys">{{$category->category_title}}</button></a>
                            @endif
                            @endforeach

                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="row ">
                            <div class="col-12">
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>

                                        @foreach($user as $row_user)
                                        @if($row_user->id == $post->user_id)
                                        <a href="{{url('/user/author')}}/{{$row_user->name}}/{{$row_user->id}}">{{$row_user->name}}</a>
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
                                <span>{{$post->post_view}} view</span>&ensp;
                                <span> <i class="fas fa-comments"></i>98K</span>
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

                <div class="popular-post post-contect">
                    <h2>Bình Luận</h2>
                    <!-- write comment zone -->
                    <form action="{{url('admin/comment/create_comment')}}" method="post">
                        @csrf
                        <div class="form-comment">
                            <div class="make-comment">
                                <textarea name="comment_content" class="form-textarea" maxlength="4999" placeholder="Leave your comment..."></textarea>
                                <input type=hidden name="post_id" value="{{$post->post_id}}" />
                            </div>
                            <button type="submit" class="btn-submit btn-style">Post Comment</button>
                        </div>
                    </form>
                    <!-- views comment zone -->
                    <div class="comment">
                    <div class="comments-container">
		<ul id="comments-list" class="comments-list">
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<hp class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></hp>
							<span>20 minutes ago</span>
							
                                        <i class="fa fa-reply"></i>
                            <i class="fas fa-thumbs-down"> 1</i>
                            <i class="fas fa-thumbs-up"> 3</i>
						</div>
						<div class="comment-content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
						</div>
					</div>
				</div>
				<!-- Respuestas de los comentarios -->
				<ul class="comments-list reply-list">
					<li>
						<!-- Avatar -->
						<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
						<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head">
								<hp class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></hp>
								<span>10 minutes ago</span>
								<i class="fa fa-reply"></i>
								<i class="far fa-thumbs-down"></i>
							    <i class="far fa-thumbs-up"></i>
							</div>
							<div class="comment-content">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
							</div>
						</div>
					</li>

					<li>
						<!-- Avatar -->
						<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
						<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head">
								<hp class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></hp>
								<span>10 minutes ago</span>
								<i class="fa fa-reply"></i>
								<i class="far fa-thumbs-down"></i>
							    <i class="far fa-thumbs-up"></i>
							</div>
							<div class="comment-content">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li>
                @foreach($comments as $cmt)
				<div class="comment-main-level">
                    <!-- Avatar -->
                    @foreach($user as $av)
                    @if($cmt->user_id == $av->id)
                    <div class="comment-avatar"><img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt=""></div>
                   @endif
                    @endforeach
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
                            <hp class="comment-name">
                            @foreach($user as $av)
                            @if($cmt->user_id == $av->id)
                            {{$av->name}}
                            @endif
                            @endforeach
                            </hp>
							<span>10 minutes ago</span>
                            <i class="fa fa-reply"></i>
                            <i class="far fa-thumbs-down"></i>
							<i class="far fa-thumbs-up"></i>
                        </div>
						<div class="comment-content">
                            {{$cmt->comment_content}}
                        </div>
					</div>
                </div>
                @endforeach
            </li>
		</ul>
	</div>
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