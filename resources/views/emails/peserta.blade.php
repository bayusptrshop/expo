<!DOCTYPE html>
<html>
<head>
    <title>QR Code ExpoTechnoVision 2025</title>
</head>
<body>
    <p>Assalamu'alaikum semoga selalu dalam keadaan sehat.</p>

    <p>Info untuk kamu {{ $peserta->nama }},</p>

    <p>berikut ini adalah QR Code dan ID Code yang harus kamu simpan untuk pengambilan sertifikat digital dan absensi kehadiranmu sebagai peserta pada acara ExpoTechnoVision 2025 : Innovation Beyond Code</p>

    <p>ID Code kamu adalah: <strong>{{ $peserta->qr_hash }}</strong>, sedangkan QR Code kamu dilampirkan pada email ini.</p>

    {{-- <p>QR Code dan ID Code tersebut nantinya akan digunakan juga dalam pengambilan sertifikat digital pada link web: {{ config('app.url') }}/certificate/{{ $peserta->qr_hash }}, maka jaga baik-baik pesan email ini.</p> --}}

    <p>Terima kasih & Salam Hormat,<br>
    Sistem Broadcast Panitia Acara FIK UBP Karawang</p>
</body>
</html>
