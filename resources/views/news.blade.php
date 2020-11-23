@extends('layouts.client')
@section('client',$post->post_title)
@section('content')
<main class="content col-margin--top ">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="{{url('/')}}"><b><i class="fas fa-home text-color--gray"></i> Home <i class="fas fa-angle-right"></i></b></a></li>
            <li class="color-red text-bold">Tin Tức <i class="fas fa-angle-right"></i></li>
            <li class="color-red text-bold">{{$post->post_title}}</li>
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
                            @if($loop->first)
                            @foreach($categorys as $row_category)
                            @php
                            $slug = Str::slug($row_category->category_title,'-');
                            @endphp
                            @if($category->category_branch == $row_category->category_id )                            
                            <a href="{{url('/category/')}}/{{$slug}}/{{$row_category->category_id}}"><button class="col-border-categorys">{{$row_category->category_title}}</button></a>
                            @endif                          
                            @endforeach
                            @endif
                            @endif
                            @endforeach
                            @endforeach
                            <!--  -->
                            @foreach($categorys_branch as $category)
                            @foreach($post->category_id as $category_id)
                            @php
                            $slug = Str::slug($category->category_title,'-');
                            @endphp
                            @if($category_id == $category->category_id)                         
                            <a href="{{url('/category/')}}/{{$slug}}/{{$category->category_id}}"><button class="col-border-categorys">{{$category->category_title}}</button></a>
                            @endif
                           
                            @endforeach
                            @endforeach

                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="row ">
                            <div class="col-6">
                                <ul class="list-horizontal">
                                    <li>
                                        <span>by</span>

                                        @foreach($user as $row_user)
                                        @if($row_user->id == $post->user_id)
                                        <a href="#">{{$row_user->name}}</a>
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
                            <div style="padding-top: 10px;box-sizing: border-box;" class="col-8 col-right">
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
                            <a href="#">
                                <button class="col-border-categorys ">{{$tag}}</button>
                            </a>
                            @endforeach
                        </div>

                    </div>



                </div>

                <div class="popular-post post-contect">
                    <h2>Bình Luận</h2>
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