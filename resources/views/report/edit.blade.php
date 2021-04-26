<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Edit</title>
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

        @if (session()->has('message'))
            <p>{{ session()->get('message') }}</p>
        @endif
        <form action="{{ route('report.update', $report->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <h3>
                    <label for="content">Isi Laporan</label>
                </h3>
                <input type="text" name="content" id="content" value="{{ $report->content }}" />
            </div>
            <br />
            <button type="submit">
                Simpan
            </button>
        </form>

        <hr />

        <div>
            <h3>
                <span>History Distribusi</span>
                @isset($report->last_distribution->destination)
                    <span> - </span>
                    <span>(Terakhir: {{ $report->last_distribution->destination->destination }})
                @endisset
            </h3>
            <table border="1" width="500">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Destinasi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($report->distributions as $distribution)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $distribution->destination->destination }}</td>
                            <td>{{ $distribution->created_at }}</td>
                            <td>
                                @if ($loop->last)
                                    <form action="{{ route('distribution.destroy', $distribution->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            Kembalikan ke Atas
                                        </button>
                                    </form>
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
        
        <h3>Log Distribusi</h3>
        <table border="1" width="650">
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
                                <i style="color: green;">
                                    Diproses
                                </i>
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
        
        <hr>

        <form action="{{ route('distribution.store') }}" method="POST">
            @csrf
            <input type="hidden" name="report_id" value="{{ $report->id }}" />
            <h3>
                <label for="destination_id">Tambah Distribusi</label>
            </h3>
            <select name="destination_id" id="destination_id">
                @forelse ($destinations as $destination)
                    <option value="{{ $destination->id }}">
                        {{ $destination->destination }}
                    </option>
                @empty
                    <option value="" disabled hidden selected>
                        Belum ada destinasi
                    </option>
                @endforelse
            </select>
            <button type="submit">
                Tambah Destinasi
            </button>
        </form>
    </div>
</body>
</html>