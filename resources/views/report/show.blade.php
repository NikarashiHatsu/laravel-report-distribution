<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Detail</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <a href="{{ route('report.index') }}">List Laporan</a>
    <a href="{{ route('destination.index') }}">List Destinasi</a>

    <hr />
    <div>
        <a href="{{ route('report.index') }}">
            Kembali
        </a>
    
        <hr />
    
        <div>
            <h3>Isi Laporan</h3>
            <p>{{ $report->content }}</p>
        </div>
    
        <hr />
    
        <div>
            <h3>
                <span>History Distribusi</span>
                <span> - </span>
                <span>
                    (Terakhir: 
                        {{ $report
                            ->distributions[count($report->distributions) - 1]
                            ->destination->destination 
                        }}
                    )
                </span>
            </h3>
            <table border="1" width="500">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Destinasi</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($report->distributions as $distribution)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $distribution->destination->destination }}</td>
                            <td>{{ Carbon\Carbon::parse($distribution->created_at)->isoFormat('dddd, DD MMMM YYYY - HH:MM:ss') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada distribusi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <h3>Log Distribusi</h3>
        <table border="1" width="1024">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Destinasi</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($report->distributions_log as $distribution)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $distribution->destination->destination }}</td>
                        <td>{{ $distribution->created_at }}</td>
                        <td width="350">
                            @if ($distribution->deleted_at)
                                <i style="color: red;">
                                    <span>Laporan dikembalikan ke</span>
                                    <span>
                                        @if ($loop->first)
                                            Pemilah Utama
                                        @else
                                            {{ $report->distributions_log[$loop->iteration - 2]->destination->destination }}
                                        @endif
                                    </span>
                                </i>
                            @else
                                @if ($loop->last)
                                    <i style="color: gray;">
                                        Diproses
                                    </i>
                                @else
                                    <i style="color: green;">
                                        Laporan diteruskan ke {{ $report->distributions_log[$loop->iteration]->destination->destination }}
                                    </i>
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada distribusi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>