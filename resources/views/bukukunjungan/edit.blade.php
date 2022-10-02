@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4 text-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Edit Buku Kunjungan </h4>
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class='alert alert-success'>
                    {{session('status')}}
                </div>
                @endif
                <form method="POST" action="{{url('bukukunjungan/'.$bukukunjungan->id)}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Nama</label>
                    <input type="text" class="form-control" name="nama"  required="" value="{{$bukukunjungan->nama}}">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required="" value="{{$bukukunjungan->alamat}}">
                    </div>

                    <div>
                        <label>Jumlah Pengunjung</label>
                        <input type="number" name="jumlahpengunjung" class="form-control" required="" value="{{$bukukunjungan->jumlahpengunjung}}">
                    </div>
                    <div>
                        <label>Nomor Hp</label>
                        <input type="number" name="nomorhp" class="form-control" required="" value="{{$bukukunjungan->nomorhp}}">
                    </div>
                    <br>
                    <div class="card-body">
                        <button id="edit" class="btn btn-info btn-rounded"><a href="{{url('bukukunjungan')}}" style="color: black;">Back</a></button>
                        <button id="save" class="btn btn-success btn-rounded">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>

</html>
@endsection