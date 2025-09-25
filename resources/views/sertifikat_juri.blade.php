<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Juri - TechnoVision 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .certificate-card {
            background: white;
            border: 5px solid #gold;
            border-image: linear-gradient(45deg, #FFD700, #FFA500) 1;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: 20px 0;
        }
        .certificate-header {
            text-align: center;
            border-bottom: 3px solid #667eea;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .certificate-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 10px;
        }
        .certificate-subtitle {
            font-size: 1.2rem;
            color: #666;
        }
        .certificate-body {
            text-align: center;
            padding: 30px 0;
        }
        .juri-name {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin: 20px 0;
        }
        .ttd-name {
            font-size: 1.3rem;
            color: #666;
            margin-top: 40px;
        }
        .verification-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
        }
        .qr-code {
            border: 2px solid #667eea;
            border-radius: 10px;
            padding: 10px;
            background: white;
        }
        .verification-url {
            word-break: break-all;
            font-size: 0.9rem;
            color: #666;
        }
        .btn-custom {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            color: white;
        }
        @media print {
            body {
                background: white !important;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="certificate-card">
                    <div class="certificate-header">
                        <div class="certificate-title">
                            <i class="fas fa-certificate me-3"></i>
                            SERTIFIKAT JURI
                        </div>
                        <div class="certificate-subtitle">
                            TechnoVision 2025<br>
                            Universitas Teknologi Digital
                        </div>
                    </div>

                    <div class="certificate-body">
                        <p class="lead mb-4">
                            Dengan ini menyatakan bahwa:
                        </p>
                        
                        <div class="juri-name">
                            {{ $nama_juri }}
                        </div>
                        
                        <p class="lead my-4">
                            Telah berpartisipasi sebagai <strong>JURI</strong> dalam kegiatan<br>
                            <strong>TechnoVision 2025</strong><br>
                            yang diselenggarakan pada tanggal 26 Juli 2025
                        </p>
                        
                        <p class="text-muted">
                            Sertifikat ini diberikan sebagai bentuk apresiasi atas dedikasi dan kontribusi 
                            dalam mensukseskan acara TechnoVision 2025
                        </p>
                        
                        <div class="row mt-5">
                            <div class="col-md-6 text-center">
                                <p class="mb-1">Tanggal Terbit:</p>
                                <strong>{{ now()->format('d F Y') }}</strong>
                            </div>
                            <div class="col-md-6 text-center">
                                <p class="mb-1">Penandatangan:</p>
                                <div class="ttd-name">
                                    <strong>{{ $nama_ttd }}</strong>
                                </div>
                                <div class="mt-3">
                                    <i class="fas fa-signature" style="font-size: 2rem; color: #667eea;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="verification-section no-print">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="mb-3">
                                <i class="fas fa-shield-alt me-2"></i>
                                Verifikasi Sertifikat
                            </h5>
                            <p class="mb-2">
                                <strong>URL Verifikasi:</strong>
                            </p>
                            <div class="verification-url">
                                {{ $verification_url }}
                            </div>
                            <p class="text-muted mt-2 mb-0">
                                Gunakan URL di atas untuk memverifikasi keaslian sertifikat ini
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="qr-code">
                                <div id="qrcode"></div>
                            </div>
                            <small class="text-muted">QR Code Verifikasi</small>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4 no-print">
                    <button onclick="window.print()" class="btn btn-custom me-3">
                        <i class="fas fa-print me-2"></i>
                        Cetak Sertifikat
                    </button>
                    <a href="{{ $verification_url }}" class="btn btn-custom" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>
                        Verifikasi Sertifikat
                    </a>
                </div>

                <div class="text-center mt-3 no-print">
                    <a href="{{ route('sertifikat.juri.form') }}" class="text-decoration-none">
                        <i class="fas fa-arrow-left me-2"></i>
                        Buat Sertifikat Lain
                    </a>
                    <span class="mx-3">|</span>
                    <a href="/" class="text-decoration-none">
                        <i class="fas fa-home me-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
    <script>
        // Generate QR Code
        QRCode.toCanvas(document.getElementById('qrcode'), '{{ $verification_url }}', {
            width: 150,
            height: 150,
            colorDark: '#667eea',
            colorLight: '#ffffff'
        }, function (error) {
            if (error) console.error(error);
            console.log('QR Code generated successfully!');
        });
    </script>
</body>
</html>
