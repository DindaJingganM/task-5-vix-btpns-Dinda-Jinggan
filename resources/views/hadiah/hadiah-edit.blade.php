@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4"></div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4 text-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Edit Hadiah </h4>
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class='alert alert-success'>
                    {{session('status')}}
                </div>
                @endif

                <form method="POST" action="{{ url('hadiah/'.$hadiah->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="name">Nama Hadiah</label>
                        <input value="{{ old('name', $hadiah->name) }}" type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama hadiah" />
                    </div>
                    <div class="form-group">
                        <label for="price">Poin Hadiah</label>
                        <input value="{{ old('price', $hadiah->price) }}" type="number" class="form-control" id="price" name="price" placeholder="Masukkan poin hadiah" />
                    </div>
                    <div class="form-group">
                        <label for="price">Stok</label>
                        <input value="{{ old('stok', $hadiah->stok) }}" type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan stok hadiah" />
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Hadiah</label>
                        <input value="{{ old('description', $hadiah->description) }}" type="text" class="form-control" id="description" name="description" placeholder="Masukkan deskripsi hadiah" />
                    </div>

                    
                    <div class="card-body">
                        <button id="edit" class="btn btn-info btn-warning"><a href="{{url('hadiah')}}" style="color: black;">Cancel</a></button>
                        <button id="save" class="btn btn-success btn-rounded">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</main>

</body>

</html>
@endsection