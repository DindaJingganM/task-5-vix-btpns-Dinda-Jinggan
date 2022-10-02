@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Kunjungan</h4>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="ibox-tools">
                <a href="{{url('bukukunjungan/create')}}">
                  <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus"></i> Tambah Data Baru</button></a>
                <a href="{{url('exportpdf')}}">
                  <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-download"></i> Download Data .pdf</button></a>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <form class="form" method="get" action="{{ url('bukukunjungan') }}">
                <div class="form-group w-100 mb-3">
                  <label for="keyword" class="d-block mr-2">Pencarian</label>
                  <input type="text" name="keyword" value="{{$keyword}}" class="form-control w-75 d-inline" id="keyword" placeholder="Masukkan keyword">
                  <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <br>
        <div class="table-responsive">
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-stripped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_o_info">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Jumlah Pengunjung</th>
                      <th>Nomor Hp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @forelse($bukukunjungan as $index => $b)
                    <tr role="row" class="odd">
                      <td>{{$index + $bukukunjungan->firstItem()}}</td>
                      <td>{{$b->nama}}</td>
                      <td>{{$b->alamat}}</td>
                      <td>{{$b->jumlahpengunjung}}</td>
                      <td>{{$b->nomorhp}}</td>
                      <td>
                        <div class="btn-group">
                          <a href="{{url('bukukunjungan/'.$b->id.'/edit')}}" class="btn btn-primary"><img src="img/edit.png"></a>
                          <form action="{{url('bukukunjungan/'.$b->id )}}" method="POST" id="delete-{{ md5($b->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus data?')" class="btn btn-danger"><img src="img/hapus.png"></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="6" style="text-align: center;">Data Kosong</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $bukukunjungan->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>
@endsection