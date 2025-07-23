<!DOCTYPE html>
<html>
<head>
  <title>Scan QR</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://unpkg.com/html5-qrcode"></script>
</head>
<body class="p-5">
  <h3>Scan QR Code Peserta</h3>
  <div id="reader" style="width:300px;"></div>

  <form id="absenForm" action="/absen" method="POST">
    @csrf
    <input type="hidden" name="qr_hash" id="qr_hash">
  </form>

  <script>
    const scanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
    scanner.render((text) => {
      document.getElementById('qr_hash').value = text;
      document.getElementById('absenForm').submit();
    });
  </script>
</body>
</html>
