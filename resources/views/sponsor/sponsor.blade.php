@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Sponsor</h4>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="ibox-tools">
                <a href="{{url('sponsor/create')}}">
                  <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus"></i> Tambah Data Baru</button></a>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <form class="form" method="get" action="{{ url('sponsor') }}">
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
                    <tr role="row" style="text-align: center;">
                      <th>No</th>
                      <th>Nama Sponsor</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @forelse($sponsor as $index => $item)
                    <tr role="row" class="odd">
                      <td style="text-align: center;">{{$index + $sponsor->firstItem()}}</td>
                      <td class>{{$item->namasponsor}}</td>
                      <td style="text-align: center;">
                        <div class="btn-group">
                          <a href="{{url('sponsor/'.$item->id_sponsor.'/edit')}}" class="btn btn-primary"><img src="img/edit.png"></a>
                          <form action="{{url('sponsor/'.$item->id_sponsor)}}" method="POST" id="delete-{{ md5($item->id_sponsor) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus data?')" class="btn btn-danger"><img src="img/hapus.png"></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" style="text-align: center;">Data Kosong</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $sponsor->links() }}
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