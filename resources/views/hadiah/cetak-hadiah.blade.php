<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Voucher {{ $hdata->hdata }}</title>
</head>
<body>

    <div id="printable-area">
        <table>
            <tbody>
                <tr>
                    <th>ID Voucher</th>
                    <td>{{ $hdata->hdata }}</td>
                </tr>
                <tr>
                    <th>Nama </th>
                    <td>{{Auth::user()->name}}</td>
                </tr>
                <tr>
                    <th>Nama Voucher</th>
                    <td>{{ $hdata->hadiahs->name }}</td>
                </tr>
                <tr>
                    <th>Poin Voucher</th>
                    <td>{{ number_format($hdata->hadiahs->price) }} Poin</td>
                </tr>
                <tr>
                <td>{!! QrCode::size(250)->generate($hdata->qr_code) !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <script>
        window.print();
    </script>
</body>
</html>