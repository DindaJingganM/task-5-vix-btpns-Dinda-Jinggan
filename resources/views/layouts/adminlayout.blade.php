<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('logo.png') }}" />

  <title>Makam Bung Karno </title>

  <!-- Bootstrap -->
  <link href="{{asset('assetsadmin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('assetsadmin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{asset('assetsadmin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{asset('assetsadmin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="{{asset('assetsadmin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{asset('assetsadmin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="{{asset('assetsadmin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{asset('assetsadmin/build/css/custom.min.css')}}" rel="stylesheet">
  <!--Toastr-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><i class="fa fa-user"></i> <span>MBK</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{{asset('logo.png')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{Auth::user()->name}}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                @can('manage-admin')
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('admin')}}">Dashboard</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Kelola Konten <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('informasi')}}"> Kelola Informasi</a></li>
                    <li><a href="{{url('galeri')}}"> Kelola Galeri</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Kelola Kuis <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{url('sponsor')}}"> Kelola Sponsor</a></li>
                    <li><a href="{{url('event')}}"> Kelola Event</a></li>
                    <li><a href="{{url('soal')}}"> Kelola Soal</a></li>
                    <li><a href="{{url('result')}}"> Result</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-money"></i> Reward <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{url('hadiah')}}"> Kelola Hadiah</a></li>
                    <li><a href="{{url('validasi_hadiah')}}"> Validasi Hadiah</a></li>
                  </ul>
                </li>
                <li><a href="{{url('bukukunjungan')}}"><i class="fa fa-file-text"></i> Kelola Buku Kunjungan</a></li>
                <li><a href="{{url('komentar')}}"><i class="fa fa-comments"></i> Kelola Komentar</a></li>
                @endcan
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{asset('logo.png')}}" alt="">{{Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href='login' onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    <i class="fa fa-sign-out pull-right"></i></a>
                  <form id="logout-form" action="{{ ('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->

      <div class="right_col" role="main">
        <!-- top tiles -->

        @yield('content')
      </div>
      <br />

    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer style="background: #2a3f54">
      <div class="pull-right">
        Makam Bung Karno - Admin Template by <a href="https://www.educastudio.com/category/marbel-edu-games">Mahasiswa Politeknik Negeri Malang</a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
  </div>
  </div>

  <!-- jQuery -->
  <script src="{{asset('assetsadmin/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('assetsadmin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('assetsadmin/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset('assetsadmin/vendors/nprogress/nprogress.js')}}"></script>
  <!-- Chart.js -->
  <script src="{{asset('assetsadmin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
  <!-- gauge.js -->
  <script src="{{asset('assetsadmin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{asset('assetsadmin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('assetsadmin/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Skycons -->
  <script src="{{asset('assetsadmin/vendors/skycons/skycons.js')}}"></script>
  <!-- Flot -->
  <script src="{{asset('assetsadmin/vendors/Flot/jquery.flot.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/Flot/jquery.flot.time.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/Flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/Flot/jquery.flot.resize.js')}}"></script>
  <!-- Flot plugins -->
  <script src="{{asset('assetsadmin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
  <!-- DateJS -->
  <script src="{{asset('assetsadmin/vendors/DateJS/build/date.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('assetsadmin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{asset('assetsadmin/vendors/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('assetsadmin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{asset('assetsadmin/build/js/custom.min.js')}}"></script>
  <!-- Toastr-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>