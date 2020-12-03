@extends('layouts.client')
@section('client','Đóng góp ý kiến')
@section('content')
<main class="content col-margin--top ">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="index.html"><b><i class="fas fa-home text-color--gray"></i> Home <i
                            class="fas fa-angle-right"></i></b></a></li>
            <li><a href="#">Góp ý</a></li>
        </ul>
    </div>
    <section class="section ">
        <div class="row">
            <div class="col-8 ">
                <div class="row">



                </div>
                <div>

                    <?php

                    use Illuminate\Support\Facades\Auth;

                    $feedback = new App\Models\Feedback();
                    $data = $feedback->where('user_id', Auth::user()->id)->orderBy('feedback_id', 'DESC')->get();
                    ?>
                    <h1>Ý kiến Đã đóng góp</h1>
                    <hr>
                    @foreach($data as $row)
                    <div class="popular-post col-padding">
                        <div style="text-align: right;">@if($row->feedback_status == 0)<i style="color:red;"
                                title="chưa xem" class="fas fa-eye"></i>@else<i style="color:green;"
                                title="góp ý của bạn đã được xem" class="fas fa-eye"></i>@endif</div>
                        <p>Lúc @php echo substr($row->created_at ,10,3).' giờ '.substr($row->created_at ,14,2).' phút'
                            @endphp ngày @php echo substr($row->created_at ,0,10) @endphp</p>
                        <span><b>Tiêu đề: {{$row->feedback_title}}</b></span>
                        <p>Nội dung: {{$row->feedback_content}}</p>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-4">
                <aside>
                    <div class="popular-post col-padding">
                        <h2>POPULAR POSTS</h2>
                        <div class="row col-padding">
                            <div class="col-2">
                                <img class="img img-border-radius"
                                    src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_1.jpg"
                                    alt="post small" />
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
                                <img class="img img-border-radius"
                                    src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_2.jpg"
                                    alt="post small" />
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
                                <img class="img img-border-radius"
                                    src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_3.jpg"
                                    alt="post small" />
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
                                <img class="img img-border-radius"
                                    src="https://deothemes.com/envato/deus/html/img/content/post_small/post_small_4.jpg"
                                    alt="post small" />
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
                                        <a href="{{url('/catergories')}}"><i
                                                class="fas fa-angle-right"></i>Lifestyle</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Business</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Fashion</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i
                                                class="fas fa-angle-right"></i>Investment</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catergories')}}"><i
                                                class="fas fa-angle-right"></i>Technology</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="popular-post col-padding">
                        <h2>LET'S HANG OUT ON SOCIAL</h2>
                        <div class="row">
                            <div class="col-6">
                                <a href="#"><button class="btn col-margin--bottom background-dark-blue"><i
                                            class="fab fa-facebook-f"></i> FACEBOOK</button></a>
                                <a href="#"><button class="btn col-margin--bottom background-blue"><i
                                            class="fab fa-twitter"></i> TWITTER</button></a>
                                <a href="#"><button class="btn background-red"><i class="fab fa-youtube"></i>
                                        YOUTUBE</button></a>
                            </div>
                            <div class="col-6">
                                <a href="#"><button class="btn col-margin--bottom background-orangered"><i
                                            class="fab fa-google-plus-g"></i> GOOGLE</button></a>
                                <a href="#"><button class="btn col-margin--bottom background-orchid"><i
                                            class="fab fa-instagram"></i> INSTAGRAM</button></a>
                                <a href="#"><button class="btn background-oranger"><i
                                            class="fas fa-rss"></i>RSS</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="popular-post col-padding">
                        <h2> RELATED ARTICLES</h2>
                        <div class="post-contect">
                            <img class="img"
                                src="https://deothemes.com/envato/deus/html/img/content/review/review_post_1.jpg"
                                alt="review post" />
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
                            <img class="img"
                                src="https://deothemes.com/envato/deus/html/img/content/review/review_post_2.jpg"
                                alt="review post" />
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