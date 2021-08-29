<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('temp/assets/img/apple-icon') }}.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      PresensiQ | @yield('title')
    </title>
    <!-- link khusus -->
    @yield('link')
    <!-- link khusus -->

    <link rel="shortcut icon" href="{{ asset('temp/assets/img/presensiQ.png') }}">
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
    <div class="wrapper ">
      <div id="sidebar" class="sidebar" data-color="orange">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
          <a href="#" class="simple-text logo-mini">
            <img src="{{ asset('temp/assets/img/presensiQ_putih.png') }}" style="width: 30px;">
          </a>
          <a href="#" class="simple-text logo-normal">
            Web PresensiQ
          </a>
        </div>
        <div id="sidebar">
          <div class="sidebar-wrapper" id="sidebar-wrapper">
              @yield('sidebar-nav')
          </div>
        </div>
      </div>
      <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-transparent  bg-primary  navbar-absolute">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item dropdown"><a class="navbar-brand" href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"></a></li>
              <li class="nav-item dropdown"><a class="navbar-brand" href="#">@yield('title')</a></li>
            </ul>
          </div>
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>
                      <span class="d-lg-none d-md-block"></span> @yield('username')
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    @guest
                      @if (Route::has('register'))
                      @endif
                      @else
                    <a class="dropdown-item" href="{{ route('guru-profile') }}">Profile</a>
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
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm"></div>
        <div class="content" style="min-height: 79vh;">
          @yield('content')
        </div>
        <footer class="footer">
          <div class=" container-fluid ">
            <!-- <nav>
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
            </nav> -->
            <div class="copyright" id="copyright">
              &copy; <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
              </script>, Designed by <i class="fas fa-heart"></i>. Coded by <a href="https://www.instagram.com/dawwas_inha/" target="_blank">ini was</a>.
            </div>
          </div>
        </footer>
      </div>
    </div>
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