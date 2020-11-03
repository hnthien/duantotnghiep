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
      <div class="col-2  text-align--center ">
          @if (Route::has('login'))
          @auth
          <ul class="menuheader row">
              <li class="col-3"><img style="border-radius: 50%;" width="40px" height="40px" src="{{ URL::asset('images/user') }}/{{ Auth::user()->images_user }}" /> </li>
              <li class="menuheaderli col-9">
                  <span href="#" class="text-bold">@php echo substr(Auth::user()->name ,0,10) @endphp <i class="fas fa-caret-down"></i></span>
                  <ul class="menuheaderli__droplist">
                      <li>
                          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <i class="fas fa-sign-out-alt"></i>{{ __('Đăng xuất') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </li>
                      <li><a href="{{url('/user/profile')}}/{{Auth::user()->name}}"><i class="fas fa-info-circle"></i>Thông tin</a></li>
                      <li> <a href="{{url('/user/change_password')}}"><i class="fab fa-expeditedssl"></i>Đổi mật khẩu</a></li>
                      @if(Auth::user()->role_user == 1 or Auth::user()->role_user == 2 or Auth::user()->role_user == 3 )
                      <li> <a href="{{url('/admin')}}"><i class="fas fa-users-cog"></i>Vào admin</a></li>
                      @endif
                  </ul>
              </li>
          </ul>

          @else
          <div class="col-margin--top">
          <i class="fas fa-user-circle"></i> <a class="text-bold" href="{{ route('login') }}">Đăng nhập</a>

          </div>

         
          @endauth

          @endif
      </div>
  </div>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10"><hr></div>
    <div class="col-1"></div>
</div>
 
  <script>
      function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "menu-none") {
              x.className += "responsive";
          } else {
              x.className = "menu-none";
          }
      }
  </script>
  <div class="row menu">

      <div class="col-2 icon  col-padding" id="icon">
          <a href="javascript:void(0);" onclick="myFunction()">
              <i class="fas fa-stream col-padding--top"></i>
          </a>
      </div>
      <div class="col-2 ">

      </div>
      <div class="col-9 menu-none " id="myTopnav">
          <nav class="menu-nav ">
              <ul class="menu-nav__ul text-align--center  ">
                  <li>
                      <a href="{{url('/')}}"><i class="fas fa-home"></i>Trang chủ</a>
                      <span class="hover-dash"></span>
                  </li>
                  <li class="menu-drop col-position ">
                      <a href="#">Danh mục <i class="fas fa-caret-down"></i></a>
                      <span class="hover-dash"></span>
                      <ul class="menu-drop__list">
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Xã hội</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Pháp luật</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Thế giới</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Kinh doanh</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Công nghệ</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Sức khỏe</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Thể thao</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Giải trí</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Đời sống</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Giáo dục</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Du lịch</a>
                          </li>
                          <li>
                              <a href="{{url('/catergories')}}"><i class="fas fa-angle-right"></i>Xe</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="{{url('/catergories')}}">Xã hội</a>
                      <span class="hover-dash"></span>
                  </li>
                  <li>
                      <a href="{{url('/catergories')}}">Pháp luật</a>
                      <span class="hover-dash"></span>
                  </li>
                  <li>
                      <a href="{{url('/catergories')}}">Thế giới</a>
                      <span class="hover-dash"></span>
                  </li>
                  <li>
                      <a href="{{url('/catergories')}}">Kinh doanh</a>
                      <span class="hover-dash"></span>
                  </li>
                  <li>
                      <a href="{{url('/catergories')}}">Công nghệ</a>
                      <span class="hover-dash"></span>
                  </li>


                  <li>
                      <a href="{{url('/catergories')}}">Sức khỏe</a>
                      <span class="hover-dash"></span>
                  </li>

              </ul>
          </nav>
      </div>
      <div class="col-1"></div>
  </div>
  <script>
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
                  <form method="POST" action="{{url('admin/feedback/create_feedback')}}" enctype="multipart/form-data" class="form col-padding">
                  @csrf  
                  <h3 class="form__name">FEEDBACK</h3>
                      <div class="form__input box_input">
                          <i class="fas fa-heading"></i>
                          <input type="text" name="feedback_title" class="@error('feedback_title') is-invalid @enderror" value="{{ old('feedback_title') }}" id="feedback_title" placeholder=" Title..." />
                          <span  class="text-danger"><b>{{ $errors->first('feedback_title') }}</b></span>
                      </div>
                      <div class="form__input">
                          <i class="fas fa-comment-alt"></i>
                          <textarea name="feedback_content" class="@error('feedback_content') is-invalid @enderror" rows="5">{{ old('feedback_content') }}</textarea>
                          <span class="text-danger"><b>{{ $errors->first('feedback_content') }}</b></span>
                      </div>
                      @if(Auth::user() == null)
                      <br>
                      <div class="color-red">Vui lòng đăng nhập để gửi góp ý</div>
                      <br>
                      <div class="btn--hover">
                          <a href="{{ route('login') }}">
                              <div class="btn__button col-padding">Đăng Nhập</div>
                          </a>
                          <div class="btn__hover"></div>
                      </div>
                      @else
                      <div class="btn--hover col-margin--top">
                          <button type="submit" class="btn__button col-padding">Gửi</button>
                          <div class="btn__hover"></div>
                      </div>
                      @endif
                  </form>
                  <div class="text-align--center " style="margin-top: 100px;">
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
                  <form method="POST" action="{{url('admin/error/create_error')}}" enctype="multipart/form-data" class="form col-padding">
                  @csrf 
                  <h3 class="form__name">ERROR</h3>
                      <div class="form__input box_input">
                          <i class="fas fa-wave-square"></i>
                          <input type="text" name="error_url" class="@error('error_url') is-invalid @enderror" value="{{ old('error_url') }}" id="error_url" placeholder=" Error url..." />
                          <samp class="text-danger"><b>{{ $errors->first('error_url') }}</b></samp>
                        </div>
                        <div class="form__input box_input">
                        <i class="fas fa-heading"></i>
                          <input type="text" name="error_title" class="@error('error_title') is-invalid @enderror" value="{{ old('error_title') }}" id="error_title" placeholder=" Error title..." />
                          <samp class="text-danger"><b>{{ $errors->first('error_title') }}</b></samp>
                        </div>
                      <div class="form__input">
                          <i class="fas fa-comment-alt"></i>
                          <textarea name="error_content" class="@error('error_content') is-invalid @enderror" rows="5">{{ old('error_content') }}</textarea>
                          <samp class="text-danger"><b>{{ $errors->first('error_content') }}</b></samp>
                      </div>
                      @if(Auth::user() == null)
                      <br>
                      <div class="color-red" >Vui lòng đăng nhập để báo lỗi</div>
                      <br>
                      <div class="btn--hover">
                          <a href="{{ route('login') }}">
                              <div class="btn__button col-padding">Đăng Nhập</div>
                          </a>
                          <div class="btn__hover"></div>
                      </div>
                      @else
                      <div class="btn--hover col-margin--top">
                          <button type="submit" class="btn__button col-padding">Báo Lỗi</button>
                          <div class="btn__hover"></div>
                      </div>
                      @endif
                  </form>
                  <div class="text-align--center" style="margin-top: 100px;">
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