  <div class="row col-padding">

<div class="col-3 text-align--center ">
    <a href="{{url('/')}}"><img src="{{ URL::asset('images') }}/t20.png" alt="logo" /></a>
</div>
<div class="col-4  ">
    <form class="search" method="POST">
        <span class="item"><i class="fa fa-search"></i></span>
        <input class="search__input" type="search" placeholder="Search......" />
    </form>
</div>
<div class="col-3 text-align--center col-margin--top  ">
    <a href="#"><i style="font-size: 20px;" class="fab fa-facebook-f"></i></a>
    <a href="#"><i style="font-size: 20px;" class="fab fa-twitter"></i></a>
    <a href="#"><i style="font-size: 20px;" class="fab fa-google-plus-g"></i></a>
    <a href="#"><i style="font-size: 20px;" class="fab fa-youtube"></i></a>
    <a href="#"><i style="font-size: 20px;" class="fab fa-instagram"></i></a>
</div>
<div class="col-2 col-margin--top text-align--center text-bold">
    <a class="hover-underlined" href="{{url('/login')}}">Login</a> | <a class="hover-underlined" href="{{url('/registration')}}">Registration</a>
</div>
</div>
<hr>
<div class="row">

<div class="col-2 icon  col-padding" id="icon">
    <a class="" href="javascript:void(0);" onclick="myFunction()" href="">
        <i class="fas fa-stream col-padding--top"></i>
    </a>
</div>
<div class="col-2 ">

</div>
<div class="col-9 menu-none " id="myTopnav">
    <nav class="menu-nav ">
        <ul class="menu-nav__ul text-align--center  ">
            <li>
                <a href="{{url('/')}}">Trang Chủ</a>
                <span class="hover-dash"></span>
            </li>
            <li class="menu-drop col-position ">
                <a href="#">Danh Mục <i class="fas fa-caret-down"></i></a>
                <span class="hover-dash"></span>
                <ul class="menu-drop__list">
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Xã Hội</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Pháp Luật</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Thế Giới</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Kinh Doanh</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Công Nghệ</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Sức Khỏe</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Thể Thao</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Giải Trí</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Đời Sống</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Giáo Dục</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Du Lịch</a>
                    </li>
                    <li>
                        <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Xe</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{url('/catergories')}}">Xã Hội</a>
                <span class="hover-dash"></span>
            </li>
            <li>
                <a href="{{url('/catergories')}}">Pháp Luật</a>
                <span class="hover-dash"></span>
            </li>
            <li>
                <a href="{{url('/catergories')}}">Thế Giới</a>
                <span class="hover-dash"></span>
            </li>
            <li>
                <a href="{{url('/catergories')}}">Kinh Doanh</a>
                <span class="hover-dash"></span>
            </li>
            <li>
                <a href="{{url('/catergories')}}">Công Nghệ</a>
                <span class="hover-dash"></span>
            </li>


            <li>
                <a href="{{url('/author')}}">Tác Giả</a>
                <span class="hover-dash"></span>
            </li>

        </ul>
    </nav>
</div>
<div class="col-1"></div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "menu-none") {
        x.className += " responsive";
    } else {
        x.className = "menu-none";
    }
}
</script>