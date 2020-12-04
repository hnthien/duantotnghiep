@php
$dttt = new Illuminate\Support\Carbon;
$post = new App\Models\Post();
$post_recommended = $post->whereBetween('created_at', [$dt = $dttt::now()->subDays(14),$dt = $dttt::now()])->inRandomOrder()->take(2)->get();
$user = new App\User();
$data_user = $user::all();
@endphp

<div class="popular-post col-padding">
    <h2>ĐỀ XUẤT</h2>
    <p class="color-light-gray" style="font-size:12px;">Bài viết được đề xuất ngẫu nhiêu.</p>
     <br>
    @foreach($post_recommended as $row_post)
    <div>
        <img class="img" src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" alt="review post" />
        <a href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
            <h4 style="margin: 0px;">{{$row_post->post_title}}</h4>
        </a>

        <ul class="list-horizontal font-size-13 color-light-gray">
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
                @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at ,0,10) ; @endphp
            </li>
        </ul>
    </div>
    @endforeach
</div>