@extends('layouts.admin')
@section('admin','Đóng Góp Ý Kiến - T20 News')
@section('content')
<main >

    <section class="section">
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">Chi tiết phản hồi</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Phản hồi <i class="fas fa-angle-right"></i>Chi tiết phản hồi</span>
        </div>
        <?php
        $user = new App\User();
        $data1 = $user->all();
        ?>
        <div class="popular-post col-padding">
        <p>Người gửi:  
            @foreach($data1 as $row)
            @if($row->id == $data->user_id)
            {{$row->name}} <br>
            Email: 
            {{$row->email}}
            @endif
            @endforeach</p> 
        <p>Ngày gửi: @php echo substr($data->created_at ,0,10) @endphp</p>
        <p>Lúc: @php echo substr($data->created_at ,10,3).' giờ '.substr($data->created_at ,14,2).' phút' @endphp</p>
        <h3>Tiêu đề: {{$data->feedback_title}}</h3>
        <h3>Nội dung:</h3>
        <p class="popular-post col-padding">
        {{$data->feedback_content}}
        </p>
      
     
        </div>
        

    </section>
</main>
@endsection