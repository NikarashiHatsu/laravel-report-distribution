<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Create</title>
</head>
<body>
    <a href="{{ route('report.index') }}">List Laporan</a>
    <a href="{{ route('destination.index') }}">List Destinasi</a>

    <hr />

    <div>
        <a href="{{ route('report.index') }}">
            Kembali
        </a>
        @if (session()->has('message'))
            <p>{{ session()->get('message') }}</p>
        @endif
        <form action="{{ route('report.store') }}" method="post">
            @csrf
            <div>
                <label for="content">Isi Laporan</label>
                <input type="text" name="content" id="content" value="{{ old('content') }}" />
            </div>
            <button type="submit">
                Simpan
            </button>
        </form>
    </div>
</body>
</html>