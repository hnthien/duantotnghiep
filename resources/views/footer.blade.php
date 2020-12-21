<div class="row">
            <div class="col-3  ">
                <div class="row col-margin--bottom">
                    <div class="col-4 ">
                        <a href="#"><img width="120px" src="{{ URL::asset('images') }}/t20l.png" alt="logo" /></a>
                    </div>
                </div>
                <p class="col-margin--bottom text-color-white"> © 2020 T20News | Made by T20</p>
                <p style="margin-bottom:5px;" class="font-size-13 text-color-white">Theo dõi chúng tôi</p>
                <a href="https://www.facebook.com/TheT20News" target="_blank" class="text-color-white"><i style="font-size: 20px;" class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-twitter"></i></a>
                <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-google-plus-g"></i></a>
                <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-youtube"></i></a>
                <a href="#" class="text-color-white"><i style="font-size: 20px;" class="fab fa-instagram"></i></a>

            </div>
            <div class="col-2 ">
                <h2 class="text-color-white">Liên kết hữu ích</h2>
                <ul class="list-vertical">

                    <li><a href="{{url('gioi-thieu-t20news')}}" class="text-color-white"><i class="fas fa-angle-right"></i>Giới Thiệu</a></li>
                                        <li><a href="{{url('chinh-sach-t20news')}}"class="text-color-white"><i class="fas fa-angle-right"></i>Chính Sách</a></li>
                    <li><a href="{{url('quy-dinh-t20news')}}"class="text-color-white"><i class="fas fa-angle-right"></i>Quy Định</a></li>
                </ul>
            </div>
            <div style="background: none;" class="col-4 post">            
                <h2 class="text-color-white">Tin mới nhất</h2>
                @php 
                $post = new App\Models\Post();
                $data_post = $post->where('post_status',2)->orderBy('post_id','DESC')->take(2)->get();
                $user = new App\User();
                $data_user = $user::all();
                @endphp
                @foreach($data_post as $row_post)
                <div class="row col-margin--bottom">
                    <div class="col-4">
                         <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                        <img title="{{$row_post->post_title}}" width="100%" class="height_imgg" src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" alt="post small" />
                         </a>
                    </div>
                    <div class="col-8 col-margin-left ">
                        <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                            <h4 style="margin: 0px;" class="text-color-white">{{$row_post->post_title}}</h4>
                        </a>
                        <ul class="list-horizontal font-size-13">
                            <li class="text-color-white">
                                <span>Từ</span>
                                @foreach($data_user as $row_user)
                                @php
                                        $slug = Str::slug($row_user->name, '-');
                                        @endphp
                                @if($row_user->id == $row_post->user_id)
                                <a   style="text-transform: capitalize ; color: rgb(160, 6, 6);" href="{{url('/user/author')}}/{{$slug}}/{{$row_user->id}}">{{$row_user->name}}</a>
                                @endif
                                @endforeach
                            </li>
                            <li  class="text-color-white">
                                                                    @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at ,8,2).'/'.substr($row_post->created_at,5,2).'/'.substr($row_post->created_at,0,4) ; @endphp

                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach



            </div>
            <div class="col-3 ">
                <h2 class="text-color-white">Fage</h2>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTheT20News&tabs&width=300&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=1901956559930785" width="300" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>