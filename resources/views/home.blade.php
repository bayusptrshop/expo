@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h3 class="display-4 text-primary">Selamat Datang di Expo</h3>
            <p class="lead text-muted">Berikut adalah daftar peserta Expo yang berpartisipasi:</p>
        </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabel Peserta -->
    <div class="card shadow-lg rounded-3">
        <div class="card-header bg-primary text-white text-center py-3">
            <h4>Daftar Peserta</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Peserta</th>
                        <th scope="col">QR Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesertas as $peserta)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $peserta->nama }}</td>
                        <td>
                            <a href="/generateqrcode/{{ $peserta->id }}" class="btn btn-success btn-sm">
                                <i class="bi bi-download"></i> Download QR Code
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
