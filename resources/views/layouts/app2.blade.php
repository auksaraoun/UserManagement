<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">


                <a class="navbar-brand" href="/user">ระบบจัดการสมาชิก</a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ $menu == 'user' ? 'active' : '' }} ">
                            <a class="nav-link" href="/user"><i class="fas fa-users"></i> จัดการสมาขิก</a>
                        </li>
                        <li class="nav-item {{ $menu == 'province' ? 'active' : '' }}">
                            <a class="nav-link" href="/province"><i class="fas fa-tasks"></i> จัดการจังหวัด</a>
                        </li>
                         <li class="nav-item {{ $menu == 'amphur' ? 'active' : '' }}">
                            <a class="nav-link" href="/amphur"><i class="fas fa-thumbtack"></i> จัดกาอำเภอ</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <i class="fas fa-user"></i> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('contents')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/amphur.js"></script>
    <script src="/assets/jquery/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
