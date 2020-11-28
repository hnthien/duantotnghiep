@extends('layouts.client')
@section('client',$post->post_title,$post->post_id)
@section('content')
<main class="content col-margin--top ">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="index.html"><b><i class="fas fa-home text-color--gray"></i> Home <i class="fas fa-angle-right"></i></b></a></li>
            <li><a href="#">News <i class="fas fa-angle-right"></i></a></li>
            <li><a href="#">Lifestyle</a></li>
        </ul>
    </div>
    <section class="section ">
        <div class="row">
            <div class="col-8 ">
                <div class="row">
                    <div class=" popular-post post-contect">
                        <h1 class="text-title-post">{{$post->post_title}}</h1>
                        <div class="col-position ">
                            @foreach($categorys_branch as $category)
                            @foreach($post->category_id as $category_id)
                            @if($category_id == $category->category_id)
                            <a href="#"><button class="col-border-categorys">{{$category->category_title}}</button></a>
                            @endif
                            @endforeach
                            @endforeach

                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="row col-margin--bottom">
                            <div class="col-8">
                                <ul class="list-horizontal">
                                    <li>
                                        <span>By</span>

                                        @foreach($user as $row_user)
                                        @if($row_user->id == $post->user_id)
                                        <a style="text-transform: capitalize" href="#">{{$row_user->name}}</a>
                                        @endif
                                        @endforeach

                                    </li>
                                    <li>{{$date}}
                                        @php echo substr($post->created_at ,10,3).':'.substr($post->created_at ,14,2)." "; echo substr($post->created_at,5,2).'/'.substr($post->created_at ,8,2).'/'.substr($post->created_at,0,4) ; @endphp
                                    </li>
                                </ul>
                            </div>
                            <div class="col-4 col-right">
                                <span><i class="fas fa-eye"></i>{{$post->post_view}}</span>&ensp;
                                <span> <i class="fas fa-comments"></i>98K</span>
                            </div>
                        </div>
                        <div class="text-contect-post">
                            @php echo $post->post_content @endphp
                        </div>
                        <br>
                        <div>
                            <i class="fas fa-tags"></i>
                            @foreach($post->post_tag as $tag)
                            <a href="#">
                            <span class="col-border-categorys">{{$tag}}</span>
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
                    <div class="popular-post col-padding">
                        <h2>POPULAR POSTS</h2>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_1.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="#">
                                    <h4>Follow These Smartphone Habits of Successful Entrepreneurs</h4>
                                </a>
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>
                                        <a href="#">DeoThemes</a>
                                    </li>
                                    <li>
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_2.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="#">
                                    <h4>Follow These Smartphone Habits of Successful Entrepreneurs</h4>
                                </a>
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>
                                        <a href="#">DeoThemes</a>
                                    </li>
                                    <li>
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_3.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="#">
                                    <h4>Follow These Smartphone Habits of Successful Entrepreneurs</h4>
                                </a>
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>
                                        <a href="#">DeoThemes</a>
                                    </li>
                                    <li>
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_4.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="#">
                                    <h4>Follow These Smartphone Habits of Successful Entrepreneurs</h4>
                                </a>
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>
                                        <a href="#">DeoThemes</a>
                                    </li>
                                    <li>
                                        Jan 21, 2018
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="popular-post col-padding ">
                        <h2>CATEGORIES</h2>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-vertical list-category">
                                    <li>
                                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>World</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Lifestyle</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Business</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Fashion</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Investment</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Technology</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>

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
                    <div class="popular-post col-padding">
                        <h2> RELATED ARTICLES</h2>
                        <div class="post-contect">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/review/review_post_1.jpg" alt="review post" />
                            <a href="{{url('/news')}}">
                                <h4>UN’s WFP Building Up Blockchain-Based Payments System</h4>
                            </a>
                            <ul class="list-horizontal">
                                <li>
                                    <span>by</span>
                                    <a href="#">DeoThemes</a>
                                </li>
                                <li>
                                    Jan 21, 2018
                                </li>
                            </ul>
                        </div>
                        <div class="post-contect">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/review/review_post_2.jpg" alt="review post" />
                            <a href="{{url('/news')}}">
                                <h4>4 credit card tips to make business travel easier</h4>
                            </a>
                            <ul class="list-horizontal">
                                <li>
                                    <span>by</span>
                                    <a href="#">DeoThemes</a>
                                </li>
                                <li>
                                    Jan 21, 2018
                                </li>
                            </ul>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>
</main>
@endsection