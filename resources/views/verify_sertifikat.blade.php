<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Sertifikat</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .verification-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }
        .verification-icon {
            font-size: 72px;
            margin-bottom: 20px;
        }
        .valid {
            color: #28a745;
        }
        .invalid {
            color: #dc3545;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .participant-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: left;
        }
        .participant-info p {
            margin: 5px 0;
        }
        .status-message {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
        }
        .timestamp {
            color: #6c757d;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="verification-icon">
            @if($valid)
                <span class="valid">✓</span>
            @else
                <span class="invalid">✗</span>
            @endif
        </div>
        
        <h1>Verifikasi Sertifikat</h1>
        
        @if(isset($peserta))
        <div class="participant-info">
            <p><strong>Nama:</strong> {{ $peserta->nama }}</p>
            <p><strong>NIM:</strong> {{ $peserta->nim }}</p>
            <p><strong>Email:</strong> {{ $peserta->email }}</p>
        </div>
        @endif
        
        <div class="status-message">
            {{ $message }}
        </div>
        
        <div class="timestamp">
            Diverifikasi pada: {{ now()->format('d F Y H:i:s') }}
        </div>
    </div>
</body>
</html>