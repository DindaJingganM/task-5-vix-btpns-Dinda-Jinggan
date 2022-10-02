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

 

  <!-- section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Information
        </h2>
      </div>

<br>



<div class="card" style="max-width: 940px;">
	<div class="row no-gutters">
		<div class="col-md-4">
<a href="{{asset('gamifikasi/storage/app/public/'.$informasi->gambar)}}" target="_blank">
                  <img src="{{asset('gamifikasi/storage/app/public/'.$informasi->gambar)}}" alt="" style="width:100%; height: 300px">

                </a>
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title">  {{$informasi->judul}}</h5>
				<p class="card-text">  {{$informasi->Keterangan}}</p>
				<p class="card-text"><small class="text-muted">  {{$informasi->updated_at->format('l j F Y')}}</small></p>
			</div>
		</div>
	</div>
</div>
<br>
   



      </div>
     
    </div>
  </section>

  <!-- end food section -->

  <!-- end food section -->

  

  
 
@endsection