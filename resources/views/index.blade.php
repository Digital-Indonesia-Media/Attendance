<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('temp/assets/img/apple-icon') }}.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      Presently
    </title>
    <!-- link khusus -->
    @yield('link')
    <!-- link khusus -->

    <link rel="shortcut icon" href="{{ asset('temp/assets/img/calendar.png') }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ asset('temp/assets/css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('temp/assets/css/now-ui-dashboard.css?v=1.5.0') }} " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('temp/assets/demo/demo.css') }} " rel="stylesheet" />
    <!-- JQUERY -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <style type="text/css">
      .center {
        text-align: center;
      }
      .margin {
        margin-top: 5px;
      }
    </style>
</head>

<body class="">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: linear-gradient(90deg,#0c2646 0,#204065 60%,#2a5788)!important; margin: 0px;">
          <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}" style="color: #ffffff!important;">
                  Attendance
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">

                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                              <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i style="color: #ffffff!important;" class="now-ui-icons users_circle-08"></i>
                                    <p style="color: #ffffff!important;">
                                      <span class="d-lg-none d-md-block"></span> {{ auth::user()->name }}
                                    </p>
                                  </a>
                                  <div style="color: #ffffff!important;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    @guest
                                      @if (Route::has('register'))
                                      @endif
                                      @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                      Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endguest
                                  </div>
                                </li>
                              </ul>
                            </div>
                                <!-- <a href="{{ url('/login') }}"></a> -->
                            @else
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: #ffffff!important;">{{ __('Login') }}</a>
                                </li>
                            @endauth
                        </div>
                    @endif
                  </ul>
              </div>
          </div>
  </nav>
        <!-- End Navbar -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="content" style="min-height: 79vh;">
          <section>
            <div class="row" style="margin: auto;" style="padding: 50px 0px;">
              <div class="col-md-7" style="padding: 45px 0px; ">
                <h1 style="font-weight: 600;">PRESENTLY IS PRESENT NOW!</h1>
                <h4>Easier way to present on Online Learning.</h4>
                <a href="{{ route('login') }}">
                  <button class="btn btn-primary form-control">Start Now</button>
                </a>
              </div>
              <div class="col-md-5"><img src="{{ asset('temp/assets/img/online_class2.jpg') }}"></div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
 
  <footer class="footer">
    <div class=" container-fluid ">
      <nav>
        <ul>
          <li>
            <a href="#">Attendance Web</a>
          </li>
          <li>
            <a href="#">About Us</a>
          </li>
          <li>
            <a href="#">Blog</a>
          </li>
        </ul>
      </nav>
      <div class="copyright" id="copyright">
        &copy; <script>
          document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
        </script>, Designed by <a href="https://www.instagram.com/dawwas_inha/" target="_blank">ini was</a>. Coded by <a href="#" target="_blank">Digital Entrepreneurship</a>.
      </div>
    </div>
  </footer>
    <!-- UNTUK JS KHUSUS -->
    @yield('js')
    <!-- jQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js" integrity="sha512-Yk47FuYNtuINE1w+t/KT4BQ7JaycTCcrvlSvdK/jry6Kcxqg5vN7/svVWCxZykVzzJHaxXk5T9jnFemZHSYgnw==" crossorigin="anonymous"></script>
    <!--   Core JS Files   -->
    <script src="{{ asset('temp/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('temp/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('temp/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('temp/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chart JS -->
    <script src="{{ asset('temp/assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('temp/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('temp/assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('temp/assets/demo/demo.js') }}"></script>
</body>

</html>