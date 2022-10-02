<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Data Soal Makam Bung Karno</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Event</th>
            <th>Soal</th>
            <th> A</th>
            <th> B</th>
            <th> C</th>
            <th> D</th>
            <th>Kunci</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach($soal as $index => $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->id_event}}</td>
            <td>{{$item->soal}}</td>
            <td>{{$item->a}}</td>
            <td>{{$item->b}}</td>
            <td>{{$item->c}}</td>
            <td>{{$item->d}}</td>
            <td>{{$item->kunci}}</td>
            @endforeach
    </table>

</body>

</html>