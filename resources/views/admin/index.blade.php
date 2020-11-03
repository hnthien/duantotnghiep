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
        <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-young-green"><i class="fas fa-user-shield"></i>Kiểm Duyệt</h4>
                <p>Number of Moderators</p>
                <?php
                   $user = new App\User();
                   $data = $user->all();
                   $number = 0;                                  
                        foreach($data as $row){
                        if($row->role_user == 1){
                             $number++;
                        }                                                 
                        }
                       
                        echo  '<b>'.$number.'</b>';      
                ?>
               
               
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-young-green"><i class="fas fa-user-edit"></i>Nhà Báo</h4>
                <p>Number of Journalists</p>
                <?php
                   $user = new App\User();
                   $data = $user->all();
                   $number = 0;                                  
                        foreach($data as $row){
                        if($row->role_user==2){
                            $number++;
                        }                                                
                        }
                       
                        echo  '<b>'.$number.'</b>';      
                ?>
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-blue"><i class="fas fa-users"></i>Người dùng</h4>
                <p>Number of User</p>
                <?php
                   $user = new App\User();
                   $data = $user->all();
                   $number = 0;                                  
                        foreach($data as $row){
                        if($row->role_user==0){
                            $number++;
                        }                                                 
                        }
                       
                        echo  '<b>'.$number.'</b>';      
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-light-blue"><i class="fas fa-comments"></i>Bình Luận</h4>
                <p>Number of Comments</p>
                
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-light-blue"><i class="fas fa-comment-dots"></i>Đóng Góp Ý kiến</h4>
                <p>Number of Feedback</p>
                <?php
                   $feedback = new App\Feedback();
                   $data = $feedback->all();
                   $number = 1;                                  
                        foreach($data as $row){                       
                           $nub = $number++;                                                                 
                        }
                       
                        echo  '<b>'.$nub.'</b>';      
                ?>
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-brown"> <i class="fas fa-marker"></i>Bài Viết</h4>
                <p>Number of Articles</p>
            </div>
        </div>
        <div class="row">
        <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-red"><i class="fas fa-exclamation-triangle"></i>Báo Cáo Vi Phạm</h4>
                <p>Number of Violation Reports</p>
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-red"><i class="fas fa-exclamation-circle"></i>Báo Cáo Lỗi</h4>
                <p>Number of Bug</p>
                <?php
                   $error = new App\Error();
                   $data = $error->all();
                   $number = 1;                                  
                        foreach($data as $row){                       
                           $nub = $number++;                                                                 
                        }
                       
                        echo  '<b>'.$nub.'</b>';      
                ?>
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-green"><i class="fas fa-th-list"></i>Chủ Đề</h4>
                <p>Number of Categories</p>
            </div>
        </div>
    </section>
    <section>
    <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">News new</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Tin tức mới cập nhật.</span>
        </div>
    <div class="row background-gray color-white text-align--center col-padding">
        <div class="col-1">#</div>
        <div class="col-3">Name news</div>
        <div class="col-4">Intro</div>
        <div class="col-2">Status</div>
        <div class="col-2">Iournalist</div>
        </div>
    </section>
</main>
@endsection