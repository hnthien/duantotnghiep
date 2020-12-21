@extends('layouts.client')
@section('client',$categorys->category_title)
@section('content')

<main class="content col-margin--top col-padding ">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="{{url('/')}}"><b><i class="fas fa-home text-color--gray"></i> Trang chủ <i class="fas fa-angle-right"></i></b></a></li>
            <li><a href="{{url('/category/')}}/{{$categorys->category_slug}}/{{$categorys->category_id}}">{{$categorys->category_title}}</a></li>
        </ul>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-8">
                <article>
                    <div>
                        <h1 class="col-12 col-margin-left" style="font-size: 30px;text-transform: uppercase;margin-left: 0px;">{{$categorys->category_title}}</h1>
                        @foreach($category_branch as $row_category_branch)
                      
                        @if($row_category_branch->category_branch == $categorys->category_id)
                        <a href="{{url('/category/')}}/{{$row_category_branch->category_slug}}/{{$row_category_branch->category_id}}"><button class="col-border-categorys">{{$row_category_branch->category_title}}</button></a>
                        @endif
                        @endforeach
                    </div>





                    @foreach($category_branch as $row_category_branch)
                    @if($row_category_branch->category_branch == $categorys->category_id)
                    <h2>
                        <div class="vertical_tiles"></div> {{$row_category_branch->category_title}}
                    </h2>
                    @php
                    $post = new App\Models\Post();
                    $data_post = $post->where('post_status',2)->get();
                    $nub = 0;
                    foreach($data_post as $row_data_post)
                    {if($row_data_post->category_id ==$row_category_branch->category_id){$nub++;}}
                    @endphp
                    <p class="color-light-gray" style="font-size:12px;">Tổng số bài viết là {{$nub}}.</p>
                    <br>
                    <div style="padding: 5px;" class="row popular-post ">
                        @php
                        $data = new App\Models\Post();
                        $post_category1 = $data::where('category_id',$row_category_branch->category_id)->where('post_status',2)->orderBy('post_id', 'DESC')->take(4)->get();
                        @endphp
                        @foreach($post_category1 as $row_post_category1)
                        @if($row_post_category1->category_id == $row_category_branch->category_id)
                        <div class="col-3 col-position">
                            <a href="{{url('/post')}}/{{$row_post_category1->post_slug}}/{{$row_post_category1->post_id}}">
                            <img title="{{$row_post_category1->post_title}}" class="img height_imgg" src="{{ URL::asset('images/post_image') }}/{{$row_post_category1->post_image}}" alt="image post" />
                             </a>
                            <a href="{{url('/post')}}/{{$row_post_category1->post_slug}}/{{$row_post_category1->post_id}}">
                                <h3 class="font-size-13 height-newss">{{$row_post_category1->post_title}}</h3>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @endforeach





                    <h2>
                        <div class="vertical_tiles"></div> Mới Nhất
                    </h2>
                    @php
                    $post = new App\Models\Post();
                    $data_post = $post->where('post_status',2)->get();
                    $nub = 0;
                    foreach($data_post as $row_data_post)
                    {if($row_data_post->category_id ==$categorys->category_id){$nub++;}}
                    @endphp
                    <p class="color-light-gray" style="font-size:12px;">Tổng số bài viết là {{$nub}}.</p>
                    <br>
                    @foreach($post_categoryt as $row_post)
                    @if($row_post->category_id == $categorys->category_id )
                    <div style="padding: 5px;" class="row popular-post ">
                        <div class="col-4 col-position ">
                              <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                            <img title="{{$row_post->post_title}}" class="img height_img" src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" alt="image post" />
                             </a>

                        </div>
                        <div class="col-8 col-margin-left">
                            <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                                <h3>{{$row_post->post_title}}</h3>
                            </a>
                            <ul class="list-horizontal font-size-13">
                                <li>
                                    <span>Từ</span>
                                    @foreach($user as $row_user)
                                    @php
                                        $slug = Str::slug($row_user->name, '-');
                                        @endphp
                                    @if($row_user->id == $row_post->user_id)


                                    <a style="text-transform: capitalize" href="{{url('/user/author')}}/{{$slug}}/{{$row_user->id}}">{{$row_user->name}}</a>

                                    @endif
                                    @endforeach
                                </li>
                                <li>
                                                                        @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at ,8,2).'/'.substr($row_post->created_at,5,2).'/'.substr($row_post->created_at,0,4) ; @endphp

                                </li>
                            </ul>
                            <p class="color-light-gray font-size-13">{{$row_post->post_intro}}</p>

                        </div>
                    </div>
                    @endif
                    @endforeach
                </article>
                <div style="text-align: center">{!!$post_categoryt->links()!!}</div>
            </div>
            <div class="col-4">
                <aside>
                    <!-- popular_posts -->
                    @include('popular_posts')
                    <!-- end popular_posts -->
                    <!-- category -->
                    @include('list_categories')
                    <!-- end category -->

                    <!-- follow_my -->
                    @include('follow_my')
                    <!-- end follow_my -->
 <!-- recommended -->
 @include('recommended')
                    <!-- end recommended -->
                </aside>
            </div>
        </div>
    </section>
</main>
@endsection