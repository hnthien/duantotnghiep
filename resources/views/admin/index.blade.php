@extends('layouts.admin')
@section('admin','Administrator - T20 News')
@section('content')
<main class="col-10 ">
    <section class=" col-padding">
        <div class="row popular-post ">
            <h1 class="col-12 col-center" style="font-size: 30px;">Administrato</h1>
        </div>
        <div class="row">
        <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-young-green"><i class="fas fa-user-shield"></i>Kiểm Duyệt</h4>
                <p>Number of Moderators</p>
            </div>
            <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-young-green"><i class="fas fa-user-edit"></i>Nhà Báo</h4>
                <p>Number of Journalists</p>
            </div>
            <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-blue"><i class="fas fa-users"></i>Người dùng</h4>
                <p>Number of User</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-light-blue"><i class="fas fa-comments"></i>Bình Luận</h4>
                <p>Number of Comments</p>
            </div>
            <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-light-blue"><i class="fas fa-comment-dots"></i>Đóng Góp Ý kiến</h4>
                <p>Number of Feedback</p>
            </div>
            <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-brown"> <i class="fas fa-marker"></i>Bài Viết</h4>
                <p>Number of Articles</p>
            </div>
        </div>
        <div class="row">
        <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-red"><i class="fas fa-exclamation-triangle"></i>Báo Cáo Vi Phạm</h4>
                <p>Number of Violation Reports</p>
            </div>
            <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-red"><i class="fas fa-exclamation-circle"></i>Báo Cáo Lỗi</h4>
                <p>Number of Bug</p>
            </div>
            <div class="col-4 popular-post col-padding col-height">
                <h4 class="color-green"><i class="fas fa-th-list"></i>Chủ Đề</h4>
                <p>Number of Categories</p>
            </div>
        </div>
    </section>
</main>
@endsection