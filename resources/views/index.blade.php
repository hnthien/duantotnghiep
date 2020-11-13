@extends('layouts.client')
@section('client', 'Trang Chủ')
@section('content')

<main class="content">
    <section class="section">
        <div class="row">
            <div class="col-6 ">
                <div class="row popular-post col-padding ">
                    <div class="col-6 ">
                        <a href="{{url('/news')}}">
                            <h3>3 Founders With Booming Businesses Share Stories About Their Difficult Early</h3>
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
                    <div class="col-6 col-position ">
                        <img class="col-border-radius img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_1.jpg" alt="image post" />
                        <a class="list-theme background-blue" href="{{url('/catergories')}}">World</a>
                    </div>
                </div>
                <div class="row popular-post col-padding">
                    <div class="col-6 col-position">
                        <img class="col-border-radius img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_2.jpg" alt="image post" />
                        <a class="list-theme background-orchid" href="{{url('/catergories')}}">Fashion</a>
                    </div>
                    <div class="col-6">
                        <a href="{{url('/news')}}">
                            <h3>3 Things You Can Do to Get Your Customers Talking About Your Business</h3>
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
                <div class="row popular-post col-padding">
                    <div class="col-6 ">
                        <a href="{{url('/news')}}">
                            <h3>These Are the 20 Best Places to Work in 2018</h3>
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
                    <div class="col-6 col-position">
                        <img class="col-border-radius img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_3.jpg" alt="image post" />
                        <a class="list-theme background-dark-blue" href="{{url('/catergories')}}">Business</a>
                    </div>
                </div>
            </div>
            <div class="col-6 popular-post">
                <div class="col-position">
                    <a class="list-theme background-orangered" href="{{url('/catergories')}}">Lifestyle</a>
                    <img class="img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_4.jpg" alt="image post" />
                </div>
                <div class="col-padding">
                    <a href="{{url('/news')}}">
                        <h2>What Days and Hours are PH Online Shoppers Most Likely to Buy?</h2>
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
    </section>

    <section class="section reponsive_8_4">
        <div class="row">
            <div class="col-8 ">
                <hr>
                <article>
                    <h2>LATEST NEWS</h2>
                    <div class="row">
                        <div class="col-6">
                            <div class=" popular-post post-news-height">
                                <div class="col-position">
                                    <a class="list-theme background-blue" href="{{url('/catergories')}}">World</a>
                                    <img class="img" src="https://deothemes.com/envato/deus/html/img/content/grid/grid_post_1.jpg" alt="girt post" />
                                </div>
                                <div class="col-padding">
                                    <a href="{{url('/news')}}">
                                        <h2>Follow These Smartphone Habits of Successful Entrepreneurs</h2>
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
                                    <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class=" popular-post post-news-height">
                                <div class="col-position">
                                    <a class="list-theme background-orchid" href="{{url('/catergories')}}">Fashion</a>
                                    <img class="img" src="https://deothemes.com/envato/deus/html/img/content/grid/grid_post_2.jpg" alt="girt post" />
                                </div>
                                <div class="col-padding">
                                    <a href="{{url('/news')}}">
                                        <h2>3 Things You Can Do to Get Your Customers Talking About Your Business</h2>
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
                                    <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class=" popular-post post-news-height">
                                <div class="col-position">
                                    <a class="list-theme background-orangered" href="{{url('/catergories')}}">Lifestyle</a>
                                    <img class="img" src="https://deothemes.com/envato/deus/html/img/content/grid/grid_post_3.jpg" alt="girt post" />
                                </div>
                                <div class="col-padding">
                                    <a href="{{url('/news')}}">
                                        <h2>Lose These 12 Bad Habits If You're Serious About Becoming a Millionaire</h2>
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
                                    <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class=" popular-post post-news-height">
                                <div class="col-position">
                                    <a class="list-theme background-orangered" href="{{url('/catergories')}}">Lifestyle</a>
                                    <img class="img" src="https://deothemes.com/envato/deus/html/img/content/grid/grid_post_4.jpg" alt="girt post" />
                                </div>
                                <div class="col-padding">
                                    <a href="{{url('/news')}}">
                                        <h2>10 Horrible Habits You're Doing Right Now That Are Draining Your Energy</h2>
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
                                    <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-4 ">
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
        <div class="row">
            <div class="col-6">
                <hr>
                <h2>TECHNOLOGY</h2>
                <div class="row">
                    <div class="col-6 col-position ">
                        <img class="img" src="https://deothemes.com/envato/deus/html/img/content/thumb/thumb_post_1.jpg" alt="thumb post" />
                        <div class="text-title">
                            <a class="color-white" href="#">
                                <h3>Gov’t Toughens Rules to Ensure 3rd Telco Player Doesn’t Slack Off</h3>
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
                    <div class="col-6">
                        <ul class="list-vertical list-category">
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">Need a Website for Your Business? Google Can Help</a>
                            </li>
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">Here Are Ways You Can Earn From the Sharing Economy</a>
                            </li>
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">19 Crazy Facts You Probably Didn't Know About Google</a>
                            </li>
                            <li>
                                <i class="fas fa-angle-right"></i><a href="#">What Household Chores Would Filipinos Love to Assign to Robots?</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <h2>TRAVEL</h2>
                <div class="row">
                    <div class="col-6 col-position">
                        <img class="img" src="https://deothemes.com/envato/deus/html/img/content/thumb/thumb_post_2.jpg" alt="thumb post" />
                        <div class="text-title">
                            <a class="color-white" href="#">
                                <h3>4 credit card tips to make business travel easier</h3>
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
                    <div class="col-6">

                        <ul class="list-vertical list-category">
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">5 deadliest luxury vacation spots on Earth</a>
                            </li>
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">These 4 startups can send you to work and travel abroad</a>
                            </li>
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">9 mind-blowing travel destinations for adventure seekers</a>
                            </li>
                            <li>
                                <i class="fas fa-angle-right"></i><a href="#">These Small Business Ideas Are Great for Entrepreneurial Children</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <hr>
                <h2>CRYPTOCURRENCY</h2>
                <div class="row">
                    <div class="col-6 col-position">
                        <img class="img" src="https://deothemes.com/envato/deus/html/img/content/thumb/thumb_post_3.jpg" alt="thumb post" />
                        <div class="text-title">
                            <a class="color-white" href="#">
                                <h3>UN’s WFP Building Up Blockchain-Based Payments System</h3>
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
                    <div class="col-6">
                        <ul class="list-vertical list-category">
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">Need a Website for Your Business? Google Can Help</a>
                            </li>
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">Here Are Ways You Can Earn From the Sharing Economy</a>
                            </li>
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">19 Crazy Facts You Probably Didn't Know About Google</a>
                            </li>
                            <li>
                                <i class="fas fa-angle-right"></i><a href="#">What Household Chores Would Filipinos Love to Assign to Robots?</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <h2>INVESTMENT</h2>
                <div class="row">
                    <div class="col-6 col-position">
                        <img class="img" src="https://deothemes.com/envato/deus/html/img/content/thumb/thumb_post_4.jpg" alt="thumb post" />
                        <div class="text-title">
                            <a class="color-white" href="#">
                                <h3>14 easy, low-cost ways authors can promote their books</h3>
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
                    <div class="col-6">
                        <ul class="list-vertical list-category">
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">Need a Website for Your Business? Google Can Help</a>
                            </li>
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">Here Are Ways You Can Earn From the Sharing Economy</a>
                            </li>
                            <li class="col-border-bottom">
                                <i class="fas fa-angle-right"></i><a href="#">19 Crazy Facts You Probably Didn't Know About Google</a>
                            </li>
                            <li>
                                <i class="fas fa-angle-right"></i><a href="#">What Household Chores Would Filipinos Love to Assign to Robots?</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-8">
                <hr>
                <article>
                    <div class="row">
                        <div class="9">
                            <h2>WORLDWIDE</h2>
                        </div>
                        <div class="col-3 col-padding" style="line-height: 30px;">
                            <a href="#">VIEW ALL</a>
                        </div>
                    </div>
                    <div class="row popular-post col-padding">
                        <div class="col-6 col-position">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/list/list_post_1.jpg" alt="list post" />
                            <a class="list-theme background-dark-blue" href="{{url('/catergories')}}">Business</a>
                        </div>
                        <div class="col-6 col-padding">
                            <a href="{{url('/news')}}">
                                <h3>These Are the 20 Best Places to Work in 2018</h3>
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
                            <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                        </div>
                    </div>
                    <div class="row popular-post col-padding">
                        <div class="col-6 col-position">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/list/list_post_2.jpg" alt="list post" />
                            <a class="list-theme background-orchid" href="{{url('/catergories')}}">Fashion</a>
                        </div>
                        <div class="col-6 col-padding">
                            <a href="{{url('/news')}}">
                                <h3>These Are the 20 Best Places to Work in 2018</h3>
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
                            <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                        </div>
                    </div>
                    <div class="row popular-post col-padding">
                        <div class="col-6 col-position">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/list/list_post_3.jpg" alt="list post" />
                            <a class="list-theme background-orangered" href="{{url('/catergories')}}">Lifestyle</a>
                        </div>
                        <div class="col-6 col-padding">
                            <a href="{{url('/news')}}">
                                <h3>These Are the 20 Best Places to Work in 2018</h3>
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
                            <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                        </div>
                    </div>
                    <div class="row popular-post col-padding">
                        <div class="col-6 col-position">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/list/list_post_4.jpg" alt="list post" />
                            <a class="list-theme background-blue" href="{{url('/catergories')}}">World</a>
                        </div>
                        <div class="col-6 col-padding">
                            <a href="{{url('/news')}}">
                                <h3>These Are the 20 Best Places to Work in 2018</h3>
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
                            <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                        </div>
                    </div>
                    <div class="row popular-post col-padding">
                        <div class="col-6 col-position">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/list/list_post_5.jpg" alt="list post" />
                            <a class="list-theme background-red" href="{{url('/catergories')}}">Investment</a>
                        </div>
                        <div class="col-6 col-padding">
                            <a href="{{url('/news')}}">
                                <h3>These Are the 20 Best Places to Work in 2018</h3>
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
                            <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                        </div>
                    </div>
                    <div class="row popular-post col-padding">
                        <div class="col-6 col-position">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/list/list_post_6.jpg" alt="list post" />
                            <a class="list-theme background-oranger" href="{{url('/catergories')}}">Technology</a>
                        </div>
                        <div class="col-6 col-padding">
                            <a href="{{url('/news')}}">
                                <h3>These Are the 20 Best Places to Work in 2018</h3>
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
                            <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-4">
                <aside>
                    <div class="col-margin--bottom" style="  box-shadow: 0 19px 12px -7px rgba(0, 0, 0, 0.31)">
                        <a href="#">
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/placeholder_336.jpg" alt="placeholder" />

                        </a>
                    </div>
                    <div class="popular-post col-padding ">
                        <h2>CATEGORIES</h2>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-vertical list-category">
                                    @foreach($category as $row_category)
                                    @php
                                    $slug = Str::slug($row_category->category_title,'-');
                                    @endphp
                                    @if($row_category->category_branch == 0)
                                    <li>
                                        <a href="{{url('/category/')}}/{{$slug}}/{{$row_category->category_id}}"><i class="fas fa-angle-right"></i>{{$row_category->category_title}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                    </div>
                    <div class="popular-post col-padding">
                        <h2>RECOMMENDED</h2>
                        <div>
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/review/review_post_1.jpg" alt="review post" />
                            <h4>UN’s WFP Building Up Blockchain-Based Payments System</h4>
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
                        <div>
                            <img class="img" src="https://deothemes.com/envato/deus/html/img/content/review/review_post_2.jpg" alt="review post" />
                            <h4>4 credit card tips to make business travel easier</h4>
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