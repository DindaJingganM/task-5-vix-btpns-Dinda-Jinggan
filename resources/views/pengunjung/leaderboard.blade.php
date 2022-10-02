@extends('layouts.pengunjunglayout')

@section('leaderboard')

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="/assetshome/images/makam2.jpg" alt="">
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
                <a class="nav-link" href="{{ route('homepengunjung') }}">Home </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link" href="{{ route('galeripengunjung') }}">Galeri</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('informasipengunjung') }}">Informasi</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('leaderboard') }}">Leaderboard<span class="sr-only">(current)</span></a>
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
          Leaderboard
        </h2>
      </div>

      <br>
      <div class="filters-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <br>
                <div class="table-responsive">
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12">
                        <table class="table table-stripped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_o_info">
                          <thead>
                            <tr role="row">
                              <th>
                                No
                              </th>
                              <th>
                                Nama
                              </th>
                              <th>
                                Skor
                              </th>
                              <th>
                                Tanggal Main
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ( $leaderboard AS $index => $isi )
                            <tr>
                              <td>

                                @if ( $index == 0 )

                                1

                                @elseif ( $index == 1 )

                                2

                                @elseif ( $index == 3 )

                                3

                                @else

                                4

                                @endif

                              </td>
                              <td>{{ $isi->name }}</td>
                              <td>
                                <small>Skor</small><br>
                                <b>{{ $isi->total }}</b>
                              </td>
                              <td>{{$isi -> created_at}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end food section -->


  @endsection