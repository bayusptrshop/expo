@extends('layout.app')

@section('content')
    <div class="container my-4">
        <h3 class="mb-4">Dashboard Admin - Peserta Expo</h3>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="pesertaTable" class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Peserta</th>
                                <th>Absensi Masuk</th>
                                <th>Absensi Pulang</th>
                                <th>Penilaian</th>
                                <th>Sertifikat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesertas as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peserta->nim }}</td>
                                    <td>{{ $peserta->nama }}</td>
                                    <td>
                                        @if ($peserta->absen && $peserta->absen->masuk)
                                            <span class="badge bg-success">Sudah Absen</span>
                                        @else
                                            <span class="badge bg-danger">Belum Absen</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($peserta->absen && $peserta->absen->pulang)
                                            <span class="badge bg-success">Sudah Absen</span>
                                        @else
                                            <span class="badge bg-danger">Belum Absen</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($peserta->penilaians->count() == $kontestans->count() && $kontestans->count() > 0)
                                            <span class="badge bg-success">Sudah Menilai</span>
                                        @else
                                            <span class="badge bg-warning">Belum Menilai
                                                ({{ $peserta->penilaians->count() }}/{{ $kontestans->count() }})</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (
                                            $peserta->penilaians->count() == $kontestans->count() &&
                                                $peserta->absen &&
                                                $peserta->absen->masuk &&
                                                $peserta->absen->pulang)
                                            <a href="/sertifikat/{{ $peserta->qr_hash }}"
                                                class="btn btn-sm btn-success">Cetak Sertifikat</a>
                                        @else
                                            <span class="badge bg-secondary">Tidak Bisa Cetak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/penilaian/{{ $peserta->qr_hash }}" class="btn btn-primary btn-sm">Lihat
                                            Penilaian</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#pesertaTable').DataTable({
                // "language": {
                //     "url": "https://cdn.datatables.net/plug-ins/2.0.8/i18n/id.json"
                // },
                "pageLength": 10,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Semua"]
                ]
            });
        });
    </script>
@endpush
