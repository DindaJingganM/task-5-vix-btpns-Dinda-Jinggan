@extends('layouts.adminlayout')

@section('content')
<!-- top tiles -->
<div class="tile_count">
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
        <div class="count">{{App\Models\User:: count() ?? '0' }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Informasi</span>
        <div class="count">{{App\Models\Informasi:: count() ?? '0' }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-camera-retro"></i> Total Galeri</span>
        <div class="count green">{{App\Models\Galeri:: count() ?? '0' }}</div>   
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-calendar"></i> Total Kuis</span>
        <div class="count">{{App\Models\Event:: count() ?? '0' }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Pengunjung</span>
        <div class="count">{{App\Models\BukuKunjungan:: count() ?? '0' }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-comments"></i> Total Komentar</span>
        <div class="count">{{App\Models\Komentar:: count() ?? '0' }}</div>
    </div>
</div>
<br>
<br>
<div id="content" class="card border-secondary mb-3">
    <h3>
        <center>Informasi Admin</center>
    </h3>
    <br><br>
    <fieldset>
        <ol>
            <li>
                <h6>Manajemen Konten</h6>
            </li>
            <p>
                Manajemen Konten terdiri dari 2 Fitur yaitu :
                <br>- Informasi : Digunakan untuk menyampaikan informasi kepada masyarakat pada website Makam Bung Karno
                <br>- Galeri : Digunakan untuk mengupload foto-foto pada website Makam Bung Karno
            </p>
            <li>
                <h6>Manajemen Kuis</h6>
            </li>
            <p> Manajemen Konten terdiri dari 2 Fitur yaitu :
                <br>- Event : Digunakan untuk menambahkan event-event yang berkaitan dengan Makam Bung Karno
                <br>- Soal : Digunakan untuk menambahkan soal-soal dari event yang akan dilaksanakan
                <br>- Result : Hasil dari permainan yang dilakukan oleh user ketika melakukan kuis
            </p>
            <li>
                <h6>Manajemen Buku Kunjungan</h6>
            </li>
            <p> Buku Kunjungan berisi data dari pengunjung yang akan melakukan ziarah pada Makam Bung Karno
            </p>
        </ol>

    </fieldset>
</div>

</body>

</html>
@endsection