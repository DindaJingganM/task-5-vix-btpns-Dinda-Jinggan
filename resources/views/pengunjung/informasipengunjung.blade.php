@extends('layouts.pengunjunglayout')
@section('informasipengunjung')
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
              <li class="nav-item">
                <a class="nav-link" href="{{ route('homepengunjung') }}">Home </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('galeripengunjung') }}">Galeri</a>
              </li>
              <li class="nav-item  active">
                <a class="nav-link" href="{{ route('informasipengunjung') }}">Informasi<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
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
    
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{asset('assetshome/images/Makam2.jpg')}}" alt="" style="box-shadow: 0 0 90px #000;">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Makam Bung Karno
              </h2>
            </div>
            <p>
            Makam Soekarno atau biasa disebut Makam Bung Karno disingkat MBK adalah kompleks pemakaman presiden pertama Republik Indonesia, Soekarno, yang didesain dengan arsitektur khas Jawa, yaitu bangunan joglo.
             Kompleks tersebut terletak di Bendogerit, Sananwetan, Blitar, dan dibangun di akhir 1970-an.
            </p>
            <a href="https://my.matterport.com/show/?m=Z4h1fzRymqS"
              class="btn1">
                        3D View
                      </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Information
        </h2>
      </div>

<br>
      <div class="filters-content">
        <div class="row grid">
         
          
          
        @foreach($informasi as$index => $item)
<?php 
        $Keterangan = substr($item->Keterangan, 0, 100);
        ?>
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
              
                <a href="{{asset('gamifikasi/storage/app/public/'.$item->gambar)}}" target="_blank">
                  <img src="{{asset('gamifikasi/storage/app/public/'.$item->gambar)}}" alt="" style="width:100%; height: 300px">

                </a>
                
                
                <div class="detail-box">
                <h5 class="card-title">  {{$item->judul}}</h5>
				<p class="card-text">  {{$Keterangan}}</p>
        <a href="{{url('readmore/'.$item->id)}}">readmore...</a>  
        <p class="card-text"><small class="text-muted">{{ Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') }}  </small></p>
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

  <!-- end food section -->

  

  
 
@endsection