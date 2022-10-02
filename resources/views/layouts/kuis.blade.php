<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Kuis MBK</title>
  <meta charset="UTF-8">
  <meta name="description" content="Game Warrior Template">
  <meta name="keywords" content="warrior, game, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="{{ asset('logo.png') }}" rel="shortcut icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('assetshomeuser/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assetshomeuser/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assetshomeuser/css/owl.carousel.css')}}" />
  <link rel="stylesheet" href="{{asset('assetshomeuser/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('assetshomeuser/css/animate.css')}}" />

</head>

<body>

  <!-- Page Preloder -->


  <!-- Header section -->
  <header class="header-section">
    <div class="container">
      <!-- logo -->
      <a class="site-logo" href="{{url('userkuis')}}">
        <h3 style="color: white;">KUYIZ</h3>
      </a>
      <!-- responsive -->
      <div class="nav-switch">
        <i class="fa fa-bars"></i>
      </div>
      <!-- site menu -->

      <nav class="main-menu">
        <ul>
          <li><a href="{{url('userkuis')}}">Home</a></li>
          <li><a href="{{url('kuis')}}">Kuis</a></li>
          <li><a href="{{url('tukar-hadiah')}}"> Tukar Hadiah</a></li>
          <li style="color: white;">
          @foreach($saldo as $index => $item)
          <a style="text-color:white;">POIN {{$item->c_saldo}}</a>
          @endforeach
          </li>
          <li>
            <a href='login' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{Auth::user()->name}}  <i class="fa fa-power-off" aria-hidden="true"> Logout</i>
            </a>
            <form id="logout-form" action="{{ ('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- Header section end -->


  <!-- Hero section -->
  @yield('content')
  <!-- Hero section end -->


  <!-- Latest news section -->
  <div class="latest-news-section">
    <div class="ln-title">Event</div>
    <div class="news-ticker">
      <div class="news-ticker-contant">
        <div class="nt-item"><span class="new">Ayo !</span>Ikuti Kuis </div>
        <div class="nt-item"><span class="strategy">Jangan Lupa !</span>Kumpulkan Poinnya </div>
        <div class="nt-item"><span class="racing">Yey! </span> Dapatkan Hadiah Menarik </div>
      </div>
    </div>
  </div>
  <!-- Latest news section end -->

  <!-- Footer section -->
  <footer class="footer-section">
    <div class="container">

      <p class="copyright">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>
          document.write(new Date().getFullYear());
        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Mahasiswa Politeknik Negeri Malang</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
  </footer>
  <!-- Footer section end -->


  <!--====== Javascripts & Jquery ======-->
  <script src="{{asset('assetshomeuser/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('assetshomeuser/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assetshomeuser/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assetshomeuser/js/jquery.marquee.min.js')}}"></script>
  <script src="{{asset('assetshomeuser/js/main.js')}}"></script>
</body>

</html>