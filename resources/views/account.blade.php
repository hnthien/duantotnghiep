<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
</head>

<body>
<header class="header">
        @include('header');
    </header>
    <main class="content">
        <div class=" col-margin--bottom">
            <ul class="list-horizontal">
                <li><a href="index.html"><b><i  class="fas fa-home text-color--gray"></i> Home <i class="fas fa-angle-right"></i></b></a></li>
                <li><a href="#">Account <i class="fas fa-angle-right"></i></a></li>

            </ul>
        </div>


        <section class="section reponsive_8_4">
            <div class="row">
                <div class="col-8 ">
                    <div class="row popular-post ">
                        <h1 class="col-12 col-margin-left" style="font-size: 30px;">User Profile</h1>
                    </div>
                    <form class="popular-post col-padding">
                        <div class="row">
                            <div class="col-4 col-position">
                                <img src="{{ URL::asset('images') }}/photo-5-1584724728351316096626.jpg" class="img " />

                                <button type="submit" style="position: absolute;left:0px;bottom: 0px;" class="btn background-gray col-border--none">Lưu</button>

                            </div>
                            <div class="col-8 col-margin-left">
                                <h3>Name:</h3>
                                <h3>Email:</h3>
                                <h3>Phone:</h3>
                                <h3>Vai Trò:</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3>Giới Thiệu :</h3>
                            </div>
                        </div>
                    </form>


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
                                    <a href="news.html">
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
                                    <a href="news.html">
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
                                    <a href="news.html">
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
                                    <a href="news.html">
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
                        <!-- <div class="popular-post col-padding background-white">
                            <h2>NEWSLETTER</h2>
                            <p><i class="far fa-envelope"></i> Subscribe for our daily news</p>
                            <form class="row" method="GET">
                                <div class="col-9"><input class="input col-border" type="email" placeholder="Email..." /></div>
                                <div class="col-3"> <button class="btn background-gray col-border"> <i class="fas fa-paper-plane"></i></button> </div>
                            </form>
                        </div> -->
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