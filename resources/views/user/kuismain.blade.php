@extends('layouts.pengunjunglayout')

@section('kuismain')
<div class="hero_area">
    <div class="bg-box">
        <img src="{{asset('assetshome/images/Makam2.jpg')}}" alt="">

    </div>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Halaman Quiz {{ $event->namaevent }}</title>



        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    </head>

    <body>

        <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConfirmLabel">Konfirmasikan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tekan tombol kirim untuk mengirimkan jawaban anda.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Belum</button>
                        <button type="button" class="btn btn-success" onclick="document.getElementById('answer').submit()">Kirim</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row min-vh-100 no-gutters">

            <form id="answer" class="d-flex p-3 flex-wrap justify-content-between" action="{{ url('submit-answer/'. $event->id_event) }}" method="POST">

                @csrf



                @foreach($soal as $index => $item)


                <input type="hidden" class="jawab" name="jawaban[{{ $index }}]" id="{{ md5($index) }}" />
                <input type="hidden" name="soal[{{ $index }}]" value="{{ $item->id_soal }}" />
                @endforeach
            </form>

            <div class="col-md">

                <div class="p-3">
                    <a href="{{ url('userkuis') }}" class="btn btn-light">Kembali</a>
                    <header id="masthead" class="mt-3">
                        <div class="row">
                            <div class="col-md-8" style="color:white;">
                                <h4>Kuis dari {{ $event->namaevent }}</h4>
                                <p>Kuis dari event ini berakhir pada {{ \Carbon\Carbon::parse($event->tanggal_akhir)->isoFormat('dddd, DD MMMM YYYY') }}</p>
                            </div>
                        </div>
                    </header>

                    <main id="main-content">
                        <div class="tab-content" id="content-wrap">
                            @foreach($soal as $index => $item)
                            <div data-soal="{{ $index }}" class="tab-pane fade @if($index == 0) show active @endif" id="{{ md5($index) }}">
                                <div class="card">
                                    <div class="card-header pb-0 bg-white border-0">
                                        <h5 class="mb-0">Quiz Nomor <div class="badge badge-primary">{{ $index+1 }}</div>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        {{ $item->soal }}

                                        <div class="mt-3" id="opsi-container">
                                            <div class="custom-control custom-radio p-3 border rounded">
                                                <input type="radio" id="opsi-{{ md5($index) }}-a" name="{{ md5($index) }}" value="a" class="custom-control-input" />
                                                <label class="custom-control-label" for="opsi-{{ md5($index) }}-a">A. {{ $item->a }}</label>
                                            </div>
                                            <div class="custom-control custom-radio p-3 border rounded">
                                                <input type="radio" id="opsi-{{ md5($index) }}-b" name="{{ md5($index) }}" value="b" class="custom-control-input" />
                                                <label class="custom-control-label" for="opsi-{{ md5($index) }}-b">B. {{ $item->b }}</label>
                                            </div>
                                            <div class="custom-control custom-radio p-3 border rounded">
                                                <input type="radio" id="opsi-{{ md5($index) }}-c" name="{{ md5($index) }}" value="c" class="custom-control-input" />
                                                <label class="custom-control-label" for="opsi-{{ md5($index) }}-c">C. {{ $item->c }}</label>
                                            </div>
                                            <div class="custom-control custom-radio p-3 border rounded">
                                                <input type="radio" id="opsi-{{ md5($index) }}-d" name="{{ md5($index) }}" value="d" class="custom-control-input" />
                                                <label class="custom-control-label" for="opsi-{{ md5($index) }}-d">D. {{ $item->d }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-between">
                                            @if($index !== 0)
                                            <div class="col-md-4">
                                                <button class="btn btn-light" data-trigger="previous">Soal Sebelumnya</button>
                                            </div>
                                            @endif
                                            <div class="col-md-4 text-right ml-auto">
                                                @if($index !== count($soal) - 1)
                                                <button class="btn btn-primary" data-trigger="next">Soal Selanjutnya</button>
                                                @else
                                                <button type="button" disabled data-trigger="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirm">
                                                    Selesai
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </main>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

        <script>
            // Navigation
            $('#navigation a').click(function(e) {
                e.preventDefault();
                let target = $(this).attr('href');
                let slice = target.substr(1);
                let activeTab = $('#content-wrap').find('.tab-pane.active');

                // Add Active El
                $(this).removeClass('text-dark').addClass('border-primary text-primary font-weight-bold');
                $(this).find('.card-footer').addClass('border-primary');

                // Remove Active El
                $(`#navigation a[href="#${activeTab.attr('id')}"]`).removeClass('border-primary text-primary font-weight-bold').addClass('text-dark');
                $(`#navigation a[href="#${activeTab.attr('id')}"] .card-footer`).removeClass('border-primary');

                activeTab.removeClass('active show');
                $('#content-wrap').find(`#${slice}`).tab('show');
            });

            // Next Nav
            $('[data-trigger=previous]').click(function() {
                let parent = $(this).closest('.tab-pane');
                let prev = parent.prev();

                // Add Active El
                $(`#navigation a[href="#${prev.attr('id')}"]`).removeClass('text-dark').addClass('border-primary text-primary font-weight-bold');
                $(`#navigation a[href="#${prev.attr('id')}"]`).find('.card-footer').addClass('border-primary');

                // Remove Active El
                $(`#navigation a[href="#${parent.attr('id')}"]`).removeClass('border-primary text-primary font-weight-bold').addClass('text-dark');
                $(`#navigation a[href="#${parent.attr('id')}"] .card-footer`).removeClass('border-primary');

                parent.removeClass('show active');
                prev.tab('show');
            });

            // Prev Nav
            $('[data-trigger=next]').click(function() {
                let parent = $(this).closest('.tab-pane');
                let next = parent.next();

                console.log(parent, next.attr('id'), parent.attr('id'));

                // Add Active El
                $(`#navigation a[href="#${next.attr('id')}"]`).removeClass('text-dark').addClass('border-primary text-primary font-weight-bold');
                $(`#navigation a[href="#${next.attr('id')}"]`).find('.card-footer').addClass('border-primary');

                // Remove Active El
                $(`#navigation a[href="#${parent.attr('id')}"]`).removeClass('border-primary text-primary font-weight-bold').addClass('text-dark');
                $(`#navigation a[href="#${parent.attr('id')}"] .card-footer`).removeClass('border-primary');

                parent.removeClass('show active');
                next.tab('show');
            });
        </script>

        <script>
            function checkInputs() {
                let result = []
                $(`form#answer input.jawab`).each(function(i, el) {
                    let val = $(el).val();
                    result[i] = val ? true : false;
                });

                if (result.every(el => el == true) == true) {
                    $('[data-trigger=submit]').removeAttr('disabled');
                } else {
                    $('[data-trigger=submit]').attr('disabled', true);
                }
            }

            $('#opsi-container input').change(function() {
                let selection = $(this).val();
                let target = $(this).attr('name');

                $(`form#answer input#${target}`).val(selection);
                $(`form#answer a[href="#${target}"] .card-footer`).text(selection.toUpperCase());

                checkInputs();
            });
        </script>
        <audio autoplay>
            <source src="{{asset('audio/main.mp3')}}" type="audio/mp3">
        </audio>
    </body>
</div>





@endsection