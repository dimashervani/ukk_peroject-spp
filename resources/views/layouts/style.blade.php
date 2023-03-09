<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">

    <title>Spp</title>
    <!-- Style -->
    <link href="/css/style.css" rel="stylesheet">
    <script src="{{asset('assets/popper.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/select2.min.css')}}">
    <script src="{{asset('assets/select2.min.js')}}"></script>

    {{-- datatables --}}
    <script src="/datatables/jquery.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href=/datatables/jquery.datatables.min.css rel="stylesheet">
    <script src="/datatables/jquery.dataTables.min.js"></script>
    
    <!-- Fonts -->
    
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>

<body class="skin-default-dark fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading...</p>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <nav class="navbar navbar-darknavbar-expand-sm">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar-list-4">
                          <ul class="navbar-nav">
                              <li class="nav-item dropdown">
                                  
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/assets/images/logo-icon.png" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                            
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                </div>
                            </li>   
                        </ul>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                            </a>
                            
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        @endguest
                      </nav>
                </div>
                <div class="navbar-collapse">
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span><img src="/assets/images/logo-icon.png" alt="elegant admin template"></span>
            </div>
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{ route('pembayaran.index') }}" aria-expanded="false"><i
                                    class="fa fa-money"></i><span class="hide-menu">Pembayaran</span></a></li>
                        @if (Auth::user()->name == 'Admin')
                        <li> <a class="waves-effect waves-dark" href="{{ route('kelas.index') }}" aria-expanded="false"><i
                                    class="fa fa-address-card"></i><span class="hide-menu"></span>Kelas</a></li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('siswa.index') }}" aria-expanded="false"><i
                                    class="fa fa-users"></i><span class="hide-menu"></span>Siswa</a></li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('spp.index') }}" aria-expanded="false"><i
                                    class="fa fa-book       "></i><span class="hide-menu"></span>SPP</a></li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('petugas.index') }}" aria-expanded="false"><i
                                    class="fa fa-address-card"></i><span class="hide-menu"></span>Petugas</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        {{-- <footer class="footer">
            © 2020 Elegent Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer> --}}
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <script src="/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <!--stickey kit -->
    <script src="/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/js/custom.min.js"></script>
</body>

</html>