<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sertifikat Peserta</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            box-sizing: border-box;
            position: relative;
            width: 297mm;
            height: 210mm;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #333;
            background-image: url('{{ public_path('background-sertifikat.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            box-sizing: border-box;
        }

        .header-section {
            width: 100%;
            margin-bottom: 30px;
        }

        .event-logo {
            max-width: 150px;
            margin-bottom: 15px;
        }

        .judul {
            font-size: 42px;
            font-weight: 700;
            color: #0056b3;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 15px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .sub-judul {
            font-size: 22px;
            color: #555;
            margin-bottom: 35px;
            font-weight: 600;
        }

        .content-section {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 50px;
        }

        .diberikan-kepada {
            font-size: 20px;
            color: #666;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .nama {
            font-size: 56px;
            font-weight: 800;
            color: #007bff;
            margin: 20px 0;
            text-transform: capitalize;
            letter-spacing: 1px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 8px;
            display: inline-block;
            text-align: center;
        }

        .isi {
            font-size: 22px;
            line-height: 1.8;
            color: #444;
            max-width: 750px;
            margin: 25px auto 50px auto;
            font-weight: 500;
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
            flex: 1;
            text-align: center;
            padding: 0 20px;
        }

        .ttd-kiri,
        .ttd-kanan {
            text-align: center;
        }

        .ttd-text {
            font-size: 18px;
            color: #555;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .signature-line {
            display: inline-block;
            border-bottom: 2px solid #777;
            min-width: 200px;
            padding-bottom: 10px;
            font-weight: 700;
            font-size: 20px;
            color: #333;
            margin-top: 60px;
        }

        .posisi {
            font-size: 16px;
            color: #666;
            margin-top: 8px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="overlay">
        <div class="header-section">
            <div class="judul">SERTIFIKAT PENGHARGAAN</div>
            <div class="sub-judul">Sebagai Apresiasi atas Partisipasi dalam</div>
        </div>

        <div class="content-section">
            <div class="diberikan-kepada">Diberikan Kepada</div>
            <div class="nama">
                {{ $peserta->nama }}
            </div>
            <div class="isi">
                Atas partisipasi aktif dan kontribusinya dalam kegiatan <b>Expo TechnoVision 2025: Innovation Beyond Code</b>, yang diselenggarakan pada tanggal 26 Juli 2025. Terima kasih atas dedikasinya.
            </div>
        </div>

        <div class="ttd-section">
            <div class="ttd-block ttd-kiri">
                <div class="ttd-text">Karawang, 26 Juli 2025</div>
                <div class="signature-line">Ketua Panitia</div>
                <div class="posisi">[Nama Lengkap Ketua Panitia]</div>
            </div>

            <div class="ttd-block ttd-kanan">
                <div class="signature-line">Kepala Program Studi Teknik Informatika</div>
                <div class="posisi">[Nama Lengkap Kaprodi]</div>
            </div>
        </div>
    </div>
</body>

</html>
