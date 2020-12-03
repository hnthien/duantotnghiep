<div class="row">
    <div class="col-3  ">
        <div class="row col-margin--bottom">
            <div class="col-4 ">
                <a href="#"><img width="120px" src="{{ URL::asset('images') }}/t20l.png" alt="logo" /></a>
            </div>
        </div>
        <p class="col-margin--bottom text-color-white"> © 2018 T20News | Made by T20</p>
        <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-twitter"></i></a>
        <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-google-plus-g"></i></a>
        <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-youtube"></i></a>
        <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-instagram"></i></a>

    </div>
    <div class="col-2 ">
        <h2 class="text-color-white">Liên kết hữu ích</h2>
        <ul class="list-vertical">

            <li><a href="#" class="text-color-white"><i class="fas fa-angle-right"></i>Giới Thiệu</a></li>
            <li><a href="{{url('/account')}}" class="text-color-white"><i class="fas fa-angle-right"></i>Tác Giả</a>
            </li>
            <li><a href="#" class="text-color-white"><i class="fas fa-angle-right"></i>Search Results</a></li>
            <li><a href="{{url('/404')}}" class="text-color-white"><i class="fas fa-angle-right"></i>404</a></li>
        </ul>
    </div>
    <div style="background: none;" class="col-5 post">
        <h2 class="text-color-white">Tin mới nhất</h2>
        @php
        $post = new App\Models\Post();
        $data_post = $post->orderBy('post_id','DESC')->take(2)->get();
        $user = new App\User();
        $data_user = $user::all();
        @endphp
        @foreach($data_post as $row_post)
        <div class="row col-margin--bottom">
            <div class="col-3">
                <img width="100%" height="100%" src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}"
                    alt="post small" />
            </div>
            <div class="col-9 col-margin-left ">
                <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                    <h4 style="margin: 0px;" class="text-color-white">{{$row_post->post_title}}</h4>
                </a>
                <ul class="list-horizontal font-size-13">
                    <li class="text-color-white">
                        <span>by</span>
                        @foreach($data_user as $row_user)
                        @if($row_user->id == $row_post->user_id)
                        <a style="text-transform: capitalize" href="#">{{$row_user->name}}</a>
                        @endif
                        @endforeach
                    </li>
                    <li class="text-color-white">
                        @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo
                        substr($row_post->created_at ,0,10) ; @endphp
                    </li>
                </ul>
            </div>
        </div>
        @endforeach



    </div>
    <div class="col-2 ">
        <h2 class="text-color-white">Fage</h2>

    </div>
</div>