@extends('layouts.pengunjunglayout')

@section('homepengunjung')
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('assetshome/contact/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('assetshome/contact/css/style.css')}}">

<div class="hero_area">
    <div class="bg-box">
       <img src="{{asset('assetshome/images/Makam2.jpg')}}" alt="" >

    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="">
            <span>
              Makam Bung Karno
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('homepengunjung') }}">Home </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('galeripengunjung') }}">Galeri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('informasipengunjung') }}">Informasi</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('kontak') }}">Kontak <span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <div class="user_option">
              
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                
                </button>
              </form>
              
              <a class="order_online" href="{{ route('login') }}">Kuis</a>
            
              
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-8">
          <div class="form h-100">
            <h3>Komentar</h3>
            <form class="mb-5" method="post" action="{{url('kontak')}}" enctype="multipart/form-data" id="contactForm" name="contactForm">
            @csrf  
            <div class="row">
                <div class="col-md-6 form-group mb-5">
                <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required="required">
                </div>
               
              </div>

              
              <div class="row">
                <div class="col-md-12 form-group mb-5">
                <label>Komentar</label>
                        <textarea name="komen" required="required" class="form-control h-150px" rows="6" id="komen"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" value="Send" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>

            <div id="form-message-warning mt-4"></div> 
            <div id="form-message-success">
              Your comment was sent, thank you!
            </div>

          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-info h-100">
            <h3>Contact Information</h3>
            <p class="mb-5">Anda Dapat Menghubungi Kontak dibawah ini !</p>
            <ul class="list-unstyled">
              <li class="d-flex">
                <span class="wrap-icon icon-room mr-3"></span>
                <span class="text"> Jl. Ir. Soekarno No.152, Bendogerit, Kec. Sananwetan, Kota Blitar, Jawa Timur 66133</span>
              </li>
              <li class="d-flex">
                <span class="wrap-icon icon-phone mr-3"></span>
                <span class="text">Call (0342) 801145</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
    <!-- end slider section -->
  </div>

</div>
      
    </div>
  </section>

  <script src="{{asset('assetshome/contact/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assetshome/contact/js/popper.min.js')}}"></script>
    <script src="{{asset('assetshome/contact/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assetshome/contact/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assetshome/contact/js/main.js')}}"></script>
@endsection