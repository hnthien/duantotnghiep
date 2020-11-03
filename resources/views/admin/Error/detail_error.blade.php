@extends('layouts.admin')
@section('admin','Đóng Góp Ý Kiến - T20 News')
@section('content')
<main >

    <section class="section ">
    <div class="row popular-post ">
        <h1 class="col-12 col-center" style="font-size: 30px;">Ý Kiến Người Dùng</h1>
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
        <h3>Tiêu đề: {{$data->error_title}}</h3>
        <h3>Nội dung:</h3>
        <p class="popular-post col-padding">
        {{$data->error_content}}
        </p>
        <a href="{{$data->error_url}}"><button class="btn background-greed">Xem</button></a>
      
     
        </div>
        

    </section>
</main>
@endsection