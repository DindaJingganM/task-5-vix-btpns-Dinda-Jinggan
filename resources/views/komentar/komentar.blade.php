@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Komentar</h4>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="ibox-tools">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <form class="form" method="get" action="{{ url('komentar') }}">
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
                      <th>Komentar</th>
                      <th>Tanggapan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @forelse($komentar as $index => $k)
                    <tr role="row" class="odd">
                      <td>{{$no++}}</td>
                      <td>{{$k->nama}}</td>
                      <td>{{$k->komen}}</td>
                      <td>{{$k->tanggapan}}</td>
                      <td>
                        <div class="btn-group">
                          <a href="{{url('komentar/'.$k->id_komentar.'/edit')}}" class="btn btn-primary">Tanggapi</a>
                          <form action="{{url('komentar/'.$k->id_komentar )}}" method="POST" id="delete-{{ md5($k->id_komentar) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus data?')" class="btn btn-danger"><img src="img/hapus.png"></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @empty
                      <td colspan="5" style="text-align: center;">Data Kosong</td>
                    @endforelse
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
</body>

</html>
@endsection