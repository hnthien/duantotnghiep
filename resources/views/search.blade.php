@extends('layouts.client')
@section('client','Tìm kiếm bài viết có từ khóa "'.$keyword.'".')
@section('content')
<main class="content">
    <section class="section">
        <h1>TÌM KIẾM BÀI VIẾT</h1>
        <div class="row">
            <div class="col-8">
                <article>
                    <form class="search col-margin--bottom" method="POST"  action="{{url('post/searchs')}}">
                    @csrf
                        <span class="item"><i class="fa fa-search"></i></span>
                        <input class="search__input" type="search" value="{{$keyword}}" name="keyword" placeholder="Tìm kiếm bài viết...." />
                    </form>
                    <h4 style="margin-left: 0px;" class="col-margin--bottom">Từ Khóa đã tìm kiếm " {{$keyword}} ".</h4>
                    @foreach($search_results as $row_post)
                    <div class="row popular-post col-padding ">
                        <div class="col-4 col-position ">
                            <img class="col-border-radius img" src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" alt="image post" />
                        </div>
                        <div class="col-8 col-margin-left ">
                            <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                                <h3>{{$row_post->post_title}}</h3>
                            </a>
                            <ul class="list-horizontal font-size-13">
                                <li class="text-color-white">
                                    <span>by</span>
                                    @foreach($user as $row_user)
                                    @if($row_user->id == $row_post->user_id)
                                    <a href="#">{{$row_user->name}}</a>
                                    @endif
                                    @endforeach
                                </li>
                                <li>
                                    @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at,5,2).'/'.substr($row_post->created_at ,8,2).'/'.substr($row_post->created_at,0,4) ; @endphp
                                </li>
                            </ul>
                            <p class="color-light-gray font-size-13">{{$row_post->post_intro}}</p>

                        </div>

                    </div>
                    
                   
                    @endforeach
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