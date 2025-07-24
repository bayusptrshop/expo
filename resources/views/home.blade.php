@extends('layout.app')
@section('content')
    <h3>Selamat Datang di Expo</h3>
    <p>Berikut adalah daftar peserta:</p>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
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
                        <a href="/generateqrcode/{{ $peserta->id }}" class="btn btn-primary btn-sm">Download QR Code</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
