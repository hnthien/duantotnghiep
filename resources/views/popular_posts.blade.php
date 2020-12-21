@php
$dtt = new Illuminate\Support\Carbon;
$post = new App\Models\Post();
$popular_post = $post->whereBetween('created_at', [$dt = $dtt::now()->subDays(14),$dt = $dtt::now()])->where('post_status',2)->orderBy('post_view','DESC')->take(8)->get();
$user = new App\User();
$data_user = $user::all();
@endphp

<div class="popular-post " style="padding: 8px;">
    <h2>BÀI VIẾT PHỔ BIẾN</h2>
    <p class="color-light-gray" style="font-size:12px;">Bài viết được đọc nhiều nhất trong một tuần.</p>
    
    @foreach($popular_post as $row_post)
    <div style="margin:3px 0px" class="row col-border-bottom ">
        <div style="margin-left: 0px;padding:0px" class="col-3">
            <img class="img "  src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" alt="post small" />
        </div>
        <div class="col-9 ">
            <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
                <h4 class="font-size-13" style="margin: 0px;">{{$row_post->post_title}}</h4>
            </a>
            <ul style="font-size: 12px;" class="list-horizontal color-light-gray">
                <li>
                    <span>Từ</span>
                    @foreach($data_user as $row_user)
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
        </div>
    </div>
    @endforeach
</div>