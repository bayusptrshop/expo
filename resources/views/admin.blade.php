@extends('layout.app')

@section('content')
    <div class="container my-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <h2 class="fw-bold text-primary mb-3 mb-md-0">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard Admin
                        <span class="badge bg-primary-subtle text-primary ms-2 fs-6">Peserta Expo</span>
                    </h2>
                    {{-- <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-file-earmark-excel me-1"></i> Export
                    </button>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Peserta
                    </button>
                </div> --}}
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; overflow: hidden;">
                    <div class="card-body p-0">
                        <div class="d-flex">
                            <div class="bg-primary text-white p-3 d-flex align-items-center justify-content-center"
                                style="width: 80px;">
                                <i class="bi bi-people-fill fs-1"></i>
                            </div>
                            <div class="p-3">
                                <p class="text-muted mb-1 small">Total Peserta</p>
                                <h3 class="mb-0 fw-bold">{{ $totalPeserta }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; overflow: hidden;">
                    <div class="card-body p-0">
                        <div class="d-flex">
                            <div class="bg-success text-white p-3 d-flex align-items-center justify-content-center"
                                style="width: 80px;">
                                <i class="bi bi-check-circle-fill fs-1"></i>
                            </div>
                            <div class="p-3">
                                <p class="text-muted mb-1 small">Sudah Absen</p>
                                <h3 class="mb-0 fw-bold">
                                    {{ $pesertaSudahAbsen }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; overflow: hidden;">
                    <div class="card-body p-0">
                        <div class="d-flex">
                            <div class="bg-warning text-white p-3 d-flex align-items-center justify-content-center"
                                style="width: 80px;">
                                <i class="bi bi-star-fill fs-1"></i>
                            </div>
                            <div class="p-3">
                                <p class="text-muted mb-1 small">Sudah Menilai</p>
                                <h3 class="mb-0 fw-bold">
                                    {{ $pesertaSudahMenilaiSemua }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; overflow: hidden;">
                    <div class="card-body p-0">
                        <div class="d-flex">
                            <div class="bg-info text-white p-3 d-flex align-items-center justify-content-center"
                                style="width: 80px;">
                                <i class="bi bi-award-fill fs-1"></i>
                            </div>
                            <div class="p-3">
                                <p class="text-muted mb-1 small">Sertifikat</p>
                                <h3 class="mb-0 fw-bold">
                                    {{ $pesertaSiapCetakSertifikat }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="bg-primary p-2 rounded-circle me-3 text-white">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="mb-0 fw-bold text-primary">Daftar Peserta Expo</h5>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="pesertaTable" class="table table-hover align-middle mb-0 w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Peserta</th>
                                <th>Absensi Masuk</th>
                                <th>Absensi Pulang</th>
                                <th>Penilaian</th>
                                <th>Sertifikat</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesertas as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="fw-medium">{{ $peserta->nim }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3"
                                                style="min-width: 40px; height: 40px; font-weight: 600;">
                                                {{ strtoupper(substr($peserta->nama, 0, 1)) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-semibold">{{ $peserta->nama }}</h6>
                                                <small class="text-muted">Mahasiswa</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($peserta->absen && $peserta->absen->masuk)
                                            <span
                                                class="badge rounded-pill text-bg-success d-flex align-items-center gap-1 px-3 py-2"
                                                style="width: fit-content">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Sudah Absen</span>
                                            </span>
                                        @else
                                            <span
                                                class="badge rounded-pill text-bg-danger d-flex align-items-center gap-1 px-3 py-2"
                                                style="width: fit-content">
                                                <i class="bi bi-x-circle-fill"></i>
                                                <span>Belum Absen</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($peserta->absen && $peserta->absen->pulang)
                                            <span
                                                class="badge rounded-pill text-bg-success d-flex align-items-center gap-1 px-3 py-2"
                                                style="width: fit-content">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Sudah Absen</span>
                                            </span>
                                        @else
                                            <span
                                                class="badge rounded-pill text-bg-danger d-flex align-items-center gap-1 px-3 py-2"
                                                style="width: fit-content">
                                                <i class="bi bi-x-circle-fill"></i>
                                                <span>Belum Absen</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($peserta->penilaians->count() == $kontestans->count() && $kontestans->count() > 0)
                                            <span
                                                class="badge rounded-pill text-bg-success d-flex align-items-center gap-1 px-3 py-2"
                                                style="width: fit-content">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Sudah Menilai</span>
                                            </span>
                                        @else
                                            <div>
                                                <span
                                                    class="badge rounded-pill text-bg-warning d-flex align-items-center gap-1 px-3 py-2"
                                                    style="width: fit-content">
                                                    <i class="bi bi-exclamation-circle-fill"></i>
                                                    <span>Belum Menilai</span>
                                                </span>
                                                <div class="mt-2 d-flex align-items-center gap-2">
                                                    <div class="progress" style="height: 6px; width: 80px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: {{ $kontestans->count() > 0 ? ($peserta->penilaians->count() / $kontestans->count()) * 100 : 0 }}%">
                                                        </div>
                                                    </div>
                                                    <small
                                                        class="text-muted">{{ $peserta->penilaians->count() }}/{{ $kontestans->count() }}</small>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (
                                            $peserta->penilaians->count() == $kontestans->count() &&
                                                $peserta->absen &&
                                                $peserta->absen->masuk &&
                                                $peserta->absen->pulang)
                                            <a href="/sertifikat/{{ $peserta->qr_hash }}"
                                                class="btn btn-success btn-sm d-flex align-items-center gap-2"
                                                style="width: fit-content">
                                                <i class="bi bi-printer"></i>
                                                <span>Cetak Sertifikat</span>
                                            </a>
                                        @else
                                            <span
                                                class="badge rounded-pill text-bg-secondary d-flex align-items-center gap-1 px-3 py-2"
                                                style="width: fit-content">
                                                <i class="bi bi-lock-fill"></i>
                                                <span>Tidak Bisa Cetak</span>
                                            </span>
                                        @endif
                                    </td>
                                    {{-- <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                        <li>
                                            <a href="/penilaian/{{ $peserta->qr_hash }}" class="dropdown-item d-flex align-items-center">
                                                <i class="bi bi-eye me-2 text-primary"></i> Lihat Penilaian
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item d-flex align-items-center">
                                                <i class="bi bi-pencil me-2 text-warning"></i> Edit Peserta
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a href="#" class="dropdown-item d-flex align-items-center text-danger">
                                                <i class="bi bi-trash me-2"></i> Hapus
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Push styles and scripts to the layout --}}
@push('styles')
    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
        }

        .badge {
            font-weight: 500;
        }

        .table>tbody>tr:hover {
            background-color: rgba(13, 110, 253, 0.04);
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
        }

        .dropdown-item:active {
            background-color: #0d6efd;
        }

        .btn-outline-primary {
            border-color: #dee2e6;
            color: #0d6efd;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }

        /* Custom card hover effect */
        .card {
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* DataTables Custom Styling */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1rem;
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            margin-left: 0.5rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.25rem 0.5rem;
            margin: 0 0.25rem;
            border-radius: 0.375rem;
            border: 1px solid #dee2e6;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #0d6efd !important;
            color: white !important;
            border: 1px solid #0d6efd !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e9ecef !important;
            color: #0d6efd !important;
            border: 1px solid #dee2e6 !important;
        }

        .dataTables_wrapper .dataTables_info {
            padding-top: 0.85rem;
            font-size: 0.875rem;
            color: #6c757d;
        }

        /* Responsive improvements */
        @media (max-width: 767.98px) {
            .card-header {
                flex-direction: column;
                align-items: start !important;
            }

            .card-header>div:last-child {
                margin-top: 1rem;
                width: 100%;
            }

            .badge {
                font-size: 0.7rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                text-align: left;
                width: 100%;
            }

            .dataTables_wrapper .dataTables_filter {
                margin-top: 0.5rem;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
                margin-left: 0;
                margin-top: 0.25rem;
            }
        }
    </style>
@endpush

@push('scripts')
    {{-- jQuery (DataTables requires jQuery) --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTables
            $('#pesertaTable').DataTable({
                responsive: true, // Enable responsive extension
                language: {
                    // Customize language for Indonesian
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    zeroRecords: "Tidak ada data yang cocok",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                },
                // Define responsive priorities for columns
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    }, // No
                    {
                        responsivePriority: 2,
                        targets: 2
                    }, // Nama Peserta
                    {
                        responsivePriority: 3,
                        targets: -1
                    } // Aksi (last column)
                ],
                // Customize DOM structure for better Bootstrap integration
                dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rtip',
            });

            // Add Bootstrap form-control classes to DataTables search input and length select
            $('.dataTables_filter input').addClass('form-control form-control-sm');
            $('.dataTables_length select').addClass('form-select form-select-sm');
        });
    </script>
@endpush
