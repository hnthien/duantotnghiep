@extends('layouts.client')
@section('client',$category_branch->category_title)
@section('content')
@php
$slug = Str::slug($category_branch->category_title,'-');
@endphp
<main class="content col-margin--top ">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="index.html"><b><i class="fas fa-home text-color--gray"></i> Home <i class="fas fa-angle-right"></i></b></a></li>
            @foreach($categorys as $row_category)
            @php
            $slug = Str::slug($row_category->category_title,'-');
            @endphp
            @if($row_category->category_id == $category_branch->category_branch)
            <li><a href="{{url('/category/')}}/{{$slug}}/{{$row_category->category_id}}">{{$row_category->category_title}} <i class="fas fa-angle-right"></i></a></li>
            @endif
            @endforeach
            <li><a href="{{url('/category/')}}/{{$slug}}/{{$category_branch->category_id}}">{{$category_branch->category_title}}</a></li>
        </ul>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-8">
                <article>
                    <div>
                        <h1 class="col-12 col-margin-left" style="font-size: 30px;text-transform: uppercase;margin-left: 0px;">{{$category_branch->category_title}}</h1>
                    </div>

                    @foreach($post as $row_post)
                    @foreach($row_post->category_id as $category_id)
                    @if($category_id == $category_branch->category_id )
                    @php
                    $slug = Str::slug($category_branch->category_title,'-');
                    @endphp
                    <div class="row popular-post col-padding ">
                        <div class="col-4 col-position ">
                            <img class="col-border-radius img" src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" alt="image post" />
                            <a class="list-theme background-blue" href="{{url('/category/')}}/{{$slug}}/{{$category_branch->category_id}}">{{$category_branch->category_title}}</a>
                        </div>
                        <div class="col-8 col-margin-left">
                            <a href="news.html">
                                <h3>{{$row_post->post_title}}</h3>
                            </a>
                            <ul class="list-horizontal">
                                <li>
                                    <span>by</span>
                                    @foreach($user as $row_user)
                                    @if($row_user->id == $row_post->user_id)
                                    <a style="text-transform: capitalize" href="#">{{$row_user->name}}</a>
                                    @endif
                                    @endforeach
                                </li>
                                <li>
                                    @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at,5,2).'/'.substr($row_post->created_at ,8,2).'/'.substr($row_post->created_at,0,4) ; @endphp
                                </li>
                            </ul>
                            <p>{{$row_post->post_intro}}</p>

                        </div>

                    </div>
                    @endif
                    @endforeach
                    @endforeach
                </article>
                <div style="text-align: center">{!!$post->links()!!}</div>
            </div>
            <div class="col-4">
                <aside>
                    <div class="popular-post col-padding">
                        <h2>POPULAR POSTS</h2>
                        <div class="row ">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_1.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="{{url('/news')}}">
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
                        <div class="row ">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_2.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="{{url('/news')}}">
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
                        <div class="row ">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_3.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="{{url('/news')}}">
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
                        <div class="row ">
                            <div class="col-2">
                                <img class="img img-border-radius" src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_4.jpg" alt="post small" />
                            </div>
                            <div class="col-10 col-margin-left">
                                <a href="{{url('/news')}}">
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

                </aside>
            </div>
        </div>
    </section>
</main>
@endsection