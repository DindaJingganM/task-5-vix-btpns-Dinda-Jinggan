@extends('layouts.adminlayout')

@section('content')
<!-- top tiles -->
<div class="tile_count">
    <h3>Buat Hadiah/Reward</h3>

    <div class="card card-body">
        <form action="{{ url('hadiah') }}" method="POST">
            <div class="form-group">
                <label for="name">Nama Hadiah</label>
                <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama hadiah" />
            </div>
            <div class="form-group">
                <label for="price">Poin Hadiah</label>
                <input value="{{ old('price') }}" type="number" class="form-control" id="price" name="price" placeholder="Masukkan poin hadiah" />
            </div>
            <div class="form-group">
                <label for="price">Stok</label>
                <input value="{{ old('stok') }}" type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan stok hadiah" />
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Hadiah</label>
                <input value="{{ old('description') }}" type="text" class="form-control" id="description" name="description" placeholder="Masukkan deskripsi hadiah" />
            </div>

            @csrf
            <button type="submit" class="btn btn-primary">Buat</button>
        </form>
    </div>
</div>
@endsection