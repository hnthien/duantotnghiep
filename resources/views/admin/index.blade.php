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
                $number = 0;
                foreach ($user as $rowu) {
                    if ($rowu->role_user == 1) {
                        $number++;
                    }
                }
                echo  '<b>' . $number . '</b>';
                ?>


            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-young-green"><i class="fas fa-user-edit"></i>Nhà Báo</h4>
                <p>Number of Journalists</p>
                <?php               
                $number = 0;
                foreach ($user as $u) {
                    if ($rowu->role_user == 2) {
                        $number++;
                    }
                }
                echo  '<b>' . $number . '</b>';
                ?>
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-blue"><i class="fas fa-users"></i>Người dùng</h4>
                <p>Number of User</p>
                <?php             
                $number = 0;
                foreach ($user as $rowu) {
                    if ($rowu->role_user == 0) {
                        $number++;
                    }
                }
                echo  '<b>' . $number . '</b>';
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
                $number = 0;
                foreach ($feedback as $rowf) {
                   $number++;
                }

                echo  '<b>' . $number . '</b>';
                ?>
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-brown"> <i class="fas fa-marker"></i>Bài Viết</h4>
                <p>Number of Articles</p>
                <?php               
                $number = 0;
                foreach ($post_all as $row) {
                   $number++;
                }

                echo  '<b>' . $number . '</b>';
                ?>
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
                $number = 0;
                foreach ($error as $rowe) {
                    $number++;
                }

                echo  '<b>' . $number . '</b>';
                ?>
            </div>
            <div class="col-4 popular-post col-padding col-height col-margin-left">
                <h4 class="color-green"><i class="fas fa-th-list"></i>Chủ Đề</h4>
                <p>Number of Categories</p>
                <?php               
                $number = 0;
                foreach ($category as $rowc) {
                     $number++;
                }

                echo  '<b>' . $number . '</b>';
                ?>
            </div>
        </div>
    </section>
    <section>
        <div class="col-margin--bottom">
            <h1 class="col-12" style="font-size: 20px;margin:10px 0px">News new</h1>
            <hr>
            <span style="font-size: 12px; font-weight: bold;">Tin tức mới cập nhật.</span>
        </div>
        <table>
            <tr>
                <th>#id</th>
                <th>Image</th>
                <th>Name news</th>
                <th>Intro</th>
                <th>Category</th>
                <th>View</th>
                <th>Iournalist</th>
            </tr>
            @foreach($post as $row)
            <tr>
                <td>{{$row->post_id}} </td>
                <td>
                <img width="140px" height="80px" src="{{ URL::asset('images/post_image') }}/{{$row->post_image}}" alt="logo" />

                </td>
                <td><b>{{$row->post_title}}</b></td>
                <td>{{$row->post_intro}}</td>
                <td style="width:150px;text-align: center;">
                   
                    @foreach($category as $cate)
                    @if($cate->category_id == $row->category_id)
                    <span class="col-border-category">{{$cate->category_title}}</span>
                    @endif
                    @endforeach
                    
                </td>
                <td>{{$row->post_view}}</td>
                <td> 
                    @foreach($user as $row2)
                     @if($row2->id == $row->user_id)
                     {{$row2->email}}<br>
                    {{$row2->name}}
                    @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
        </table>
    </section>
</main>
@endsection