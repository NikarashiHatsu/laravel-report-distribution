<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Index</title>
</head>
<body>
    <a href="{{ route('report.index') }}">List Laporan</a>
    <a href="{{ route('destination.index') }}">List Destinasi</a>

    <hr />

    <div>
        @if (session()->has('message'))
            <p>{{ session()->get('message') }}</p>
        @endif
        <table border="1" width="400">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $report)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $report->content }}</td>
                        <td width="200">
                            <div>
                                <a href="{{ route('report.show', $report->id) }}">
                                    Detail
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('report.edit', $report->id) }}">
                                    Edit
                                </a>
                            </div>
                            <form action="{{ route('report.destroy', $report->id) }}" method="post">
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
        <a href="{{ route('report.create') }}">
            Tambah Laporan
        </a>
        {{ $reports->links() }}
    </div>
</body>
</html>