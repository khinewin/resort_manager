<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{URL::to('user_img/user1.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                <i  class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>


            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard text-purple"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="#"><i class="fa fa-music text-yellow"></i> <span>Ktv Rooms Manager</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{route('ktv.room.new')}}"><i class="fa fa-plus-circle text-green"></i> <span>Add Room</span></a></li>
                    <li ><a href="{{route('ktv.room.all')}}"><i class="fa fa-audio-description text-red"></i> <span>All Rooms</span></a></li>
                    <li ><a href="{{route('ktv.room.control')}}"><i class="fa fa-volume-control-phone text-primary"></i> <span>Rooms Control</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-database text-primary"></i> <span>Foods Manager</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('food.new')}}"><i class="fa fa-plus-circle text-yellow"></i> <span> Add Food Item</span></a></li>
                    <li><a href="{{route('food.items')}}"><i class="fa fa-list-ol text-green"></i> <span>Food Items</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-cogs text-light-blue"></i> <span>Users Manager</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.new')}}"><i class="fa fa-user-plus text-yellow"></i> <span>Add User</span></a></li>
                    <li><a href="{{route('users')}}"><i class="fa fa-users text-green"></i> <span>Users</span></a></li>
                </ul>
            </li>




            <li class="treeview">
                <a href="#"><i class="fa fa-chart-area text-green"></i> <span>Reports</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-pie-chart text-yellow"></i> <span>Restaurant</span></a></li>
                    <li><a href="{{route('reports.ktv-rooms')}}"><i class="fa fa-chart-bar text-green"></i> <span>KTV Rooms</span></a></li>
                </ul>
            </li>




            <li><a href="{{route('logout')}}"><i class="fa fa-power-off text-red"></i> <span>Sign Out</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

