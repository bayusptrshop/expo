@extends('layout.app')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg p-4">
                <h3 class="card-title text-center mb-4">Scan QR Code Peserta</h3>
                <div class="card-body text-center">
                    <button id="startButton" class="btn btn-primary btn-lg mb-3 w-100">Mulai Scan QR</button>
                    <div id="reader" style="width: 100%; display: none;"></div>
                    <button id="stopButton" class="btn btn-danger btn-lg mt-3 w-100" style="display: none;">Stop Scan QR</button>

                    <form id="absenForm" action="/absen" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="qr_hash" id="qr_hash">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
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
        stopButton.style.display = "block";

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
            alert("Gagal mengakses kamera. Pastikan browser Anda mengizinkan akses kamera dan perangkat Anda memiliki kamera.");
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
            startButton.style.display = "block";
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
@endsection
