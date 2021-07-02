@extends('package-intership::layout')
@section('content')
    <body id="page-top">
        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <!--NAVBAR-->
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3"
                                id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                            <a class="nav-link" href="{{ route('diaries') }}"><span
                                    class="d-none d-lg-inline mr-2 text-gray-600">Interships</span></a>
                            <ul class="navbar-nav flex-nowrap ml-auto">
                                <div class="d-none d-sm-block topbar-divider"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            aria-expanded="false" data-toggle="dropdown" href="#"><span
                                                class="d-none d-lg-inline mr-2 text-gray-600 small">{{session()->get('user_detail')->user_name}}</span><img
                                                class="border rounded-circle img-profile" src="/avatars/avatar1.jpeg"></a>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                            <a class="dropdown-item" href="{{ route('profile') }}"><i
                                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                href="{{route('logout')}}"><i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--/NAVBAR-->
                </div>
                @yield('content-dashboard')
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Cansa-team 2021</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </body>
@endsection
