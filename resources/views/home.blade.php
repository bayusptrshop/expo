@include('layout.navbar')
    <h3>Selamat Datang di Expo</h3>
    <p>Berikut adalah daftar peserta:</p>

    @if(session('error'))
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
                        <a href="/sertifikat/{{ $peserta->qr_hash }}" class="btn btn-primary">Download Sertifikat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
