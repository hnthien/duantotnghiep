
@foreach($search_results as $row)
<a style="padding: 5px;box-sizing: border-box;" class="row" href="{{url('admin/post/edit')}}/{{$row->post_slug}}/{{$row->post_id}}">
   <img class="col-3" src="{{ URL::asset('images/post_image') }}/{{$row->post_image}}" />
    <samp class="col-9">
    <samp style="text-transform: capitalize;font-weight: bold;">{{$row->post_title}}</samp><br>
    @foreach($user as $row1)
    @if($row1->id == $row->user_id)
    {{$row1->email}}
    {{$row1->name}}
    @endif
    @endforeach
    </samp>
</a>
@endforeach