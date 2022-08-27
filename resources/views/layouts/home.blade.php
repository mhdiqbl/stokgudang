<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>STOK GUDANG</title>

    @include('partials._style')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="text-center">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{ url('/') }}" class="site_title"><img src="{{ asset('image/home.png') }}"
                                    width="50">
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <h2>STOK</h2>
                        <h6>GUDANG</h6>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">

                        </div>
                        <div class="profile_info mt-4">
                            <span>Welcome,</span>

                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section clearfix">
                            @include('partials._sidebar')
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            @include('partials._navbar')
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            @include('partials._footer')
            <!-- /footer content -->
        </div>
    </div>
    @include('partials._script')
</body>

</html>
