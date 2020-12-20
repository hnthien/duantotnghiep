
@foreach($search_results as $row_post)
<div style="margin-top: 5px; padding:5px 10px" class="row">
    <div class="col-12">
        <a  href="{{url('admin/post/approval')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
            <h4 style="margin: 0px;" class="font-size-13">{{$row_post->post_title}}</h4>
        </a>
        <ul class="list-horizontal font-size-13">
            <li class="text-color-white">
                <span>Từ</span>
                @foreach($user as $row_user)
                @if($row_user->id == $row_post->user_id)
                @php
                $slug = Str::slug($row_user->name, '-');
                @endphp
                <a href="{{url('/user/author')}}/{{$slug}}/{{$row_user->id}}">{{$row_user->name}}</a>
                @endif
                @endforeach
            </li>
            <li >
                @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at,5,2).'/'.substr($row_post->created_at ,8,2).'/'.substr($row_post->created_at,0,4) ; @endphp
            </li>
        </ul>

    </div>
</div>
<hr>
@endforeach