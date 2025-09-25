<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat TechnoVision 2025</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        .email-header {
            background-color: #2c3e50;
            padding: 20px;
            text-align: left;
        }
        .email-header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }
        .email-body {
            padding: 30px;
        }
        .email-footer {
            padding: 20px;
            background-color: #f5f5f5;
            font-size: 12px;
            color: #777777;
            border-top: 1px solid #eeeeee;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            margin: 15px 0;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #2980b9;
        }
        .logo {
            max-width: 180px;
            height: auto;
        }
        .divider {
            height: 1px;
            background-color: #eeeeee;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>TechnoVision 2025</h1>
        </div>

        <div class="email-body">
            <p>Halo <strong>{{ $participant->nama }}</strong>,</p>

            <p>Terima kasih telah berpartisipasi dalam TechnoVision 2025. Berikut adalah sertifikat partisipasi Anda:</p>

            <div style="margin: 25px 0;">
                <a href="{{ $certificateUrl }}" class="button">
                    Lihat Sertifikat Saya
                </a>
            </div>

            <div class="divider"></div>
        </div>

        <div class="email-footer">
            <p style="margin: 0;">Panitia TechnoVision 2025<br>
            Universitas Buana Perjuangan Karawang<br>
            <small>Email ini dikirim otomatis, mohon tidak membalas</small></p>
        </div>
    </div>
</body>
</html>
