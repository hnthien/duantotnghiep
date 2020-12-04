<div class="header-admin background-black">
                <nav class="menu-nav col-padding--top ">
                    <ul class=" list-vertical-admin ">
                        <li>
                            <a href="{{url('/admin')}}"><i class="fas fa-laptop"></i>Dashboard <i class="fas fa-angle-right"></i></a>
                            <span class="hover-dash"></span>
                        </li>
                        @if(Auth::user()->role_user == 3 )
                        <li>
                            <a href="{{url('/admin/user')}}"><i class="fas fa-users"></i>Người dùng <i class="fas fa-angle-right"></i></a>
                            <span class="hover-dash"></span>
                        </li>
                        @endif
                        <li>
                            <a href="{{url('/admin/post')}}"><i class="fas fa-clipboard-list"></i>Bài viết  <i class="fas fa-angle-right"></i></a>
                            <span class="hover-dash"></span>
                        </li>
                        @if(Auth::user()->role_user == 3  || Auth::user()->role_user == 1 )
                        <li>
                            <a href="{{url('/admin/category')}}"><i class="fas fa-clipboard-list"></i>Danh mục <i class="fas fa-angle-right"></i></a>
                            <span class="hover-dash"></span>
                        </li>
                        @endif
                        <li>
                            <a href="{{url('/admin/comment')}}"><i class="fas fa-clipboard-list"></i>Bình luận <i class="fas fa-angle-right"></i></a>
                            <span class="hover-dash"></span>
                        </li>
                        @if(Auth::user()->role_user == 3  || Auth::user()->role_user == 1 )
                        <li>
                            <a href="{{url('/admin/feedback')}}"><i class="fas fa-clipboard-list"></i>Đóng Góp Ý Kiến <i class="fas fa-angle-right"></i></a>
                            <span class="hover-dash"></span>
                        </li>
    
                        <li>
                            <a href="{{url('/admin/report')}}"><i class="fas fa-clipboard-list"></i>Báo Cáo Vi Phạm <i class="fas fa-angle-right"></i></a>
                            <span class="hover-dash"></span>
                        </li>
                        @endif
                        @if(Auth::user()->role_user == 3 )
                        <li>
                            <a href="{{url('admin/error')}}"><i class="fas fa-clipboard-list"></i>Báo Cáo Lỗi <i class="fas fa-angle-right"></i></a>
                            <span class="hover-dash"></span>
                        </li>
                        @endif
                    </ul>
                </nav>
                <div style="margin-top: 40px;padding-left:20px">
                    <p style="font-size: 11px;" class="col-margin--bottom color-light-gray"> © 2020 T20 | Made by Hn.Thiện</p>
                    <a href="#"><i style="font-size: 20px;" class="fab fa-facebook-f color-light-gray"></i></a>
                    <a href="#"><i style="font-size: 20px;" class="fab fa-twitter color-light-gray"></i></a>
                    <a href="#"><i style="font-size: 20px;" class="fab fa-google-plus-g color-light-gray"></i></a>
                    <a href="#"><i style="font-size: 20px;" class="fab fa-youtube color-light-gray"></i></a>
                    <a href="#"><i style="font-size: 20px;" class="fab fa-instagram color-light-gray"></i></a>
                </div>

            </div>