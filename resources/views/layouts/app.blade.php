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
                <div class="navbar-header">

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                 <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>   

                 <div class="collapse navbar-collapse" id="collapsibleNavbar">
                   
                    <ul class="navbar-nav ml-auto">
                        @if (Auth::guest())

                        <li class="nav-item {{ $title == 'Login' ? 'active' : '' }}">
                            <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="fas fa-user-plus"></i> สม้ครสมาชิก</a>
                        </li>
                        @else

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                                        ออกจากระบบ</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form> 
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>


<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="/js/amphur.js"></script>
<script src="/assets/jquery/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script></body>
</html>
