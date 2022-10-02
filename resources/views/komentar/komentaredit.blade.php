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
                <h4 class="card-title">Tanggapi Komentar </h4>
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class='alert alert-success'>
                    {{session('status')}}
                </div>
                @endif
                <form method="POST" action="{{url('komentar/'.$komentar->id_komentar)}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Nama</label>
                    <input type="text" class="form-control" name="nama"  required="" readonly value="{{$komentar->nama}}">
                    </div>

                    <div class="form-group">
                        <label>Komentar</label>
                        <input type="" name="komen" class="form-control" required="" readonly value="{{$komentar->komen}}">
                    </div>

                    <div>
                        <label>Tanggapan</label>
                        <input type="text" name="tanggapan" class="form-control" required="required" >
                    </div>

                    <br>
                    <div class="card-body">
                        <button id="edit" class="btn btn-info btn-rounded"><a href="{{url('komentar')}}" style="color: black;">Back</a></button>
                        <button id="save" class="btn btn-success btn-rounded">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection