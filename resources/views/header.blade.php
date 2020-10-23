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
      <div class="col-2  text-align--center text-bold">
          @if (Route::has('login'))

          @auth
          <ul class="menuheader row">
              <li class="col-3"><img style="border-radius: 50%;" width="40px" height="40px" src="{{ URL::asset('images/user') }}/{{ Auth::user()->images_user }}" /> </li>
              <li class="menuheaderli col-9">
                  <a>@php echo substr(Auth::user()->name ,0,10) @endphp <i class="fas fa-caret-down"></i></a>
                  <ul class="menuheaderli__droplist">
                      <li>
                          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <i class="fas fa-sign-out-alt"></i>{{ __('Đăng Xuất') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </li>
                      <li><a href="{{url('/user/profile')}}/{{Auth::user()->name}}"><i class="fas fa-info-circle"></i>Thông Tin</a></li>
                      <li> <a href="{{url('/user/change_password')}}"><i class="fab fa-expeditedssl"></i>Đổi Mật Khẩu</a></li>
                      @if(Auth::user()->role_user == 1 or Auth::user()->role_user == 2 or Auth::user()->role_user == 3 )
                      <li> <a href="{{url('/admin')}}"><i class="fas fa-users-cog"></i>Vào Admin</a></li>
                      @endif
                  </ul>
              </li>
          </ul>

          @else
          <div class="col-margin--top">
              <a href="{{ route('login') }}">Login</a> |

              @if (Route::has('register'))
              <a href="{{ route('register') }}">Register</a>
          </div>

          @endif
          @endauth

          @endif
      </div>
  </div>

  <hr>
  <div class="row menu">

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
      $(document).ready(function() {
          $('#error').click(function() {
              $("#error_box").show();
              // $("#error_box").slideToggle('slow');
              $("#feedback_box").hide();

          });

          $('#error_closed').click(function() {
              $("#error_box").hide();
              // $("#dialog_box").slideToggle('slow');

          });
          $('#feedback').click(function() {
              $("#feedback_box").show();
              // $("#feedback_box").slideToggle('slow');
              $("#error_box").hide();

          });

          $('#feedback_closed').click(function() {
              $("#feedback_box").hide();
              // $("#dialog_box").slideToggle('slow');

          });
      });
  </script>
  <div class="col-position">
      <div class="feedback_box " id="feedback_box">
          <div class="row col-margin--top">
              <div class="col-4"></div>
              <div class="col-4 popular-post col-padding col-position">
                  <div class="feedback_closed " id="feedback_closed"><i style="font-size: 20px;" class="fas fa-times"></i></div>
                  <form method="GET" class="form col-padding">
                      <h3 class="form__name">FEEDBACK</h3>
                      <div class="form__input box_input">
                          <i class="fas fa-wave-square"></i>
                          <input type="text" name="error_url" id="error_url" placeholder=" Title..." />
                      </div>
                      <div class="form__input">
                          <i class="fas fa-comment-alt"></i>
                          <textarea name="error_content" rows="5"></textarea>
                      </div>
                      @if(Auth::user() == null)
                      <div>Vui lòng đăng nhập để gửi góp ý</div>
                      <br>
                      <div class="btn--hover">                   
                      <a  href="{{ route('login') }}"><div class="btn__button col-padding">Đăng Nhập</div></a>                                                                       
                          <div class="btn__hover"></div>
                      </div>
                      @else
                      <div class="btn--hover">
                          <button class="btn__button col-padding">Gửi</button>
                          <div class="btn__hover"></div>
                      </div>
                      @endif
                  </form>
                  <div class="text-align--center">
                      <a href="index.html"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
                      <p>© 2018 T20News | Made by T20</p>
                  </div>

              </div>
              <div class="col-4"></div>
          </div>
      </div>
      <buttom id="feedback" class="feedback col-position--fixed" title="feedback">
          <i style="font-size: 18px;" class="fas fa-question"></i>
      </buttom>
  </div>
  <div class="col-position">
      <div class="error_box " id="error_box">
          <div class="row col-margin--top">
              <div class="col-4"></div>
              <div class="col-4 popular-post col-padding col-position">
                  <div class="error_colsed" id="error_closed"><i style="font-size: 20px;" class="fas fa-times"></i></div>
                  <form method="GET" class="form col-padding">
                      <h3 class="form__name">ERROR</h3>
                      <div class="form__input box_input">
                          <i class="fas fa-wave-square"></i>
                          <input type="text" name="error_url" id="error_url" placeholder=" Error url..." />
                      </div>
                      <div class="form__input">
                          <i class="fas fa-comment-alt"></i>
                          <textarea name="error_content" rows="5"></textarea>
                      </div>
                      @if(Auth::user() == null)
                      <span>Vui lòng đăng nhập để báo lỗi</span>
                      <br>
                      <div class="btn--hover">                            
                         <a  href="{{ route('login') }}"><div class="btn__button col-padding">Đăng Nhập</div></a>                                                                       
                          <div class="btn__hover"></div>
                      </div>
                      @else
                      <div class="btn--hover">
                          <button class="btn__button col-padding">Báo Lỗi</button>
                          <div class="btn__hover"></div>
                      </div>
                      @endif
                  </form>
                  <div class="text-align--center">
                      <a href="index.html"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
                      <p>© 2018 T20News | Made by T20</p>
                  </div>

              </div>
              <div class="col-4"></div>
          </div>
      </div>
      <buttom id="error" class="error col-position--fixed" title="error">
          <i style="font-size: 18px;" class="fas fa-exclamation"></i>
      </buttom>
  </div>