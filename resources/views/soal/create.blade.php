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
                <h4 class="card-title">Tambah Soal </h4>
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class='alert alert-success'>
                    {{session('status')}}
                </div>
                @endif
                <form method="POST" action="{{url('tambah-soal')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Event</label>
                        <select name="id_event" class="form-control" required="required">
                            <option value="">--Pilih Event--</option>
                            @foreach($events as $item)
                            <option value="{{$item->id_event}}">{{$item->namaevent}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Soal</label>
                        <textarea name="soal" required="required" class="form-control h-150px" rows="6" id="comment"></textarea>
                    </div>
                    <div>
                        <label>Option A</label>
                        <textarea name="a" required="required" class="form-control h-150px" rows="6" id="comment"></textarea>
                    </div>
                    <div>
                        <label>Option B</label>
                        <textarea name="b" required="required" class="form-control h-150px" rows="6" id="comment"></textarea>
                    </div>
                    <div>
                        <label>Option C</label>
                        <textarea name="c" required="required" class="form-control h-150px" rows="6" id="comment"></textarea>
                    </div>
                    <div>
                        <label>Option D</label>
                        <textarea name="d" required="required" class="form-control h-150px" rows="6" id="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kunci</label>
                        <select name="kunci" class="form-control" required="required">
                            <option value="">--Pilih Kunci--</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <button id="edit" class="btn btn-info btn-rounded"><a href="{{url('soal')}}" style="color: black;">Back</a></button>
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