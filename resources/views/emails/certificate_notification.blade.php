<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .header { background-color: #f8f9fa; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        /* .footer { margin-top: 20px; padding: 10px; text-align: center; color: #6c757d; } */
        .btn-download {
            display: inline-block;
            padding: 12px 24px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="content">
        <p>Yth. {{ $participant->nama }},</p>

        <p>Terima kasih telah berpartisipasi dalam TechnoVision 2025. Bersama ini kami lampirkan sertifikat partisipasi Anda.</p>

        <h3>Detail Peserta:</h3>
        <ul>
            <li><strong>Nama:</strong> {{ $participant->nama }}</li>
            <li><strong>NIM:</strong> {{ $participant->nim }}</li>
            <li><strong>Email:</strong> {{ $participant->email }}</li>
        </ul>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} TechnoVision 2025. All rights reserved.</p>
    </div>
</body>
</html>
