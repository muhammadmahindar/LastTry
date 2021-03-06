<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Meta Author-->
    <meta name="author" content="Muhammad Mahin Dar">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App Title -->
    <title>@yield('title') | CPMS </title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CPMS') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Bootstrap 3.3.7 -->
    <link href="{{ asset('css/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('css/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <!--Toast -->
    <link href="{{ asset('css/bower_components/toast/jquery.toast.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link href="{{ asset('css/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('css/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('cssarea')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
      .btn-primary-outline {
  background-color: transparent;
  border-color: #ccc;
}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <script>
 var chatDiv = document.createElement('div');
 chatDiv.className = 'fb-customerchat';
 chatDiv.setAttribute('page_id', '204334060167088');
 document.body.appendChild(chatDiv);
  window.fbAsyncInit = function() {
   FB.init({
   appId            : '850652791742367',
   autoLogAppEvents : true,
   xfbml            : true,
   version          : 'v3.2'
  });
}; 
 (function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Petro</b>Chemical</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">



          <li>
              <a href="javascript:void(0);" class=" right-menu-item" onclick="go_full_screen()">
                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
              </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          @if(Auth::check())
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset( Auth::user()->avatar)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset( Auth::user()->avatar)}}" class="img-circle" alt="User Image">

                <p>
                  
                  {{Auth::user()->name}}
                  <small>Member since {{Auth::user()->created_at->format('d-m-Y')}}</small>
                  
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('Profile.show',Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          @can('Read-GatePass')
                <li class="treeview">
          <a href="">
            <i class="fa fa-dashboard"></i> <span>Gate Pass</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL('GatePass')}}"><i class="fa fa-circle-o"></i>Gate Passes</a></li>           
          </ul>
        </li>
        @endcan
        <li class="header">Company Management Area</li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-building"></i> <span>Company Mangement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('Read-Company')
            <li><a href="{{URL('Company')}}"><i class="fa fa-circle-o"></i>Companies</a></li>
            @endcan
            @can('Read-Branch')
            <li><a href="{{URL('Branch')}}"><i class="fa fa-circle-o"></i>Branches</a></li>
            @endcan
            @can('Read-Department')
            <li><a href="{{URL('Department')}}"><i class="fa fa-circle-o"></i>Departments</a></li>            
          @endcan
          </ul>
        </li>
        <li class="header">User Management Area</li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-users"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('Read-User')
            <li><a href="{{URL('Users')}}"><i class="fa fa-user-plus"></i>Users</a></li>
            @endcan
            @can('Read-Role')
            <li><a href="{{URL('Role')}}"><i class="fa fa-circle-o"></i>Role</a></li>
            @endcan        
          </ul>
        </li>


        <li class="header">Production Area</li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-industry"></i> <span>Production</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                        <li class="treeview">
          <a href="">
            <i class="fa fa-circle-o"></i> <span>Costing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('Read-SemiFixed')
            <li><a href="{{URL('SemiFixed')}}"><i class="fa fa-circle-o"></i>SemiFixed</a></li>
            @endcan
            @can('Read-FactoryOverhead')
            <li><a href="{{URL('FactoryOverhead')}}"><i class="fa fa-circle-o "></i>Factory Overhead</a></li>
            @endcan
          </ul>
        </li> 
        @can('Read-Material')  
            <li><a href="{{URL('Material')}}"><i class="fa fa-circle-o"></i>Materials</a></li>
            @endcan
            @can('Read-Product')
            <li><a href="{{URL('Product')}}"><i class="fa fa-circle-o"></i>Product</a></li>
            @endcan
            @can('Read-Production')
            <li class="treeview">
          <a href="">
            <i class="fa fa-circle-o"></i> <span>Production</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('Read-Production')
            <li><a href="{{URL('Production')}}"><i class="fa fa-circle-o"></i>Productions</a></li>
            @endcan
            @can('Update-DailyProduction')
            <li><a href="{{URL('DailyProduction')}}"><i class="fa fa-circle-o"></i>Daily Production</a></li>
            @endcan
            @can('Approve-Production')
            <li><a href="{{URL('/Pending/Productions')}}"><i class="fa fa-circle-o "></i>Pending Production</a></li>
            @endcan
            @can('Complete-Production')
             <li><a href="{{URL('/Approved/Productions')}}"><i class="fa fa-circle-o"></i>Approved Production</a></li>
             @endcan
             <li><a href="{{URL('/Completed/Productions')}}"><i class="fa fa-circle-o"></i>Completed Production</a></li>
          </ul>
        </li>
        @endcan          
          </ul>
        </li>
        <li class="header">Reports</li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-building"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('Daily-ProductionReport')
            <li><a href="{{URL('Reports')}}"><i class="fa fa-circle-o"></i>Daily Product Production</a></li>
            @endcan
            @can('Monthly-ProductionReport')
            <li><a href="{{URL('Reports/MonthlyReport')}}"><i class="fa fa-circle-o"></i>Monthly Product Production</a></li>
            @endcan
          </ul>
        </li>        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Content Header (Page header) -->
    <section class="content-header no-print">
      <h1>
        @yield('BigHeading')
        <small>@yield('SmallHeading')</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       @yield('FullPage')
      <!-- Default box -->
      <div class="box ">
        <div class="box-header with-border no-print">
          <h3 class="box-title">@yield('pagetitle')</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          @yield('dynamiccontent')
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-print">
          @yield('footer')
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer no-print">

    <strong>Copyright &copy; 2018-2019 <a>Petrochemical international</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
 <script src="{{ asset('css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('css/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('css/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!--Toast -->
<script src="{{ asset('js/toast/jquery.toast.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('css/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('css/dist/js/demo.js') }}"></script>


<script type="text/javascript">
  function go_full_screen(){
  var elem = document.documentElement;
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.msRequestFullscreen) {
    elem.msRequestFullscreen();
  } else if (elem.mozRequestFullScreen) {
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) {
    elem.webkitRequestFullscreen();
  }
}
</script>
  @if(Session::has('notice'))
            <script type="text/javascript">
                $(document).ready(function () {
                    $.toast({
                        heading: 'Success'
                        , text: '{{ Session::get("notice") }}'
                        , position: 'top-right'
                        , loaderBg: '#ff6849'
                        , icon: 'success'
                        , hideAfter: 9500
                        , stack: 6
                    })
                });
            </script>

        @endif

        @if(Session::has('alert'))
            <script type="text/javascript">
                $(document).ready(function () {
                    $.toast({
                        heading: 'Error'
                        , text: '{{ Session::get("alert") }}'
                        , position: 'top-right'
                        , loaderBg: '#ff6849'
                        , icon: 'danger'
                        , hideAfter: 9500
                        , stack: 6
                    })
                });
            </script>

        @endif
@yield('scriptarea')
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
