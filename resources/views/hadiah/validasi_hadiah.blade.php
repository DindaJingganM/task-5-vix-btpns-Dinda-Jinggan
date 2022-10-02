@extends('layouts.adminlayout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Penerima Hadiah/Reward</h4>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
 
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
                                            <th>Nama User</th>
                                            <th>History Id</th>
                                            <th>Data Voucher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @forelse ($hadiah_histori as $index => $item)
                                        
                                        <tr role="row" class="odd">
                                        <td>{{$no++}}. </td>
                                        <td>{{ $item->name }}</td>
                                            <td>{{ $item->hid }}</td>
                                            <td>{{ ($item->hdata) }}</td>
                                           
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" style="text-align: center;">Data Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div id="reader" width="600px"></div>
                    </div>
                    <div class="col-4">
                    <input type="hidden" name="result" id="result">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            // $('#result').val('test');
            function onScanSuccess(decodedText, decodedResult) {
                // alert(decodedText);
                $('#result').val(decodedText);
                
                let id = decodedText;    
                            
                html5QrcodeScanner.clear().then(_ => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        
                        url: "{{ route('validasih') }}",
                        type: 'POST',            
                        data: {
                            _methode : "POST",
                            _token: CSRF_TOKEN, 
                            qr_code : id
                        },            
                        success: function (response) { 
                            console.log(response);
                            if(response.status == 200){
                                alert('berhasil');
                            }else{
                                alert('gagal');
                            }
                            
                        }
                    });   
                }).catch(error => {
                    alert('something wrong');
                });
                
            }

            function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
                // console.warn(`Code scan error = ${error}`);
            }

            let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: {width: 250, height: 250} },
            /* verbose= */ false);
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
            </script>
</html>
@endsection