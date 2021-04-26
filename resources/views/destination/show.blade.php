<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Destination Detail</title>
</head>
<body>
    <a href="{{ route('report.index') }}">List Laporan</a>
    <a href="{{ route('destination.index') }}">List Destinasi</a>

    <hr />

    <div>
        <a href="{{ route('destination.index') }}">
            Kembali
        </a>

        <hr />

        <div>
            <h3>Destinasi</h3>
            <p>{{ $destination->destination }}</p>
            <p>Jumlah laporan yang telah didistribusikan ke destinasi ini: {{ count($destination->distributions) }} laporan</p>
        </div>
    </div>
</body>
</html>