@extends('layouts.client')
@section('client','Chính sách - T20NEWS')
@section('content')
<main class="content col-margin--top ">
    <div class=" col-margin--bottom">
        <ul class="list-horizontal">
            <li><a href="{{url('/')}}"><b><i class="fas fa-home text-color--gray"></i> Trang chủ<i class="fas fa-angle-right"></i></b></a></li>
            <li><a class="color-gray" href="{{url('gioi-thieu-t20news')}}">Chính sách</a></li>
        </ul>
    </div>
    <section class="section">
       <div class="row">
           <div class="col-8">
           <div class="row ">
                    <div class=" popular-post post-contect">
                        <h1 class="text-title-post">Chính sách của chúng tôi</h1>
                        <p class=" font-size-13">Lưu ý : Website chỉ là một dự án thử nghiệm của chúng mình  nên hầu hết các bài viết là của trang <a target="_blank" href="https://zingnews.vn/" class="color-red">zingnews.vn</a>
                    chúng mình chỉ mượn để sử dụng cho dự án thôi. Xin cám ơn !
                    </p>
                       <br>
                        <p>

                            Xin chào tất cả mọi người ! Chào mừng các bạn đã gia nhập ngồi nhà tin tức T20News . Ở đây chúng tôi luôn đăng tải những tin tức mới nhất trong nước và thế giới.
                            Bao gồm rất nhiều thể loại từ xã hội cho đến đời sống giải trí. Chúng tôi cung cấp cho bạn những tin tức mới nhất và luôn luôn đảm bảo chất lượng tin tức chính xác nhất.
                           <br><br>
                            <img class="img" alt="T20news" src="https://erasmusplus.org.ge/files/news/news-1.jpg"/><br><br>
                            Thông tin từ thị trường quảng cáo số Việt Nam của Adsota, Việt Nam hiện nay có 43,7 triệu người đang sử dụng các thiết bị smartphone trên tổng dân số 97,4 triệu dân, tương đương tỷ lệ 44,9%.<br>
Theo đó, tính đến cuối năm 2019, Việt Nam lọt vào top 15 thị trường có số lượng người dùng smartphone cao nhất thế giới, đứng đầu trong danh sách này là Trung Quốc với 851,2 triệu người sử dụng.<br>
Theo báo cáo của Vietnam Digital Advertising 2019, trong năm qua, trung bình hằng ngày mỗi người Việt Nam dành khoảng 6 tiếng 42 phút - tương đương với 1/4 ngày, để truy cập Internet.<br>
Những con số trên chứng tỏ điều gì? Nó cho ta thấy một thị trường màu mỡ trên internet đang mở rộng ở việt nam. Hiện nay đi trên đường phố hay các quán cà phê hay nhiều nơi khác chúng ta sẽ trông thấy rất nhiều người sử dụng điện thoại, họ dùng điện thoại làm gì? chỉ đơn giản là chơi game, xem phim, lướt mạng xã hội và đọc tin tức.<br>
Hiện nay đọc tin tức online nó khá là được ưa chuộn vì nó giúp người đọc tiết kiệm thời gian để đi mua báo ở các cửa hàng cũng như tiết kiệm được tiền mua báo và đọc báo online thì nó khá dễ dàng khi ta chỉ cần vào đường google là có thể tìm tin tức mình cần đọc. <br>
Theo kết quả nghiên cứu mới nhất mà (Broadcasting Board of Governors) và Gallup có được, người Việt Nam rất thích đọc tin tức trên internet. Có 9 trên 10 người trưởng thành (88%) luôn cập nhật thông tin hàng ngày và gần như tất cả (96,8%) đều dõi theo thói quen này ít nhất mỗi tuần một lần. <br>
Hiện nay trên thế giới có rất nhiều tờ báo lớn cũng đã xây dựng các trang tin tức online trên internet cho mình như là CNN, BBC hay là The New York Times. Điều này chứng tỏ tin tức online trên internet là một chủ đề Hot không chỉ riêng Việt Nam mà cả trên thế giới. Từ những con số thống kê và những tờ báo lớn cũng đang dần chuyển qua dạng tin tức online cho thấy thị trường tin tức online rất màu mỡ và chúng ta cần khai thác nó để nó trở thành con gà đẻ trứng vàng. Vì vậy nhóm 2 chọn thiết kế và xây dựng website tin tức.

                        </p>
                    </div>
           </div>
           </div>
           <div class="col-4">
                <aside>
                    <!-- popular_posts -->
                    @include('popular_posts')
                    <!-- end popular_posts -->
                    <!-- category -->
                    @include('list_categories')
                    <!-- end category -->
                    <div class="popular-post col-padding">
                        <h2>LET'S HANG OUT ON SOCIAL</h2>
                        <div class="row">
                            <div class="col-6">
                                <a href="#"><button class="btn col-margin--bottom background-dark-blue"><i class="fab fa-facebook-f"></i> FACEBOOK</button></a>
                                <a href="#"><button class="btn col-margin--bottom background-blue"><i class="fab fa-twitter"></i> TWITTER</button></a>
                                <a href="#"><button class="btn background-red"><i class="fab fa-youtube"></i> YOUTUBE</button></a>
                            </div>
                            <div class="col-6">
                                <a href="#"><button class="btn col-margin--bottom background-orangered"><i class="fab fa-google-plus-g"></i> GOOGLE</button></a>
                                <a href="#"><button class="btn col-margin--bottom background-orchid"><i class="fab fa-instagram"></i> INSTAGRAM</button></a>
                                <a href="#"><button class="btn background-oranger"><i class="fas fa-rss"></i>RSS</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- recommended -->
                    @include('recommended')
                    <!-- end recommended -->

                </aside>
            </div>
       </div>
    </section>
</main>
@endsection