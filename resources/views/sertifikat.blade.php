<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sertifikat Peserta</title>
    <style>
        @page {
            size: A4 landscape; /* Sertifikat horizontal A4 */
            margin: 0;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif; /* Tetap pakai DejaVu Sans untuk kompatibilitas PDF */
            margin: 0;
            padding: 0;
            background-color: #f8f8f8; /* Latar belakang dasar lembut */
            box-sizing: border-box;
            position: relative;
            width: 297mm; /* Lebar A4 Landscape */
            height: 210mm; /* Tinggi A4 Landscape */
            overflow: hidden; /* Pastikan tidak ada scrollbar */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #333;
            background-image: url('{{ public_path("sertifikat-background.png") }}'); /* Sesuaikan path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Overlays untuk sentuhan modern */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7); /* Transparansi putih lembut */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px; /* Padding untuk konten */
            box-sizing: border-box;
        }

        .header-section {
            width: 100%;
            margin-bottom: 20px;
        }

        .event-logo {
            max-width: 150px; /* Sesuaikan ukuran logo */
            margin-bottom: 15px;
        }

        .judul {
            font-size: 38px; /* Lebih besar dan menonjol */
            font-weight: bold;
            color: #0056b3; /* Biru yang lebih kuat untuk judul utama */
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .sub-judul {
            font-size: 20px;
            color: #555;
            margin-bottom: 30px;
        }

        .content-section {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 50px; /* Padding horizontal */
        }

        .diberikan-kepada {
            font-size: 18px;
            color: #666;
            margin-bottom: 5px;
        }

        .nama {
            font-size: 48px; /* Ukuran lebih besar untuk nama */
            font-weight: bold;
            color: #007bff; /* Warna biru cerah */
            margin: 15px 0;
            text-transform: capitalize; /* Kapitalkan setiap kata */
            letter-spacing: 1px;
            border-bottom: 2px solid #007bff; /* Garis bawah elegan */
            padding-bottom: 5px;
            display: inline-block; /* Agar border-bottom hanya sepanjang teks */
        }

        .isi {
            font-size: 20px;
            line-height: 1.6;
            color: #444;
            max-width: 700px; /* Batasi lebar teks isi */
            margin: 20px auto 40px auto;
        }

        .ttd-section {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: flex-end; 
            margin-top: auto;
            padding: 0 50px;
            box-sizing: border-box;
        }

        .ttd-block {
            text-align: center;
            width: 45%;
        }

        .ttd-text {
            font-size: 16px;
            color: #555;
            margin-bottom: 5px;
        }

        .signature-line {
            border-bottom: 1px solid #777;
            margin-top: 50px;
            padding-bottom: 5px;
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }

        .posisi {
            font-size: 15px;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="header-section">
            {{-- <img src="{{ public_path('logo-expo.png') }}" alt="Logo Expo" class="event-logo"> --}}
            <div class="judul">SERTIFIKAT PENGHARGAAN</div>
            <div class="sub-judul">Sebagai Apresiasi atas Partisipasi dalam</div>
        </div>

        <div class="content-section">
            <div class="diberikan-kepada">Diberikan Kepada</div>
            <div class="nama">
                {{ $peserta->nama }}
            </div>
            <div class="isi">
                Atas partisipasi aktif dan kontribusinya dalam kegiatan **EXPO INOVASI & KREATIVITAS TEKNIK INFORMATIKA**, yang diselenggarakan pada tanggal 23 Juli 2025. Terima kasih atas dedikasinya.
            </div>
        </div>

        <div class="ttd-section">
            <div class="ttd-block">
                <div class="ttd-text">Tana Tidung, 23 Juli 2025</div>
                <div class="signature-line">Ketua Panitia</div>
                <div class="posisi">[Nama Lengkap Ketua Panitia]</div>
            </div>
            <div class="ttd-block">
                <div class="ttd-text"></div> {{-- Kosongkan untuk keselarasan jika tidak ada tanggal kedua --}}
                <div class="signature-line">Kepala Program Studi Teknik Informatika</div>
                <div class="posisi">[Nama Lengkap Kaprodi]</div>
            </div>
        </div>
    </div>
</body>
</html>
