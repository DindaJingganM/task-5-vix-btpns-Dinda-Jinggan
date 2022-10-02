@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Pemain</h4>
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
                      <th>Skor Awal</th>
                      <th>Skor Saat Ini</th>
                      <th>Tanggal Main</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @forelse ( $saldo AS $index => $isi )
                    <tr>
                <td>{{$no++}}. </td>
                      </td>
                      <td>{{ $isi->name }}</td>
                      <td>
                        <small>Skor Awal</small><br>
                        <b>{{ $isi->t_saldo }}</b>
                      </td>
                      <td>
                        <small>Skor Saat Ini</small><br>
                        <b>{{ $isi->c_saldo }}</b>
                      </td>
                      <td>{{$isi -> created_at}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" style="text-align: center;">Data Kosong</td>
                    </tr>
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
</body>

</html>
@endsection