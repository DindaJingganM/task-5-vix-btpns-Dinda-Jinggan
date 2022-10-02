@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Hadiah/Reward</h4>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="ibox-tools">
                                <a href="{{ url('hadiah/create') }}">
                                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add">
                                        <i class="fa fa-plus"></i> Tambah Data Baru</button></a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <form class="form" method="get" action="{{ url('hadiah') }}">
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
                                            <th>Nama Hadiah</th>
                                            <th>Deskripsi Hadiah</th>
                                            <th>Poin Hadiah</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @forelse ($hadiahs as $index => $item)
                                        <tr role="row" class="odd">
                                            <td>{{$index + $hadiahs->firstItem()}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ number_format($item->price) }} Poin</td>
                                            <td>{{ number_format($item->stok) }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('hadiah/'. $item->hid .'/edit') }}" class="btn btn-primary"><img src="img/edit.png"></a>
                                                    <form action="{{ url('hadiah/'. $item->id) }}" method="POST" id="delete-{{ md5($item->hid) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus data?')" class="btn btn-danger"><img src="img/hapus.png"></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" style="text-align: center;">Data Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $hadiahs->links() }}
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