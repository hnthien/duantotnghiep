@foreach($search_results as $row_post)
@if($row_post->post_status == 2)
<div class="search_img">
<div class="  row ">
    <div class="col-3">
        <img class="img height_imgg " src="{{ URL::asset('images/post_image') }}/{{$row_post->post_image}}" />
    </div>
    <div class="col-9">
        <a  href="{{url('/post')}}/{{$row_post->post_slug}}/{{$row_post->post_id}}">
            <h4 style="margin: 0px;" class="text-color-gray">{{$row_post->post_title}}</h4>
        </a>
        <ul class="list-horizontal font-size-13">
            <li class="text-color-white">
                <span>by</span>
                @foreach($user as $row_user)
                @if($row_user->id == $row_post->user_id)
                <a href="#">{{$row_user->name}}</a>
                @endif
                @endforeach
            </li>
            <li >
                @php echo substr($row_post->created_at ,10,3).':'.substr($row_post->created_at ,14,2)." "; echo substr($row_post->created_at,5,2).'/'.substr($row_post->created_at ,8,2).'/'.substr($row_post->created_at,0,4) ; @endphp
            </li>
        </ul>

    </div>
</div>
</div>
@endif
@endforeach