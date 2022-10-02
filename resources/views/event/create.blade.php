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
                <h4 class="card-title">Tambah Event </h4>
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class='alert alert-success'>
                    {{session('status')}}
                </div>
                @endif
                <form method="POST" action="{{url('tambah-event')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Sponsor</label>
                        <select name="id_sponsor" class="form-control" required="required">
                            @foreach($sponsors as $item)
                            <option value="{{$item->id_sponsor}}">{{$item->namasponsor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Event</label>
                        <input type="text" class="form-control" name="namaevent" required="">
                    </div>
                    <div class="form-group">
                        <label>Poin Event</label>
                        <input type="number" class="form-control" name="poin" required="">
                    </div>
                    <div class="example">
                        <h5 class="box-title m-t-30">Tanggal Event</h5>
                        <div class="input-daterange input-group" id="date-range">
                            <input type="date" class="form-control" name="tanggal_mulai"> <span class="input-group-addon bg-info b-0 text-white"> s/d </span>
                            <input type="date" class="form-control" name="tanggal_akhir">
                        </div>
                    </div>
            </div>
            <div class="card-body">
                <button id="edit" class="btn btn-info btn-rounded"><a href="{{url('event')}}" style="color: black;">Back</a></button>
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