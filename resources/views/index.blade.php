@extends('layouts.client')
@section('client', 'Trang Chủ')
@section('content')

<main class="content">
    <section class="section">
        <div class="row">
            <div class="col-4 ">
                @foreach($popular_post as $row_pp)
                <div  class="row col-border-bottom ">
                <div class="col-4 col-position ">
                        <img class="img" src="{{ URL::asset('images/post_image') }}/{{$row_pp->post_image}}" alt="image post" />

                    </div>
                    <div style="padding: 5px;" class="col-8 ">
                        <a href="{{url('/post')}}/{{$row_pp->post_slug}}/{{$row_pp->post_id}}">
                            <h4 style="margin: 0px;">{{$row_pp->post_title}}</h4>
                        </a>
                        <ul class="list-horizontal font-size-13">
                            <li >
                                <span>Từ</span>
                                @foreach($user as $row_user)
                                @php
                                        $slug = Str::slug($row_user->name, '-');
                                        @endphp
                                @if($row_user->id == $row_pp->user_id)
                                <a style="text-transform: capitalize" href="{{url('/user/author')}}/{{$slug}}/{{$row_user->id}}">{{$row_user->name}}</a>
                                @endif
                                @endforeach
                            </li>
                            <li>
                                @php echo substr($row_pp->created_at ,10,3).':'.substr($row_pp->created_at ,14,2)." "; echo substr($row_pp->created_at ,0,10) ; @endphp
                            </li>
                        </ul>
                    </div>
                    
                </div>
                @endforeach
            </div>
            <div class="col-5 ">
          
            @foreach($popular_post1 as $row_pp)
            <div  >
                <div class="col-position">
                    <img class="img" src="{{ URL::asset('images/post_image') }}/{{$row_pp->post_image}}" alt="image post" />
                </div>
                <div style="padding: 5px;">
                    <a href="{{url('/post')}}/{{$row_pp->post_slug}}/{{$row_pp->post_id}}">
                        <h2 style="margin: 0px;">{{$row_pp->post_title}}</h2>
                    </a>
                    <ul style="margin-top: 10px;" class="list-horizontal font-size-13">
                        <li>
                            <span>Từ</span>
                            @foreach($user as $row_user)
                            @php
                            $slug = Str::slug($row_user->name, '-');
                            @endphp
                            @if($row_user->id == $row_pp->user_id)
                            <a style="text-transform: capitalize" href="{{url('/user/author')}}/{{$slug}}/{{$row_user->id}}">{{$row_user->name}}</a>
                            @endif
                            @endforeach
                        </li>
                        <li>
                            @php echo substr($row_pp->created_at ,10,3).':'.substr($row_pp->created_at ,14,2)." "; echo substr($row_pp->created_at ,0,10) ; @endphp
                        </li>
                    </ul>
                    <p class="color-light-gray ">{{$row_pp->post_intro}}</p>
                </div>
                </div>
                @endforeach
              
               
              
            </div>
            <div class="col-3">
                @foreach($popular_post2 as $row_pp)
                <div  class="col-margin--bottom">
                    <img class="img" src="{{ URL::asset('images/post_image') }}/{{$row_pp->post_image}}" alt="image post" />
                    <a href="{{url('/post')}}/{{$row_pp->post_slug}}/{{$row_pp->post_id}}">
                        <h3 style="margin: 0px;">{{$row_pp->post_title}}</h3>
                    </a>
                    <ul style="margin-top: 10px;" class="list-horizontal font-size-13">
                        <li>
                            <span>Từ</span>
                            @foreach($user as $row_user)
                            @php
                            $slug = Str::slug($row_user->name, '-');
                            @endphp
                            @if($row_user->id == $row_pp->user_id)
                            <a style="text-transform: capitalize" href="{{url('/user/author')}}/{{$slug}}/{{$row_user->id}}">{{$row_user->name}}</a>
                            @endif
                            @endforeach
                        </li>
                        <li>
                            @php echo substr($row_pp->created_at ,10,3).':'.substr($row_pp->created_at ,14,2)." "; echo substr($row_pp->created_at ,0,10) ; @endphp
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section reponsive_8_4">
        <div class="row">
            <div class="col-8 ">
                <hr>
                <article>
                    <h2>TIN MỚI NHẤT</h2>
                    <p class="color-light-gray" style="font-size:12px;"><a href="{{ route('login') }}">Đăng nhập</a> để bình luận những bài viết mà bạn thích</p>
                   

                    @foreach($post as $row_post)

                    <div class="row">
                        <div style="padding: 5px 0px;" class="row popular-post  col-border-bottom ">
                            <div class="col-4 col-position ">
                                <img class="img" src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" alt="image post" />

                            </div>
                            <div class="col-8 col-margin-left">
                                <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                                    <h3>{{$row_post->post_title}}</h3>
                                </a>
                                @php
                                $carbon = new Illuminate\Support\Carbon;
                                $carbon::setLocale('vi');
                                $dt = $carbon::create(substr($row_post->created_at, 0, 4), substr($row_post->created_at, 5, 2), substr($row_post->created_at, 8, 2), substr($row_post->created_at, 11, 2), substr($row_post->created_at, 14, 2), substr($row_post->created_at, 17, 2));
                                $now = $carbon::now();
                                $date = $dt->diffForHumans($now);
                                @endphp

                                <ul class="list-horizontal font-size-13">
                                    <li>
                                        <p class="color-light-gray font-size-13">{{$date}}</p>
                                    </li>
                                    <li>
                                        <span>Từ</span>
                                        @foreach($user as $row_user)
                                        @php
                                        $slug = Str::slug($row_user->name, '-');
                                        @endphp
                                        @if($row_user->id == $row_post->user_id)
                                        <a href="{{url('/user/author')}}/{{$slug}}/{{$row_user->id}}">{{$row_user->name}}</a>
                                        @endif
                                        @endforeach
                                    </li>
                                    <li>
                                        @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at,5,2).'/'.substr($row_post->created_at ,8,2).'/'.substr($row_post->created_at,0,4) ; @endphp
                                    </li>
                                    @foreach($category as $row_category)
                                    @if($row_post->category_id == $row_category->category_id)
                                    <li> <a class="font-size-13" href="{{url('/category/')}}/{{$row_category->category_slug}}/{{$row_category->category_id}}">{{$row_category->category_title}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>

                                <p class="color-light-gray font-size-13">{{$row_post->post_intro}}</p>

                            </div>

                        </div>
                    </div>
                    @endforeach


                </article>
            </div>
            <div class="col-4 ">
                <aside>

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
                   
                    <div class="col-margin--bottom" style="  box-shadow: 0 19px 12px -7px rgba(0, 0, 0, 0.31)">
                        <a href="#">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/placeholder_336.jpg" alt="placeholder" />

                        </a>
                    </div>
                    <!-- category -->
                    @include('list_categories')
                    <!-- end category -->
                    <!-- recommended -->
                    @include('recommended')
                    <!-- end recommended -->
               
                </aside>
            </div>
        </div>
    </section>
    <hr>
    <section class="section">
        <div class="row">
            <div class="9">
                <h2>EDITORS PICKS</h2>
            </div>
            <div class="3"></div>
        </div>
        <div class="row">
            <div class="col-3 col-position">
                <img class="img" src="https://deothemes.com/envato/deus/html/img/content/carousel/carousel_post_1.jpg" alt="carousel post" />
                <a class="text-title text-align--center" href="#">
                    <h3>Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</h3>
                </a>
            </div>
            <div class="col-3 col-position">
                <img class="img" src="https://deothemes.com/envato/deus/html/img/content/carousel/carousel_post_2.jpg" alt="carousel post" />
                <a class="text-title text-align--center" href="#">
                    <h3>Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</h3>
                </a>
            </div>
            <div class="col-3 col-position">
                <img class="img" src="https://deothemes.com/envato/deus/html/img/content/carousel/carousel_post_3.jpg" alt="carousel post" />
                <a class="text-title text-align--center" href="#">
                    <h3>Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</h3>
                </a>
            </div>
            <div class="col-3 col-position">
                <img class="img" src="https://deothemes.com/envato/deus/html/img/content/carousel/carousel_post_4.jpg" alt="carousel post" />
                <a class="text-title text-align--center" href="#">
                    <h3>Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</h3>
                </a>
            </div>
        </div>
    </section>

    <section class="section">
        @foreach($category_p as $row_categorys)
        <div style=" padding: 0px 5px;" class="col-3 col-float ">
            <h2>
                <div class="vertical_tiles"></div> {{$row_categorys->category_title}}
            </h2>
            @php
            $data = new App\Models\Post();
            $post_all = $data::where('post_status',2)->get();
            $post_category = $data::where('post_status',2)->where('category_id',$row_categorys->category_id)->orderBy('post_id', 'DESC')->take(1)->get();
            $data_ct = new App\Models\Category();
            $category_ct = $data_ct::where('category_branch',$row_categorys->category_id)->take(2)->get();
            @endphp
            @foreach($post_category as $row_post_category)
            <img class="img height_img" src="{{ URL::asset('images/post_image') }}/{{$row_post_category->post_image}}" alt="image post" />
            <a href="{{url('/post')}}/{{$row_post_category->post_slug}}/{{$row_post_category->post_id}}">
                <h3>{{$row_post_category->post_title}}</h3>
            </a>
            @endforeach
            @foreach($category_ct as $row_category_ct)
            @foreach($post_all as $row_post_all)
            @if($row_post_all->category_id == $row_category_ct->category_id )
            <div class="row col-border-top">
                <div class="col-4">
                    <img class="img" src="{{ URL::asset('images/post_image') }}/{{$row_post_all->post_image}}" alt="image post" />
                </div>
                <div class="col-8">
                    <a href="{{url('/post')}}/{{$row_post_all->post_slug}}/{{$row_post_all->post_id}}">

                        <h4 class="font-size-13 " style="margin: 0px;padding-left:3px">
                            {{$row_post_all->post_title}}
                        </h4>
                    </a>
                </div>

            </div>

            @endif
            @endforeach
            @endforeach
            
        </div>
        @endforeach
    </section>
    <div class="clearfix col-margin--bottom"></div>
    
</main>

@endsection