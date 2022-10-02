@extends('layouts.kuis')

@section('content')
<audio controls autoplay>
  <source src="{{asset('audio/tukar.mp3')}}" type="audio/mp3">
</audio>
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <h3 class="mb-0"> Tukarkan Saldo Poin! </h3>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">

        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="hadiah-tab" data-toggle="tab" href="#hadiah" role="tab" aria-controls="hadiah" aria-selected="true">Hadiah Lainnya</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="hadiah" role="tabpanel" aria-labelledby="hadiah-tab">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Hadiah</th>
                            <th>Deskripsi</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hadiah as $item)
                        <tr>
                            <td>{{ $item->name }} @ {{ number_format($item->price) }}Poin</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ md5($item->id) }}">
                                    Tukar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="{{ md5($item->id) }}" tabindex="-1" aria-labelledby="{{ md5($item->id) }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="{{ md5($item->id) }}Label">Tukar Hadiah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('tukar-hadiah/reedem') }}" id="reedem-form-{{ md5($item->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="hid" value="{{ $item->hid }}" />
                                                <label for="jumlah">Jumlah Hadiah</label>
                                                <input type="number" name="jumlah" class="form-control" required placeholder="Masukkan jumlah hadiah yang akan ditukar" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('reedem-form-{{ md5($item->id) }}').submit()">Tukar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Kosong / Saldo tidak mencukupi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab"> 
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>qrcode</th>
                            <th>Nama Hadiah</th>
                            <th>Poin Hadiah</th>
                           
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hhist as $item)
                        <tr>
                            <td>{!! QrCode::size(250)->generate($item->qr_code) !!}</td>
                            <td>
                            
                                <h5>{{ $item->hdata }}</h5>
                                <p class="m-0">{{ $item->hadiahs->name }}</p>
                            </td>
                            <td>{{ number_format($item->hadiahs->price) }} Poin</td>
                
                            <td>
                                @if(!$item->verified)
                                <a href="{{ url('tukar-hadiah/'.$item->hdata.'/print') }}" class="btn btn-primary">Cetak</a>
                                @else 
                                <button disabled="disabled" class="btn btn-primary disabled">Cetak</button>
                                @endif 
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection 