<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini navbarHeader"><b>RM</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg navbarHeader"> Resort Manager</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>

                </li>

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-area-chart"></i> Reports
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <!-- Menu toggle button -->
                                    <a class="text-warning" href="{{route('reports.ktv-rooms')}}">
                                        <i class="fa fa-bar-chart"></i> Restaurant
                                    </a>

                                </li>
                                <li>
                                    <!-- Menu toggle button -->
                                    <a class="text-primary" href="{{route('reports.ktv-rooms')}}">
                                        <i class="fa fa-chart-area"></i> KTV Rooms
                                    </a>

                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>


                <!-- /.messages-menu -->



                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{URL::to('user_img/user1.png')}}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{URL::to('user_img/user1.png')}}" class="img-circle" alt="User Image">
                            <p>
                                Role : {{Auth::user()->roles()->pluck('name')->implode(' ')}}
                                <small>Member Since : {{Auth::user()->created_at->diffForHumans()}}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!--  <li class="user-body">
                        <div class="row">
                               <div class="col-xs-4 text-center">
                                   <a href="#">Followers</a>
                               </div>
                               <div class="col-xs-4 text-center">
                                   <a href="#">Sales</a>
                               </div>
                               <div class="col-xs-4 text-center">
                                   <a href="#">Friends</a>
                               </div>
                           </div>
                            <!-- /.row -->
                       <!-- </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('profile')}}" class="btn btn-default btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('logout')}}" class="btn btn-danger btn-flat"><i class="fa fa-power-off text-white"></i></a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="{{route('config')}}"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>