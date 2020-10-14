<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for articles </title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
</head>

<body>
<header class="header">
        @include('header');
    </header>
    <main class="content">
        <section class="section">
            <h1>SEARCH FOR ARTICLES</h1>
            <div class="row">
                <div class="col-8">
                    <article>
                        <form class="search col-margin--bottom" action="" method="POST">
                            <span class="item"><i class="fa fa-search"></i></span>
                            <input class="search__input" type="search" placeholder="Search for articles" />
                        </form>
                        <div class="row popular-post col-padding ">
                            <div class="col-4 col-position ">
                                <img class="col-border-radius img" src="https://deothemes.com/envato/deus/html/img/content/hero/hero_post_4.jpg" alt="image post" />
                                <a class="list-theme background-blue" href="{{url('/catergories')}}">World</a>
                            </div>
                            <div class="col-8 col-margin-left ">
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
                                <p>iPrice Group report offers insights on daily e-commerce activity in the ...</p>

                            </div>

                        </div>
                    </article>

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
                            <div class="row col-padding">
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
                            <div class="row col-padding">
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
                            <div class="row col-padding">
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

                    </aside>
                </div>
            </div>

        </section>
    </main>
    <footer>
       @include('footer');
    </footer>
</body>

</html>