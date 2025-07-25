<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kontestan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --success-color: #38b000;
            --warning-color: #ffaa00;
            --danger-color: #d90429;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            padding-bottom: 2rem;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: none;
            margin-bottom: 20px;
        }

        .card-header {
            background: var(--primary-color);
            color: white;
            border-bottom: none;
            padding: 1rem 1.5rem;
        }

        .page-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .page-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background: var(--primary-color);
            bottom: -10px;
            left: 25%;
            border-radius: 2px;
        }

        /* DataTables Styling */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--dark-color);
            padding: 10px 15px;
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 4px 8px;
            margin: 0 5px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 6px 10px;
            margin-left: 5px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px;
            margin: 0 2px;
            border-radius: 4px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: var(--primary-color) !important;
            color: white !important;
            border: 1px solid var(--primary-color) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--accent-color) !important;
            color: white !important;
            border: 1px solid var(--accent-color) !important;
        }

        /* Table Styling */
        .table {
            width: 100%;
            margin-bottom: 0;
            vertical-align: middle;
            border-color: #dee2e6;
        }

        .table thead th {
            background-color: rgba(67, 97, 238, 0.05);
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
            color: var(--dark-color);
            padding: 12px 15px;
            vertical-align: middle;
        }

        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }

        /* Badge Styling */
        .badge {
            padding: 0.5em 0.8em;
            font-weight: 500;
            border-radius: 6px;
        }

        .badge-active {
            background-color: var(--success-color);
        }

        .badge-inactive {
            background-color: var(--danger-color);
        }

        .badge-progress {
            background-color: var(--warning-color);
        }

        /* Score Styling */
        .score-pill {
            background-color: var(--primary-color);
            color: white;
            padding: 0.5em 1em;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
            min-width: 60px;
            text-align: center;
        }

        .average-score {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--primary-color);
        }

        /* Progress Bar */
        .progress {
            height: 8px;
            border-radius: 4px;
            background-color: #e9ecef;
            margin-top: 5px;
        }

        .progress-bar {
            background-color: var(--primary-color);
        }

        /* Avatar and Icons */
        .avatar-sm {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 1.2rem;
        }

        .audience-count {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .audience-icon {
            color: var(--primary-color);
        }

        /* Button Styling */
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-outline-danger {
            color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-outline-danger:hover {
            background-color: var(--danger-color);
            color: white;
        }

        /* Summary Cards */
        .summary-card {
            transition: all 0.3s ease;
        }

        .summary-card:hover {
            transform: translateY(-5px);
        }

        /* Fix for DataTables responsive */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Fix for button groups */
        .btn-group {
            display: flex;
            flex-wrap: nowrap;
        }

        /* Fix for mobile view */
        @media (max-width: 767.98px) {
            .card-header {
                flex-direction: column;
                align-items: start !important;
            }

            .card-header button {
                margin-top: 10px;
            }

            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                text-align: left;
                margin-bottom: 10px;
            }

            .dataTables_wrapper .dataTables_filter {
                margin-top: 10px;
            }

            .avatar-sm {
                width: 32px;
                height: 32px;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    @include('layout.navbar')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="page-title fw-bold text-primary">Daftar Kontestan</h2>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow summary-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div
                                    class="avatar-sm bg-primary rounded-circle text-white d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted mb-1">Total Kontestan</p>
                                <h4 class="mb-0">{{ $total_kontestan }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow summary-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div
                                    class="avatar-sm bg-success rounded-circle text-white d-flex align-items-center justify-content-center">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted mb-1">Kontestan Sudah Tampil</p>
                                <h4 class="mb-0">{{ $kontestan_selesai }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow summary-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div
                                    class="avatar-sm bg-danger rounded-circle text-white d-flex align-items-center justify-content-center">
                                    <i class="bi bi-x-circle-fill"></i>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted mb-1">Kontestan Belum Tampil</p>
                                <h4 class="mb-0">{{ $kontestan_belum_selesai }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow summary-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div
                                    class="avatar-sm bg-info rounded-circle text-white d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted mb-1">Total Audiens</p>
                                <h4 class="mb-0">{{ $total_audiens }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-trophy-fill me-2 fs-4"></i>
                            <h5 class="mb-0">Data Kontestan</h5>
                        </div>
                        {{-- <button class="btn btn-light">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Kontestan
                        </button> --}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="contestantsTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kelompok</th>
                                        <th>Status Tampil</th>
                                        <th>Jumlah Audiens</th>
                                        <th>Total Skor</th>
                                        <th>Rata-rata</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kontestans as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_kontestan }}</td>
                                            <td>
                                                @php
                                                    $statusText = '';
                                                    $badgeClass = '';

                                                    if ($item->status_tampil) {
                                                        $statusText = 'Sedang Tampil';
                                                        $badgeClass = 'bg-primary-subtle text-primary';
                                                    } elseif ($item->penilaians->count() > 0) {
                                                        $statusText = 'Sudah Tampil';
                                                        $badgeClass = 'bg-warning-subtle text-warning';
                                                    } else {
                                                        $statusText = 'Belum Tampil';
                                                        $badgeClass = 'bg-danger-subtle text-danger';
                                                    }
                                                @endphp
                                                <span
                                                    class="badge {{ $badgeClass }} fw-semibold px-2 py-1 rounded-pill">
                                                    <i class="bi bi-circle-fill me-1"></i> {{ $statusText }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="audience-count">
                                                    <i class="bi bi-people-fill fs-5 audience-icon"></i>
                                                    <span>{{ $item->penilaians->count() }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="score-pill">{{ $item->penilaians->sum('skor') }}</span>
                                            </td>
                                            <td>
                                                <span class="score-pill">{{ $item->penilaians->avg('skor') ?? 0 }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer bg-light py-3">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="text-muted">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Menampilkan data kontestan yang terdaftar dalam sistem
                                </div>
                            </div>
                            {{-- <div class="col-md-6 text-md-end mt-2 mt-md-0">
                                <button class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-file-earmark-excel me-1"></i>
                                    Export Excel
                                </button>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-file-earmark-pdf me-1"></i>
                                    Export PDF
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#contestantsTable').DataTable({
                language: {
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
                responsive: true,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: -1
                    }
                ]
            });
        });
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'9648b713c0cc40cc',t:'MTc1MzQxNTY1Ny4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
</body>

</html>
