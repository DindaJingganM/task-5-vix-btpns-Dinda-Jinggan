@extends('layouts.pengunjunglayout')

@section('galeripengunjung')
<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
       <img src="{{asset('assetshome/images/Makam2.jpg')}}" alt="">
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
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('homepengunjung') }}">Home </span></a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="{{ route('galeripengunjung') }}">Galeri<span class="sr-only">(current)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('informasipengunjung') }}">Informasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
              </li>
            </ul>
            <div class="user_option">

              
             
              <a href="{{ route('login') }}" class="order_online">
                Kuis
              </a>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Gallery
        </h2>
      </div>

<br>
      <div class="filters-content">
        <div class="row grid">
         
          
          
        @foreach($galeri as$index => $item)
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
              
                <a href="{{asset('gamifikasi/storage/app/public/'.$item->gambar)}}" target="_blank">
                  <img src="{{asset('gamifikasi/storage/app/public/'.$item->gambar)}}" alt="" style="width:100%; height: 300px">

                </a>
                
                <div class="detail-box">
                  <h5>
                    {{$item->judul}}
                  </h5>
                  <p>
                  {{$item->Keterangan}}
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
         
          
        </div>
      </div>

    </div>
  </section>

  <!-- end food section -->

  
@endsection