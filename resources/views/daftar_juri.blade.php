<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Juri - TechnoVision 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .main-container {
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
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .event-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
        }
        .main-content {
            padding: 3rem;
        }
        .juri-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .juri-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
        .juri-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        .juri-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        .juri-bidang {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .juri-number {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .btn-verify {
            background: linear-gradient(135deg, #28a745, #20c997);
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
        .btn-verify:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(40, 167, 69, 0.4);
            color: white;
        }
        .btn-back {
            background: linear-gradient(135deg, #6c757d, #495057);
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
            box-shadow: 0 8px 15px rgba(108, 117, 125, 0.4);
            color: white;
        }
        .info-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 4px solid #667eea;
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
                <div class="main-container">
                    <div class="header-section">
                        <div class="header-content">
                            <div class="university-logo">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="event-title">Dewan Juri</div>
                            <div class="event-subtitle">Expo Mahasiswa 2025 - Universitas Buana Perjuangan Karawang</div>
                        </div>
                    </div>

                    <div class="main-content">
                        <div class="info-section">
                            <h5 class="text-primary mb-3">
                                <i class="fas fa-info-circle me-2"></i>
                                Tentang Dewan Juri
                            </h5>
                            <p class="mb-0">
                                Berikut adalah dewan juri yang berkompeten dan berpengalaman dalam menilai 
                                proyek-proyek mahasiswa di Expo Mahasiswa 2025. Klik tombol "Verifikasi" 
                                untuk melihat ucapan terima kasih atas dedikasi masing-masing juri.
                            </p>
                        </div>

                        @foreach($juris as $juri)
                        <div class="juri-card">
                            <div class="juri-number">{{ $juri['id'] }}</div>
                            <div class="juri-name">{{ $juri['nama'] }}</div>
                            <div class="juri-bidang">
                                <i class="fas fa-microscope me-2"></i>
                                {{ $juri['bidang'] }}
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">
                                        <i class="fas fa-award me-1"></i>
                                        Juri Expo Mahasiswa 2025
                                    </small>
                                </div>
                                <a href="{{ route('juri.verify', $juri['id']) }}" class="btn-verify">
                                    <i class="fas fa-heart me-2"></i>
                                    Ucapan Terima Kasih
                                </a>
                            </div>
                        </div>
                        @endforeach

                        <div class="text-center mt-4">
                            <div class="alert alert-info">
                                <i class="fas fa-lightbulb me-2"></i>
                                <strong>Info:</strong> Klik "Ucapan Terima Kasih" untuk melihat apresiasi 
                                dari Program Studi dan Dekan atas dedikasi setiap juri dalam Expo Mahasiswa 2025.
                            </div>
                        </div>
                    </div>

                    <div class="footer-section">
                        <a href="/" class="btn-back mb-3">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali ke Beranda
                        </a>
                        
                        <div class="text-muted small">
                            <i class="fas fa-calendar me-1"></i>
                            Expo Mahasiswa 2025<br>
                            <i class="fas fa-university me-1"></i>
                            Universitas Buana Perjuangan Karawang
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
