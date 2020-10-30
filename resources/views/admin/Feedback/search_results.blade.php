<?php

$user = new App\User();
$data1 = $user->all();
?>
@foreach($search_results as $row)
<a class="row col-padding" href="{{url('/admin/feedback/detail_feedback')}}/{{$row->feedback_id}}">
    <samp>
    <samp style="text-transform: capitalize;font-weight: bold;">{{$row->feedback_title}}</samp><br>
    @foreach($data1 as $row1)
    @if($row1->id == $row->user_id)
    {{$row1->email}}
    @endif
    @endforeach
    </samp>
</a>
@endforeach