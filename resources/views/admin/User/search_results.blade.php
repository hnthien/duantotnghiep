
@foreach($search_results as $row)
<a class="row" href="{{url('admin/user/edit')}}/{{$row->id}}">
    <img class="col-2" src="{{ URL::asset('images/user') }}/{{$row->images_user}}" style="width:40px;" />
    <samp class="col-10 ">{{$row->name}}<br>
    {{$row->email}}<br>
    @if($row->role_user == 0)
            <samp>Người dùng</samp>          
            @else
            @if($row->role_user == 1)
            <samp>Kiểm Duyệt</samp>
            @else
            @if($row->role_user == 2)
            <samp>Nhà Báo</samp>
            @else
            <samp>Admin</samp>
            @endif
            @endif
            @endif
    </samp>
</a>
@endforeach
