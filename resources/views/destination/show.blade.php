<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Destination Detail</title>
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

        <hr />

        <div>
            <h3>Destinasi</h3>
            <p>{{ $destination->destination }}</p>
            <p>Jumlah laporan yang telah didistribusikan ke destinasi ini: {{ collect($destination->distributions)->groupBy('report_id')->count() }} laporan</p>
        </div>

        <hr />

        <div>
            <h3>Laporan dengan destinasi terakhir berada disini</h3>
            <table border="1" width="1024">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Konten</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($last_distributed_reports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->content }}</td>
                            <td>{{ Carbon\Carbon::parse($report->last_distribution->created_at)->isoFormat('dddd, DD MMMM YYYY - HH:mm:ss') }}</td>
                            <td>
                                <a href="{{ route('report.show', $report->id) }}">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                Belum ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>