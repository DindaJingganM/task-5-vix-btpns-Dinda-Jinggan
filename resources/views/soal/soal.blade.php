@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Soal</h4>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="ibox-tools">
                <a href="{{url('soal/create')}}">
                  <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus"></i> Tambah Data Baru</button></a>
                <a href="{{url('soal-exportpdf')}}">
                  <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-download"></i> Download Soal.pdf</button></a>
              </div>
            </div>

            <div class="col-sm-12 col-md-6">
              <form class="form" method="get" action="{{ url('soal') }}">
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
                      <th>Event</th>
                      <th>Soal</th>
                      <th>Option A</th>
                      <th>Option B</th>
                      <th>Option C</th>
                      <th>Option D</th>
                      <th>Kunci</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @forelse($soal as $index => $item)
                    <tr role="row" class="odd">
                      <td>{{$index + $soal->firstItem()}}</td>
                      <td>{{$item->events->namaevent}}</td>
                      <td>{{$item->soal}}</td>
                      <td>{{$item->a}}</td>
                      <td>{{$item->b}}</td>
                      <td>{{$item->c}}</td>
                      <td>{{$item->d}}</td>
                      <td>{{$item->kunci}}</td>
                      <td>
                        <div class="btn-group">
                          <a href="{{url('soal/'.$item->id_soal.'/edit')}}" class="btn btn-primary"><img src="img/edit.png"></a>
                          <form action="{{url('soal/'.$item->id_soal )}}" method="POST" id="delete-{{ md5($item->id_soal) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus data?')" class="btn btn-danger"><img src="img/hapus.png"></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="9" style="text-align: center;">Data Kosong</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $soal->links() }}
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