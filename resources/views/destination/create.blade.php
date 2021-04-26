<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Destination Create</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <a href="{{ route('report.index') }}">List Laporan</a>
    <a href="{{ route('destination.index') }}">List Destinasi</a>

    <hr />

    <div>
        <a href="{{ route('destination.index') }}">
            Kembali
        </a>
        @if (session()->has('message'))
            <p>{{ session()->get('message') }}</p>
        @endif
        <form action="{{ route('destination.store') }}" method="post">
            @csrf
            <div>
                <label for="destination">Destinasi</label>
                <input type="text" name="destination" id="destination" value="{{ old('destination') }}" />
            </div>
            <button type="submit">
                Simpan
            </button>
        </form>
    </div>
</body>
</html>