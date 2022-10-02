@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Buku Kunjungan</h4>
                    <p class="text-muted m-b-15 f-s-12">Silahkan Isi Buku Tamu Disini</p>
                    <div class="card-body">
                        @if(session('status'))
                        <div class='alert alert-success'>
                            {{session('status')}}
                        </div>
                        <div class="basic-form">
                            @endif
                            <form method="POST" action="{{url('tambah-bukukunjungan')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" required="">
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" required="">
                                </div>

                                <div>
                                    <label>Jumlah Pengunjung</label>
                                    <input type="number" name="jumlahpengunjung" class="form-control" required="">
                                </div>

                                <div>
                                    <label>Nomor HP</label>
                                    <input type="number" name="nomorhp" class="form-control" required="">
                                </div>
                                <div class="card-body">
                                    <button id="edit" class="btn btn-info btn-rounded"><a href="{{url('bukukunjungan')}}" style="color: black;">Back</a></button>
                                    <button id="save" class="btn btn-success btn-rounded">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>

</html>
@endsection