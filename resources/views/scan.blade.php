@include('layout.navbar')
<style>
    <style>body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        background-color: #f0f2f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container-qr {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 400px;
        width: 90%;
    }

    h3 {
        color: #333333;
        margin-bottom: 30px;
        font-weight: 600;
    }

    #reader {
        width: 100% !important;
        max-width: 300px;
        margin: 0 auto;
        border: 2px solid #007bff;
        border-radius: 8px;
        overflow: hidden;
        display: none;
        margin-bottom: 20px;
        /* Tambahkan sedikit margin bawah untuk tombol stop */
    }

    .btn-action {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 1.1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 5px;
        /* Memberi jarak antar tombol */
    }

    .btn-action:hover {
        background-color: #0056b3;
    }

    .btn-stop {
        background-color: #dc3545;
        /* Warna merah untuk tombol stop */
    }

    .btn-stop:hover {
        background-color: #c82333;
    }
</style>
</style>

<body>
    <div class="container-qr">
        <h3>Scan QR Code Peserta</h3>
        <button id="startButton" class="btn-action">Mulai Scan QR</button>
        <div id="reader"></div>
        <button id="stopButton" class="btn-action btn-stop" style="display: none;">Stop Scan QR</button>

        <form id="absenForm" action="/absen" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="qr_hash" id="qr_hash">
        </form>
    </div>

    <script>
        const html5QrCode = new Html5Qrcode("reader");
        const startButton = document.getElementById("startButton");
        const stopButton = document.getElementById("stopButton");
        const readerDiv = document.getElementById("reader");

        const qrCodeConfig = {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            },
            disableFlip: false
        };

        startButton.addEventListener("click", async () => {
            startButton.style.display = "none";
            readerDiv.style.display = "block";
            stopButton.style.display = "inline-block";

            try {
                await html5QrCode.start({
                        facingMode: "environment"
                    },
                    qrCodeConfig,
                    (decodedText) => {
                        document.getElementById('qr_hash').value = decodedText;
                        document.getElementById('absenForm').submit();
                        html5QrCode.stop().catch((err) => console.error(err));
                    },
                    (errorMessage) => {
                        console.warn(errorMessage);
                    }
                );
            } catch (err) {
                console.error(err);
                alert("Gagal mengakses kamera. Pastikan browser Anda mengizinkan akses kamera.");
                startButton.style.display = "block";
                readerDiv.style.display = "none";
                stopButton.style.display = "none";
            }
        });

        stopButton.addEventListener("click", async () => {
            try {
                await html5QrCode.stop();
                readerDiv.style.display = "none";
                stopButton.style.display = "none";
                startButton.style.display = "inline-block";
            } catch (err) {
                console.error(err);
            }
        });

        window.addEventListener('beforeunload', () => {
            if (html5QrCode.isScanning) {
                html5QrCode.stop().catch((err) => console.error(err));
            }
        });
    </script>
</body>

</html>
