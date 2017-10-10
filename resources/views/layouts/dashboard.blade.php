@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">SMS Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown-alerts -->
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{URL::to('images/profile/admin').'/'. Auth::user()->profile}}" style="width: 30px" class="profile-image img-circle">&nbsp;&nbsp;{{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                    <!--<li><a href="{{ url ('admin/myaccount').'/'. Auth::user()->id}}"><i class="fa fa-user fa-fw"></i> My account</a>
                        </li> -->
                        <li><a href="{{ url ('admin/reset_password') }}"><i class="fa fa-lock fa-fw"></i> Change password</a>
                        </li><li class="divider"></li>
                        <li><a href="{{ url ('/logout') }}"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-top: 60px">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li >
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Admin Dashboard<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin') }}">Dashboard</a>
                                </li>
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/hod') }}">HODs</a>
                                </li>
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff') }}">Staffs</a>
                                </li>

                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/student') }}">Students</a>
                                </li>
                            </ul>
                        </li>
                    <!--<li >
                            <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Staff Dashboard<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/attendance/search') }}">Attendance</a>
                                </li>
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/mark/search') }}">Mark List</a>
                                </li>
                            <!--  <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url('') }}">Reports</a>
                                </li>
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('') }}">Register</a>
                                </li>
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('') }}">Time Table</a>
                                </li>
                            </ul>
                             /.nav-second-level
                        </li>-->
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('/event/') }}"><i class="fa fa-calendar fa-fw"></i> Events</a>
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-book fa-fw"></i> Courses <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/course/department') }}">Department</a>
                                </li>
                                <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/course/subject' ) }}">Subjects</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <!-- <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}"><i class="fa fa-users fa-fw"></i> Students</a>
                        </li>-->

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

