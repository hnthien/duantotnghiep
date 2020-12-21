@extends('layouts.client')
@section('client','Tác giả '.$user_author->name)
@section('content')

<main class="content col-margin--top ">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="{{url('/')}}"><b><i class="fas fa-home text-color--gray"></i> Trang chủ <i class="fas fa-angle-right"></i></b></a></li>
            <li><a href="#">Tác giả <i class="fas fa-angle-right"></i></a></li>
            <li><a href="#">{{$user_author->name}}</a></li>
        </ul>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-8 ">
                <article>
                    <div class="popular-post col-padding ">
                        <h1 class="col-margin-left" style="font-size: 30px; margin:0px;">Tác Giả {{$user_author->name}}</h1>
                       <br>
                        <p class="color-light-gray" style="font-size:12px;">Tổng số bài viết là {{$post_count}}.</p>
                        <br>
                        <div class="color-light-gray" style="font-size:12px;"> 
                         @php echo $user_author->intro_user @endphp
                        </div>
                    </div>
                    @foreach($post_author as $row_post)
                    @php
                    $slug = Str::slug($user_author->name, '-');
                    @endphp
                    <div style="padding: 5px;" class="row popular-post ">
                        <div class="col-4 col-position ">
                            <img class="img" src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" alt="image post" />

                        </div>
                        <div class="col-8 col-margin-left">
                            <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                                <h3>{{$row_post->post_title}}</h3>
                            </a>
                            <ul class="list-horizontal font-size-13">
                                <li>
                                    <span>by</span>
                                    <a style="text-transform: capitalize" href="{{url('/user/author')}}/{{$slug}}/{{$user_author->id}}">{{$user_author->name}}</a>
                                </li>
                                <li>
                                    @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at,5,2).'/'.substr($row_post->created_at ,8,2).'/'.substr($row_post->created_at,0,4) ; @endphp
                                </li>
                            </ul>
                            <p class="color-light-gray font-size-13">{{$row_post->post_intro}}</p>

                        </div>
                    </div>
                    @endforeach
                    <div style="text-align: center;float: right;">{!!$post_author->links()!!}</div>
                </article>
            </div>
            <div class="col-4">
                <aside>
                    <!-- popular_posts -->
                    @include('popular_posts')
                    <!-- end popular_posts -->

                    <div class="popular-post col-padding background-white">
                        <h2>FAN PAGE</h2>

                    </div>
                    <div class="popular-post col-padding background-white">
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
                    <!-- category -->
                    @include('list_categories')
                    <!-- end category -->

                </aside>
            </div>
        </div>
    </section>
</main>
@endsection