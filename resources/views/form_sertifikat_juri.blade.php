<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Sertifikat Juri - TechnoVision 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            border-radius: 15px;
            border: 2px solid #e3e6f0;
            padding: 12px 20px;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .alert {
            border-radius: 15px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header bg-transparent text-center py-4">
                        <h2 class="mb-0 text-primary">
                            <i class="fas fa-certificate me-2"></i>
                            Generate Sertifikat Juri
                        </h2>
                        <p class="text-muted mb-0">TechnoVision 2025</p>
                    </div>
                    <div class="card-body p-4">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('sertifikat.juri.generate') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="nama_juri" class="form-label fw-bold">
                                    <i class="fas fa-user-tie me-2"></i>Nama Juri
                                </label>
                                <select class="form-control @error('nama_juri') is-invalid @enderror" 
                                        id="nama_juri" name="nama_juri" required>
                                    <option value="">Pilih Nama Juri</option>
                                    <option value="Dr. Ir. Ahmad Budiman, M.T." 
                                            {{ old('nama_juri') == 'Dr. Ir. Ahmad Budiman, M.T.' ? 'selected' : '' }}>
                                        Dr. Ir. Ahmad Budiman, M.T.
                                    </option>
                                    <option value="Prof. Dr. Siti Nurhaliza, S.T., M.Kom." 
                                            {{ old('nama_juri') == 'Prof. Dr. Siti Nurhaliza, S.T., M.Kom.' ? 'selected' : '' }}>
                                        Prof. Dr. Siti Nurhaliza, S.T., M.Kom.
                                    </option>
                                    <option value="Ir. Budi Santoso, M.T., Ph.D." 
                                            {{ old('nama_juri') == 'Ir. Budi Santoso, M.T., Ph.D.' ? 'selected' : '' }}>
                                        Ir. Budi Santoso, M.T., Ph.D.
                                    </option>
                                </select>
                                @error('nama_juri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="nama_ttd" class="form-label fw-bold">
                                    <i class="fas fa-signature me-2"></i>Nama Penandatangan
                                </label>
                                <select class="form-control @error('nama_ttd') is-invalid @enderror" 
                                        id="nama_ttd" name="nama_ttd" required>
                                    <option value="">Pilih Nama Penandatangan</option>
                                    <option value="Dr. Ir. Ahmad Budiman, M.T." 
                                            {{ old('nama_ttd') == 'Dr. Ir. Ahmad Budiman, M.T.' ? 'selected' : '' }}>
                                        Dr. Ir. Ahmad Budiman, M.T.
                                    </option>
                                    <option value="Prof. Dr. Siti Nurhaliza, S.T., M.Kom." 
                                            {{ old('nama_ttd') == 'Prof. Dr. Siti Nurhaliza, S.T., M.Kom.' ? 'selected' : '' }}>
                                        Prof. Dr. Siti Nurhaliza, S.T., M.Kom.
                                    </option>
                                    <option value="Ir. Budi Santoso, M.T., Ph.D." 
                                            {{ old('nama_ttd') == 'Ir. Budi Santoso, M.T., Ph.D.' ? 'selected' : '' }}>
                                        Ir. Budi Santoso, M.T., Ph.D.
                                    </option>
                                    <option value="Dr. Rektor Universitas" 
                                            {{ old('nama_ttd') == 'Dr. Rektor Universitas' ? 'selected' : '' }}>
                                        Dr. Rektor Universitas
                                    </option>
                                    <option value="Dekan Fakultas Teknik" 
                                            {{ old('nama_ttd') == 'Dekan Fakultas Teknik' ? 'selected' : '' }}>
                                        Dekan Fakultas Teknik
                                    </option>
                                    <option value="Ketua Program Studi" 
                                            {{ old('nama_ttd') == 'Ketua Program Studi' ? 'selected' : '' }}>
                                        Ketua Program Studi
                                    </option>
                                </select>
                                @error('nama_ttd')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-certificate me-2"></i>
                                    Generate Sertifikat
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <a href="/" class="text-decoration-none">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
