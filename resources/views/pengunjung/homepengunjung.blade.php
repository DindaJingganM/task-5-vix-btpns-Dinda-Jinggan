@extends('layouts.pengunjunglayout')

@section('homepengunjung')
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
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('homepengunjung') }}">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('galeripengunjung') }}">Galeri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('informasipengunjung') }}">Informasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
              </li>
            </ul>
            <div class="user_option">
              
   
              
              <a class="order_online" href="{{ route('login') }}">Kuis</a>
            
              
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                <div class="detail-box">
                    <h1>
                    YUK IKUTI KUIS !
                    </h1>
                    <h4>
                    DAN TUKARKAN POINNYA !
                    </h4>
                    <p>
                    Mainkan Kuisnya dan Tukarkan Poinnya Untuk Mendapatkan Hadiah Menarik
                    <div class="btn-box">
                      <a href="{{ route('login') }}" class="btn1">
                      Kuis
                      </a>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                <div class="detail-box">
                    <h1>
                      Makam Bung Karno Blitar
                    </h1>
                    <p>
                    Makam Soekarno atau biasa disebut Makam Bung Karno disingkat MBK adalah kompleks pemakaman presiden pertama Republik Indonesia, Soekarno, yang didesain dengan arsitektur khas Jawa, yaitu bangunan joglo. Kompleks tersebut terletak di Bendogerit, Sananwetan, Blitar, dan dibangun di akhir 1970-an.
                    </p>
                    <div class="btn-box">
                      <a href="https://my.matterport.com/show/?m=Z4h1fzRymqS" class="btn1">
                        3D View
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  

  <!-- section -->

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
      <div class="btn-box">
        <a href="{{url('galeripengunjung')}}">
          View More
        </a>
      </div>
    </div>
  </section>

  <!-- end food section -->

  <!-- end food section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box" >
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
            <a href="{{ route('informasipengunjung') }}">
              Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
  <section class="book_section layout_padding">
    
  <div class="container">
    <div class="heading_container heading_center">
      <div class="section-title">
        <div class="cata new">EVENTS</div>
        <h2>YUK Belajar Sambil Bermain !</h2>
      </div>
    </div>

    <br>
    <div class="filters-content">
      <div class="row grid" >
        @foreach($event as $e)
        <div class="col-sm-6 col-lg-4 all pizza">
          <div class="box">
            <div>
              <img src="{{asset('assetshomeuser/img/quiz.jpeg')}}" alt="" style="width:50%; height: 150px">
              <div class="detail-box">
                <h5>{{$e->namaevent}}</h5>
                <p class="comment">Berakhir : {{$e->tanggal_akhir}}</a>
                <div class="rgi-extra">
                  <button class="btn btn-warning"><a href="{{ url('login') }}" style="color: black;">Main</a></button>
                </div>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    

  </div>
  
</section>
  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Komentar
        </h2>
      </div>
      <div class="row">
      <div class="col-md-6">
      <form method="POST" action="{{url('/')}}" enctype="multipart/form-data">
                    @csrf

                   
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required="required">
                    </div>
                    <div>
                        <label>Komentar</label>
                        <textarea name="komen" required="required" class="form-control h-150px" rows="6" id="komen"></textarea>
                    </div>
                   <br>
                    <button id="save" class="btn btn-success btn-rounded">Submit</button>
                </form>
      </div>
    </div>
  </section>
  <!-- end book section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
     
        <h2>
          What Says Our Visitors
        </h2>
       
      </div>
      @foreach($komentar as $k)
      <br>
      <div class="card" style="width: 50rem;">
      <div class="card-body">
      <div class="media mb-4">
        <div class="media-body">
       
          <h5 class="mt-0">{{$k->nama}} Says : </h5>
          &nbsp {{$k->komen}}
          <br>
          <h5 class="mt-0">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp admin : </h5>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$k->tanggapan}}
          
        </div>
</div>
</div>
        
      </div>
 @endforeach
      
    </div>
  </section>

@endsection