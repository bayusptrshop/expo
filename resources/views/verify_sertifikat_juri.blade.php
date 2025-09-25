<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Juri - Expo TechnoVision 2025</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .verification-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            margin: 2rem auto;
        }

        .header-section {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="60" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .university-logo {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
        }

        .event-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .event-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .main-content {
            padding: 3rem;
        }

        .status-section {
            text-align: center;
            margin-bottom: 3rem;
        }

        .status-icon {
            font-size: 5rem;
            margin-bottom: 1rem;
        }

        .status-valid {
            color: #28a745;
            animation: pulse 2s infinite;
        }

        .status-invalid {
            color: #dc3545;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .juri-profile {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 15px;
            padding: 2rem;
            border-left: 5px solid #667eea;
            margin: 2rem 0;
        }

        .juri-name {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .detail-row {
            display: flex;
            margin-bottom: 0.8rem;
            align-items: flex-start;
        }

        .detail-label {
            font-weight: 600;
            color: #495057;
            min-width: 140px;
            display: flex;
            align-items: center;
        }

        .detail-value {
            color: #343a40;
            flex: 1;
        }

        .verification-badge {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }

        .info-box {
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem 0;
        }

        .scan-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 2rem;
            border: 2px dashed #dee2e6;
        }

        .btn-back {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .footer-section {
            background: #f8f9fa;
            padding: 2rem;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="verification-container">
                    <div class="header-section">
                        <div class="header-content">
                            <div class="university-logo">
                                <img src="{{ asset('img/logo-expo.jpg') }}" alt="Logo UBP Karawang" class="logo-auth"
                                        loading="lazy" style="width: 100%; height: 100%; object-fit: contain; border-radius: 50%;">
                            </div>
                            <div class="event-title">Panitia Expo TechnoVision 2025</div>
                            <div class="event-subtitle">Universitas Buana Perjuangan Karawang</div>
                        </div>
                    </div>

                    <div class="main-content">
                        @if ($valid && $juri_info)

                            <div class="text-center mb-4">
                                <h3 class="text-primary mb-4">
                                    Ucapan Terima Kasih
                                </h3>
                                <p class="lead mb-4">
                                    Kepada Yth. <strong>{{ $juri_info['nama'] }}</strong><br>
                                    <em>{{ $juri_info['jabatan'] }}</em>
                                </p>

                                <div class="alert alert-success mx-auto" style="max-width: 600px;">
                                    <h5 class="alert-heading">
                                        <i class="fas fa-hands-helping me-2"></i>
                                        Terima Kasih Atas Dedikasi Bapak
                                    </h5>
                                    <hr>
                                    <p class="mb-3">
                                        Atas nama Program Studi <strong>Teknik Informatika dan Sistem Informasi</strong>
                                        dan <strong>Dekan Fakultas Ilmu Komputer</strong>,
                                        kami mengucapkan terima kasih yang sebesar-besarnya atas dedikasi
                                        Bapak sebagai juri dalam acara <strong>Expo TechnoVision 2025</strong>
                                        di <strong>Universitas Buana Perjuangan Karawang</strong>.
                                    </p>
                                    <p class="mb-0">
                                        Kontribusi Bapak sangat berharga dalam mensukseskan acara ini
                                        dan memberikan pengalaman belajar yang tak ternilai bagi mahasiswa kami.
                                    </p>
                                </div>

                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        Expo TechnoVision 2025 - Universitas Buana Perjuangan Karawang<br>
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $scan_time }}
                                    </small>
                                </div>
                            </div>
                        @else
                            <div class="status-section">
                                <div class="status-icon status-invalid">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    {{ $message }}
                                </div>

                                <div class="mt-2">
                                    <h5>QR Code Tidak Valid</h5>
                                    <p class="text-muted">
                                        QR Code yang Anda scan tidak terdaftar dalam sistem TechnoVision 2025
                                        atau format QR tidak sesuai.
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="footer-section">

                        <div class="text-muted small mt-2">
                            <i class="fas fa-shield-alt me-1"></i>
                            Sistem verifikasi resmi TechnoVision 2025<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
