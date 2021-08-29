<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('temp/assets/img/apple-icon') }}.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      PresensiQ | Login
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
        body, input {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            display: table;
            max-width: 100%;
            min-height: 100vh;
            margin: 0 auto;
            position: relative;
            background-color: #fff;
            overflow: hidden;
            /*background-color: #fd7e1480;*/
            background-image: url('{{ asset('temp/assets/img/bg6.jpg')  }}');
        }

        .vertical-align {
            display: table-cell;
            vertical-align: middle;
            width: 100%;
        }

        .justify-content {
            margin: auto;
        }

        /*.container:before {
            content: ''; 
            position: absolute; 
            width: 2000px; 
            height: 2000px; 
            border-radius: 50%; 
            background: linear-gradient(-45deg, #f96332, #fb6a3a);
            top: -10%; 
            right: 48%; 
            transform: translateY(-50%);
        }

        .forms-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0%;
            left: 0%;
        }*/

        .card {
            border-radius: 10px;
            margin: 0px;
        }

        .card-body {
            padding: 0px 15px 0px 15px!important;
            min-height: 40vh;
        }

        .card-left {
            padding: 1.25rem;
            margin: 0;
            min-height: 60vh;
        }

        .card-right {
            background-color: #fd7e14;
            border-radius: 0px 10px 10px 0px;
            margin: 0px;
            padding: 2.2rem;
            min-height: 60vh;
        }

        .card .image {
            overflow: hidden;
            height: 150px;
            position: relative;

        }

        .card .card-body .icon {
            height: 25px;
            justify-content: center;
            display: flex;
            width: 100%;
            min-height: 50px;
        }

        .card .card-body .icon i {
            color:  #f96332;
            display: flex;
            margin: 25px;
        }

        .card .card-body .icon p {
            font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
            font-weight: 700;
        }

        .login {
            position: absolute;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            width: 50%;
            display: grid;
            grid-template-columns: 1fr;
            z-index: 10;
        }

        form {
            padding: 1.2rem;
            margin: auto;
            display: inline-flex;
            justify-content: center;
            flex-direction: column;
            overflow: hidden;
            vertical-align: middle;
            height: 100%;
            width: 100%;
        }

        form .col-md-12 .btn {
            margin: auto;
            margin-top: auto;
            width: 100%;
            text-align: center;
            justify-content: center;
            display: flex;
            margin-top: 25px;
            width: 125px;
        }

        /*
        .title {
            font-size: 2.2rem;
            color: #444;
            margin-bottom: 10px;
        }

        .input-field {
            position: absolute;
            max-width: 380px;
            width: 100%;
            height: 55px;
            background-color: #f0f0f0;
            margin:  10px 0;
            border-radius: 55px;
            display: grid;
            grid-template-columns: 15% 85%;
            padding: 0 .4rem;
        }

        .input-field i{
            text-align: center;
            line-height: 55px;
            color: #acacac;
            font-size: 1.1rem;
        }

        .input-field input {
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
            pointer-events: none;
        }

        .input-field input:placeholder {
            color: #aaa;
            font-weight: 500;
        }

        .btn {
            width: 150px;
            height: 49px;
            border: none;
            outline: none;
            border-radius: 49px;
            cursor: pointer;
            background-color: #f96332;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px 0px;
            transition: .5s;
        }

        .btn:hover {
            background-color: #fd7ee;
        }

        .panels-container {
            position: relative;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            z-index: 1;
        }

        .panel {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-around;
            text-align: center;
        }

        .left-panel {
            padding: 3rem 17% 2rem 12%;
        }

        .panel .content {
            color: #fff;
        }

        .panel h3 {
            font-weight: 600;
            line-weight: 1;
            font-size: 1.5rem;
        }

        .panel p {
            font-size: 0.95rem;
            padding: 0.7rem 0;
        }

        .image {
            width: 100%;
        }

        .footer {
            z-index: 12;
        }

        @media (max-width: 870px) {
            .container {
                min-height: 800px;
                height: 100vh;
            }

            .container:before {
                width: 1500px;
                height: 1500px;
                left: 30%;
                bottom: 68%;
                transform: translateX(-50%);
                right: initial;
                top: initial;
            }

            .login {
                width: 100%;
                left: 50%;
                top: 85%;
                transform: translate(-50%, -100%);

            }

            .panels-container {
                z-index: 10;
                grid-template-columns: 1fr;
                grid-template-rows: 1fr 2fr;
            }

            .panel {
                flex-direction: row;
                justify-content: space-around;
                align-items: center;
                padding: 2.5rem 8%;
            }

            .panel .content {
                padding-right: 15%;
            }

            .panel h3 {
                font-size: 1.2rem;
            }

            .panel p {
                font-size: 0.7rem;
                padding: 0.5rem 0;
            }

            .image {
                width: 200px;

            }

            .left-panel {
                grid-row: 1 / 2;
            }

            .footer {
                width: 100%;
                height: 20px;
            }
        }

        @media (max-width: 570px) {
            form {
                padding: 0 1.5rem;
            }

            .image {
                display: none;
            }

            .panel .content {
                padding: 0.5rem 1rem;
            }

            .container:before {
                bottom: 72%;
                left: 50%;

            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row vertical-align">
            <div class="col-md-4 justify-content">
                <div class="card">
                    <div class="card-body row">
                        <div class="icon">
                            <i class="fa fa-user fa-2x">  <p style="margin:auto; margin-left: 10px;">Login</p></i>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <div class="row vertical-align">
            <div class="col-md-8 justify-content">
                <div class="card">
                    <div class="card-body row">
                        <div class="card-left col-md-6">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-right col-md-6">
                            <img src="{{ asset('temp/assets/img/bg2.svg') }}" class="image" alt="">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div> -->

    <!-- <div class="container">
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Selamat Datang di PresensiQ!</h3>
                    <p>PresensiQ Membantu Serangkaian Kegiatan Presensi Menjadi Lebih Mudah. Akses ke Seluruh Database Dan Penggunaan yang Simple dan Tidak Ribet!</p>
                </div>

                <img src="{{ asset('temp/assets/img/bg2.svg') }}" class="image" alt="">
            </div>
        </div>

        <div class="forms-container">
            <div class="login">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                  </script>, Designed by <a href="https://www.instagram.com/dawwas_inha/" target="_blank">ini was</a>. Coded by <a href="#" target="_blank">Attendance Web</a>.
                </div>
              </div>
            </footer>
    </div> -->

    <!-- <div id="app">
        <main class="py-4">
            <div class="wrapper">
                <div class="row justify-content-center right-panel" style="margin: 0px !important;">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header" style="border-bottom: 1px #e3e3e3 solid; padding: 15px;">{{ __('Login') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </main>
    </div> -->
    <!-- jQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js" integrity="sha512-Yk47FuYNtuINE1w+t/KT4BQ7JaycTCcrvlSvdK/jry6Kcxqg5vN7/svVWCxZykVzzJHaxXk5T9jnFemZHSYgnw==" crossorigin="anonymous"></script>
    <!--   Core JS Files   -->
    <script src="{{ asset('temp/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('temp/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('temp/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('temp/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('temp/assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('temp/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('temp/assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('temp/assets/demo/demo.js') }}"></script>
</body>

</html>
