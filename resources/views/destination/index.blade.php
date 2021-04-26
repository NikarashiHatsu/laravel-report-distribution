<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Destination Index</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <a href="{{ route('report.index') }}">List Laporan</a>
    <a href="{{ route('destination.index') }}">List Destinasi</a>

    <hr />

    <div>
        @if (session()->has('message'))
            <p>{{ session()->get('message') }}</p>
        @endif
        <table border="1" width="1024">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($destinations as $destination)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $destination->destination }}</td>
                        <td width="200">
                            <div>
                                <a href="{{ route('destination.show', $destination->id) }}">
                                    Detail
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('destination.edit', $destination->id) }}">
                                    Edit
                                </a>
                            </div>
                            <form action="{{ route('destination.destroy', $destination->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            Belum ada data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('destination.create') }}">
            Tambah Destinasi
        </a>
        {{ $destinations->links() }}
    </div>
</body>
</html>