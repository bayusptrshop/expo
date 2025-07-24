<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penilaian Peserta</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background-color: #f0f2f5; /* Warna latar belakang lembut */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Font modern */
    }

    .card-modern {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 550px; /* Lebar maksimal card */
    }

    .card-header-modern {
      background-color: #007bff; /* Warna header yang menarik */
      color: white;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      padding: 20px 25px;
      font-size: 1.5rem;
      font-weight: 600;
      text-align: center;
    }

    .card-body {
      padding: 30px 25px;
    }

    .form-label {
      font-weight: 500;
      color: #333333;
      margin-bottom: 8px;
    }

    .form-select {
      border-radius: 8px;
      padding: 10px 15px;
      transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .form-select:focus {
      border-color: #80bdff;
      box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
      padding: 12px 30px;
      font-size: 1.1rem;
      border-radius: 8px;
      transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    }

    .btn-success:hover {
      background-color: #218838;
      border-color: #1e7e34;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card card-modern">
      <div class="card-header card-header-modern">
        Penilaian untuk Peserta: {{ $peserta->nama }}
      </div>
      <div class="card-body">
        <form action="/penilaian" method="POST">
          @csrf
          <input type="hidden" name="qr_hash" value="{{ $peserta->qr_hash }}">

          @foreach($kontestans as $kontestan)
            <div class="mb-4"> <label for="nilai-{{ $kontestan->id }}" class="form-label">{{ $kontestan->nama_kontestan }} ({{ $kontestan->kategori }})</label>
              <select name="nilai[{{ $kontestan->id }}]" id="nilai-{{ $kontestan->id }}" class="form-select" required>
                <option value="">-- Pilih Nilai --</option>
                @for($i = 1; $i <= 5; $i++)
                  <option value="{{ $i }}" {{ (isset($existing[$kontestan->id]) && $existing[$kontestan->id] == $i) ? 'selected' : '' }}>
                    {{ $i }}
                  </option>
                @endfor
              </select>
            </div>
          @endforeach

          <div class="d-grid mt-4"> <button type="submit" class="btn btn-success">Simpan Penilaian</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
