@extends('layouts.admin')
@section('admin','Administrator - T20 News')
@section('content')
<main>
    <section class="">
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">News Dashboard</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Dashboard <i class="fas fa-angle-right"></i>News Dashboard </span>
        </div>
        <div class="row">
            <div style="margin-bottom: 10px;" class="col-4 popular-post col-padding ">
                <h4 class="color-young-green"><i class="fas fa-user-shield"></i>Kiểm Duyệt ({{$user_kd}})</h4>
               

            </div>
            <div style="margin-bottom: 10px;" class="col-4 popular-post col-padding  col-margin-left">
                <h4 class="color-young-green"><i class="fas fa-user-edit"></i>Nhà Báo ({{$user_nd}})</h4>
               
            </div>
            <div style="margin-bottom: 10px;" class="col-4 popular-post col-padding col-margin-left">
                <h4 class="color-blue"><i class="fas fa-users"></i>Người dùng ({{$user_tg}})</h4>
              
            </div>
        </div>
        <div class="row">
            <div style="margin-bottom: 10px;" class="col-4 popular-post col-padding ">
                <h4 class="color-light-blue"><i class="fas fa-comments"></i>Bình Luận ({{$comment}})</h4>
               
            </div>
            <div style="margin-bottom: 10px;" class="col-4 popular-post col-padding  col-margin-left">
                <h4 class="color-light-blue"><i class="fas fa-comment-dots"></i>Đóng Góp Ý kiến ({{$feedback}}) </h4>
               
            </div>
            <div style="margin-bottom: 10px;" class="col-4 popular-post col-padding  col-margin-left">
                <h4 class="color-young-green"> <i class="fas fa-marker"></i>Bài Viết Đã Kiểm Duyệt ({{$post_all}})</h4>
        
            </div>
        </div>
        <div class="row">
            <div class="col-4 popular-post col-padding ">
                <h4 class="color-red"><i class="fas fa-exclamation-triangle"></i>Báo Cáo Vi Phạm ({{$comment_report}})</h4>
                
            </div>
            <div class="col-4 popular-post col-padding  col-margin-left">
                <h4 class="color-red"><i class="fas fa-exclamation-circle"></i>Báo Cáo Lỗi ({{$error}})</h4>
                
            </div>
            <div class="col-4 popular-post col-padding  col-margin-left">
            <h4 class="color-red"><i class="fas fa-marker"></i>Bài Viết Chưa Kiểm Duyệt ({{$post}})</h4>
                
            </div>
        </div>
    </section>
    <section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" type="text/javascript">  </script>
    <div class="col-margin--bottom">
            <h2 class="col-12" style="font-size: 20px;margin:10px 0px">Thống kê bài viết</h2>
            <hr>
        </div>
        <div class="row">
            <div class="col-6">
            <div class="d-flex">
                                <p class="text-bold " >
                                    <span >{{$post_all}}</span>
                                    <span>Số bài viết</span>
                                </p>
                                <p class="text-bold" >
                                    @if($count_month_current > 0)
                                    <span class="text-success">
                                        {{$count_month_current}} <i class="fas fa-arrow-up"></i>
                                    </span>
                                    @else
                                    <span class="text-danger">
                                        {{$count_month_current}} <i class="fas fa-arrow-down"></i>
                                    </span>
                                    @endif

                                    <span class="text-muted">Số bài viết tháng này so với tháng trước</span>
                                </p>
                                <pƯ class="font-size-13 color-light-gray">Tháng này {{$months}}</pƯ>
                            </div>
                         
    <canvas id="myChart2"  height="100"></canvas>
            </div>
            <div class="col-6"> 
            <div class="d-flex">
                                <p class="text-bold " >
                                    <span >{{$post_all}}</span>
                                    <span>Số bài viết</span>
                                </p>
                                <p class="text-bold" >
                                    @if($count_month_current > 0)
                                    <span class="text-success">
                                        {{$count_month_current}} <i class="fas fa-arrow-up"></i>
                                    </span>
                                    @else
                                    <span class="text-danger">
                                        {{$count_month_current}} <i class="fas fa-arrow-down"></i>
                                    </span>
                                    @endif

                                    <span class="text-muted">Số bài viết tháng này so với tháng trước</span>
                                </p>
                                <p class="font-size-13 color-light-gray">Ngày hôm nay {{$day}}</p>
                            </div>
            <canvas id="myChart0" height="100"></canvas>
            </div>
        </div>
   
  
    <div class="col-margin--bottom">
            <h2 class="col-12" style="font-size: 20px;margin:10px 0px">Thống kê đăng kí tài khoản</h2>
            <hr>
        </div>
  
    <div class="d-flex">
                                <p class="text-bold ">
                                    <span>{{$user}}</span>
                                    <span>Số tài khoản</span>
                                </p>
                                <p class="text-bold">
                                    @if($count_month_current_user > 0)
                                    <span class="text-success">
                                        {{$count_month_current_user}} <i class="fas fa-arrow-up"></i>
                                    </span>
                                    @else
                                    <span class="text-danger">
                                        {{$count_month_current_user}} <i class="fas fa-arrow-down"></i>
                                    </span>
                                    @endif

                                    <span class="text-muted">Số tài khoản đăng kí</span>
                                </p>
                            </div>
    <canvas id="myChart"  height="100"></canvas>
    </section>
    
   
</main>
 <script>
       var ctx = document.getElementById('myChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Lượt đăng kí',
                    data: [{{$countMonth_user[0]}}, 
                    {{$countMonth_user[1]}},
                    {{$countMonth_user[2]}}, 
                    {{$countMonth_user[3]}}, 
                    {{$countMonth_user[4]}}, 
                    {{$countMonth_user[5]}}, 
                    {{$countMonth_user[6]}}, 
                    {{$countMonth_user[7]}}, 
                    {{$countMonth_user[8]}}, 
                    {{$countMonth_user[9]}}, 
                    {{$countMonth_user[10]}}, 
                    {{$countMonth_user[11]}}],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                        'red',
                        'blue',
                        'black',
                        'blueviolet',
                        'rgb(88, 19, 153)',
                        'rgb(153, 19, 124)'

                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                        'red',
                        'blue',
                        'black',
                        'blueviolet',
                        'rgb(88, 19, 153)',
                        'rgb(153, 19, 124)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById('myChart0').getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Ngày 1',
                    'Ngày 2',
                    'Ngày 3',
                    'Ngày 4',
                    'Ngày 5',
                    'Ngày 6',
                    'Ngày 7',
                    'Ngày 8',
                    'Ngày 9',
                    'Ngày 10',
                    'Ngày 11',
                    'Ngày 12',
                    'Ngày 13',
                    'Ngày 14',
                    'Ngày 15',
                    'Ngày 16',
                    'Ngày 17',
                    'Ngày 18',
                    'Ngày 19',
                    'Ngày 20',
                    'Ngày 21',
                    'Ngày 22',
                    'Ngày 23',
                    'Ngày 24',
                    'Ngày 25',
                    'Ngày 26',
                    'Ngày 27',
                    'Ngày 28',
                    'Ngày 29',
                    'Ngày 30',
                    'Ngày 31'

                ],
                datasets: [{
                    label: 'Bài viết',
                    data: [
                        {{$countDate[0]}},
                        {{$countDate[1]}},
                        {{$countDate[2]}},
                        {{$countDate[3]}},
                        {{$countDate[4]}},
                        {{$countDate[5]}},
                        {{$countDate[6]}},
                        {{$countDate[7]}},
                        {{$countDate[8]}},
                        {{$countDate[9]}},
                        {{$countDate[10]}},
                    {{$countDate[11]}},
                    {{$countDate[12]}},
                    {{$countDate[13]}},
                    {{$countDate[14]}},
                    {{$countDate[15]}},
                    {{$countDate[16]}},
                    {{$countDate[17]}},
                    {{$countDate[18]}},
                    {{$countDate[19]}},
                    {{$countDate[20]}},
                    {{$countDate[21]}},
                    {{$countDate[22]}},
                    {{$countDate[23]}},
                    {{$countDate[24]}},
                    {{$countDate[25]}},
                    {{$countDate[26]}},
                    {{$countDate[27]}},
                    {{$countDate[28]}},
                    {{$countDate[29]}},
                    {{$countDate[30]}} ],
                    backgroundColor: [
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)',
                        'rgba(177, 22, 143, 0.507)'
                    ],
                    borderColor: [
                        'rgba(177, 22, 143, 0.507)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Số bài viết',
                    data: [{{$countMonth[0]}}, {{$countMonth[1]}}, {{$countMonth[2]}}, {{$countMonth[3]}}, {{$countMonth[4]}}, {{$countMonth[5]}}, {{$countMonth[6]}}, {{$countMonth[7]}}, {{$countMonth[8]}}, {{$countMonth[9]}}, {{$countMonth[10]}}, {{$countMonth[11]}}],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)'

                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                      
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>

@endsection