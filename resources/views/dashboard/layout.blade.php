<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>CoreUI Bootstrap 4 Admin Template</title>
    <!-- Icons -->
    <link href="{{ asset('dashboardAssets/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboardAssets/css/font-awesome.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
    <!-- Main styles for this application -->
    <link href="{{ asset('dashboardAssets/dest/style.css') }}" rel="stylesheet">
</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar">
        <div class="container-fluid ">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#"></a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>
            </ul>

            <ul class="nav navbar-nav pull-left ">
                <li class="nav-item">
                    <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span
                            class="tag tag-pill tag-danger">5</span></a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="#"><i class="icon-list"></i></a> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="img/avatars/6.jpg" class="img-avatar" alt="{{auth()->user()->name}}">
                        <span class="hidden-md-down">{{auth()->user()->role}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong>تنظیمات</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> پروفایل</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> تنظیمات</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>
                        <div class="divider"></div>
                        <div class="col-md-8">

                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('تسجيل خروج') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        {{-- <input type="submit" class="dropdown-item" value="logout"> --}}
                    </div>
                </li>


            </ul>
        </div>
    </header>


    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> لوحة التحكم <span
                            class="tag tag-info">جدید</span></a>
                </li>


                <li class="nav-item">

                    <a class="nav-link" href="{{route('all-posts')}}"><i class="icon-people"></i> المقالات </a>
                    @if (auth()->user()->role == 'auther')

                    <a class="nav-link" href="{{route('index')}}"><i class="icon-people"></i> اضافة مقال </a>
                    @endif
                    @if (auth()->user()->role == 'admin')
                    <a class="nav-link" ><i class="icon-user-follow"></i> المديرين </a>

                    <a class="nav-link" href="#"><i class="icon-user-following"></i> التعليقات </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-docs"></i> التصنيفات</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-people"></i> الاعدادات</a>

                    {{-- <a class="nav-link" href="#"><i class="icon-docs"></i>  فایل ها</a> --}}
                </li>
                    @endif



            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <main class="main" style='background:#fff; height:100%;'>

       @yield('content')

    </main>



    <footer class="footer">
        <span class="text-left">
            <a href="http://coreui.io">CoreUI</a> &copy; 2016 creativeLabs.
        </span>
        <span class="pull-right">
            Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
    </footer>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('dashboardAssets/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboardAssets/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('dashboardAssets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboardAssets/js/libs/pace.min.js') }}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('dashboardAssets/js/libs/Chart.min.js') }}"></script>

    <!-- CoreUI main scripts -->
    <script src="{{ asset('dashboardAssets/js/app.js') }}"></script>


    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="{{ asset('dashboardAssets/js/views/main.js') }}"></script>

    <!-- Grunt watch plugin -->
    <script src="//localhost:35729/livereload.js"></script>
    {{-- ckeditor  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>


    @yield('javascripts')
</body>

</html>
