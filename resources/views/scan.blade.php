@extends('layout.app')

@section('content')
    <div class="qr-scanner-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="scanner-card">
                        <!-- Header with icon -->
                        <div class="scanner-header">
                            <div class="scanner-icon">
                                <i class="bi bi-qr-code-scan"></i>
                            </div>
                            <h2 class="scanner-title">Scan QR Code Peserta</h2>
                            <p class="scanner-subtitle">Arahkan kamera ke QR code peserta untuk melakukan absensi</p>
                        </div>

                        <!-- Scanner body -->
                        <div class="scanner-body">
                            <!-- Status indicator -->
                            <div class="scanner-status" id="scannerStatus">
                                <div class="status-indicator offline">
                                    <span class="status-dot"></span>
                                    <span class="status-text">Kamera tidak aktif</span>
                                </div>
                            </div>

                            <!-- Scanner viewport -->
                            <div class="scanner-viewport">
                                <!-- Scan animation overlay when active -->
                                <div class="scan-overlay" id="scanOverlay">
                                    <div class="scan-line"></div>
                                </div>

                                <!-- Camera view -->
                                <div id="reader" class="reader-container"></div>

                                <!-- Placeholder when camera is off -->
                                <div id="cameraPlaceholder" class="camera-placeholder">
                                    <div class="placeholder-content">
                                        <i class="bi bi-camera"></i>
                                        <p>Klik tombol di bawah untuk memulai scan</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Last scanned result -->
                            {{-- <div class="last-scan" id="lastScan" style="display: none;">
                                <div class="last-scan-header">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <span>QR Code Terdeteksi</span>
                                </div>
                                <div class="last-scan-content" id="lastScanContent">
                                    <!-- Will be filled by JS -->
                                </div>
                            </div> --}}

                            <!-- Control buttons -->
                            <div class="scanner-controls">
                                <button id="startButton" class="btn btn-primary btn-scan">
                                    <i class="bi bi-camera-video-fill me-2"></i>Mulai Scan
                                </button>
                                <button id="stopButton" class="btn btn-danger btn-scan" style="display: none;">
                                    <i class="bi bi-stop-fill me-2"></i>Hentikan Scan
                                </button>
                            </div>

                            <!-- Manual input option -->
                            {{-- <div class="manual-input">
                            <div class="divider">
                                <span>atau</span>
                            </div>
                            <form id="manualForm" action="/absen" method="POST" class="manual-form">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan kode QR secara manual" name="manual_qr_hash">
                                    <button class="btn btn-outline-primary" type="submit">
                                        <i class="bi bi-send"></i>
                                    </button>
                                </div>
                            </form>
                        </div> --}}
                        </div>

                        <!-- Hidden form for submission -->
                        <form id="absenForm" action="/absen" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="qr_hash" id="qr_hash">
                        </form>
                    </div>

                    <!-- Help card -->
                    <div class="help-card">
                        <div class="help-header">
                            <i class="bi bi-info-circle"></i>
                            <span>Bantuan</span>
                        </div>
                        <div class="help-content">
                            <ul class="help-list">
                                <li>Pastikan QR code terlihat jelas dan tidak rusak</li>
                                <li>Posisikan QR code di tengah area pemindaian</li>
                                <li>Pastikan pencahayaan cukup terang</li>
                                {{-- <li>Jika gagal, coba masukkan kode QR secara manual</li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- QR Code Scanner Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>

    <style>
        /* Custom Styling */
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --primary-dark: #3a0ca3;
            --success: #2ecc71;
            --danger: #e74c3c;
            --warning: #f39c12;
            --dark: #212529;
            --light: #f8f9fa;
            --gray: #6c757d;
            --gray-light: #e9ecef;
            --border-radius: 16px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .qr-scanner-container {
            padding: 3rem 1rem;
            background-color: #f8f9fa;
            min-height: calc(100vh - 56px);
            /* Adjust based on your navbar height */
        }

        .scanner-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            margin-bottom: 1.5rem;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .scanner-header {
            text-align: center;
            padding: 2.5rem 2rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .scanner-icon {
            background-color: rgba(255, 255, 255, 0.2);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .scanner-icon i {
            font-size: 2.5rem;
        }

        .scanner-title {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .scanner-subtitle {
            opacity: 0.9;
            max-width: 80%;
            margin: 0 auto;
        }

        .scanner-body {
            padding: 2rem;
        }

        .scanner-status {
            margin-bottom: 1.5rem;
        }

        .status-indicator {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            background-color: var(--gray-light);
        }

        .status-indicator.online {
            background-color: rgba(46, 204, 113, 0.15);
            color: var(--success);
        }

        .status-indicator.offline {
            background-color: rgba(231, 76, 60, 0.15);
            color: var(--danger);
        }

        .status-indicator.scanning {
            background-color: rgba(243, 156, 18, 0.15);
            color: var(--warning);
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: currentColor;
            margin-right: 8px;
            position: relative;
        }

        .status-indicator.online .status-dot::after,
        .status-indicator.scanning .status-dot::after {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border-radius: 50%;
            background-color: currentColor;
            opacity: 0.4;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.5);
                opacity: 0.4;
            }

            50% {
                transform: scale(1);
                opacity: 0.2;
            }

            100% {
                transform: scale(0.5);
                opacity: 0.4;
            }
        }

        .scanner-viewport {
            position: relative;
            width: 100%;
            height: 300px;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 1.5rem;
            background-color: var(--gray-light);
            border: 2px solid var(--gray-light);
        }

        .scan-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
            display: none;
            pointer-events: none;
        }

        .scan-line {
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: rgba(67, 97, 238, 0.7);
            box-shadow: 0 0 8px var(--primary);
            top: 0;
            animation: scanAnimation 2s linear infinite;
        }

        @keyframes scanAnimation {
            0% {
                top: 0;
            }

            50% {
                top: 100%;
            }

            100% {
                top: 0;
            }
        }

        .reader-container {
            width: 100%;
            height: 100%;
        }

        /* Override some html5-qrcode library styles */
        #reader {
            border: none !important;
            box-shadow: none !important;
        }

        #reader video {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }

        #reader__scan_region {
            min-height: unset !important;
        }

        #reader__scan_region img {
            display: none !important;
        }

        #reader__dashboard {
            margin-top: 0 !important;
        }

        #reader__dashboard_section_csr button {
            display: none !important;
        }

        #reader__dashboard_section_swaplink {
            display: none !important;
        }

        #reader__dashboard_section_fsr input[type="file"] {
            display: none !important;
        }

        .camera-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--gray-light);
            z-index: 5;
        }

        .placeholder-content {
            text-align: center;
            color: var(--gray);
        }

        .placeholder-content i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        .scanner-controls {
            margin-bottom: 1.5rem;
        }

        .btn-scan {
            width: 100%;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-scan:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .last-scan {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--success);
        }

        .last-scan-header {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .last-scan-header i {
            margin-right: 0.5rem;
        }

        .last-scan-content {
            font-family: monospace;
            word-break: break-all;
            background-color: white;
            padding: 0.5rem;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }

        .manual-input {
            margin-top: 1.5rem;
        }

        .divider {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #dee2e6;
        }

        .divider span {
            position: relative;
            background-color: white;
            padding: 0 1rem;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .manual-form .input-group {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .manual-form .form-control {
            border-right: none;
            padding: 0.75rem 1rem;
        }

        .manual-form .form-control:focus {
            box-shadow: none;
        }

        .manual-form .btn {
            border-left: none;
        }

        .help-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            animation: fadeIn 0.5s ease-out 0.2s both;
        }

        .help-header {
            padding: 1rem 1.5rem;
            background-color: #f8f9fa;
            font-weight: 600;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
        }

        .help-header i {
            margin-right: 0.5rem;
            color: var(--primary);
        }

        .help-content {
            padding: 1.5rem;
        }

        .help-list {
            padding-left: 1.5rem;
            margin-bottom: 0;
        }

        .help-list li {
            margin-bottom: 0.5rem;
        }

        .help-list li:last-child {
            margin-bottom: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .scanner-header {
                padding: 2rem 1rem;
            }

            .scanner-icon {
                width: 60px;
                height: 60px;
                margin-bottom: 1rem;
            }

            .scanner-icon i {
                font-size: 1.75rem;
            }

            .scanner-body {
                padding: 1.5rem;
            }

            .scanner-viewport {
                height: 250px;
            }

            .scanner-subtitle {
                max-width: 100%;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const html5QrCode = new Html5Qrcode("reader");
            const startButton = document.getElementById("startButton");
            const stopButton = document.getElementById("stopButton");
            const readerDiv = document.getElementById("reader");
            const cameraPlaceholder = document.getElementById("cameraPlaceholder");
            const scanOverlay = document.getElementById("scanOverlay");
            const scannerStatus = document.getElementById("scannerStatus");
            // const lastScan = document.getElementById("lastScan");
            // const lastScanContent = document.getElementById("lastScanContent");

            // QR Code configuration
            const qrCodeConfig = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            };

            // Update scanner status
            function updateStatus(status) {
                let statusHTML = '';

                switch (status) {
                    case 'offline':
                        statusHTML = `
                    <div class="status-indicator offline">
                        <span class="status-dot"></span>
                        <span class="status-text">Kamera tidak aktif</span>
                    </div>
                    `;
                        break;
                    case 'online':
                        statusHTML = `
                    <div class="status-indicator online">
                        <span class="status-dot"></span>
                        <span class="status-text">Kamera aktif</span>
                    </div>
                    `;
                        break;
                    case 'scanning':
                        statusHTML = `
                    <div class="status-indicator scanning">
                        <span class="status-dot"></span>
                        <span class="status-text">Memindai QR Code...</span>
                    </div>
                    `;
                        break;
                }

                scannerStatus.innerHTML = statusHTML;
            }

            // Start scanning
            startButton.addEventListener("click", async () => {
                startButton.style.display = "none";
                stopButton.style.display = "block";
                cameraPlaceholder.style.display = "none";
                scanOverlay.style.display = "block";
                // lastScan.style.display = "none";

                updateStatus('scanning');

                try {
                    await html5QrCode.start({
                            facingMode: "environment"
                        },
                        qrCodeConfig,
                        (decodedText) => {
                            // Success callback
                            console.log(`QR Code detected: ${decodedText}`);

                            // Show last scanned result
                            // lastScanContent.textContent = decodedText;
                            // lastScan.style.display = "block";

                            // Submit form
                            document.getElementById('qr_hash').value = decodedText;
                            saveToDatabase();

                            // Reset the scanning overlay for the next scan
                            scanOverlay.style.display = "block"; // Keep showing scan overlay

                        },
                        (errorMessage) => {
                            // Error callback
                            console.warn(errorMessage);
                        }
                    ).then(() => {
                        updateStatus('online');
                    });

                } catch (err) {
                    console.error(err);
                    alert(
                        "Gagal mengakses kamera. Pastikan browser Anda mengizinkan akses kamera dan perangkat Anda memiliki kamera."
                    );

                    // Reset UI
                    startButton.style.display = "block";
                    stopButton.style.display = "none";
                    cameraPlaceholder.style.display = "flex";
                    scanOverlay.style.display = "none";
                    updateStatus('offline');
                }
            });

            // Stop scanning
            stopButton.addEventListener("click", async () => {
                try {
                    await html5QrCode.stop();

                    // Reset UI
                    stopButton.style.display = "none";
                    startButton.style.display = "block";
                    cameraPlaceholder.style.display = "flex";
                    scanOverlay.style.display = "none";
                    updateStatus('offline');
                } catch (err) {
                    console.error(err);
                }
            });

            // Clean up when leaving the page
            window.addEventListener('beforeunload', () => {
                if (html5QrCode.isScanning) {
                    html5QrCode.stop().catch((err) => console.error(err));
                }
            });

            // Initial status
            updateStatus('offline');
        });

        function saveToDatabase() {
            $.ajax({
                url: "/api/absen",
                method: "POST",
                data: {
                    qr_hash: document.getElementById('qr_hash').value
                }
            }).done((data) => {
                toastr.success(data.message);
            }).fail((error) => {
                toastr.error(error.responseJSON.message);
            });
        }
    </script>
@endsection
