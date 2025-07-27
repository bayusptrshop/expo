<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechnoVision 2025: Innovation Beyond Code - Certificate</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #0066ff;
            --secondary: #6610f2;
            --accent: #00c9ff;
            --dark: #333333;
            --light: #ffffff;
        }

        body {
            background-color: #f0f0f0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: var(--dark);
            margin: 0;
        }

        .certificate-container {
            width: 100%;
            max-width: 1000px;
            position: relative;
            /* Set a fixed aspect ratio for better print consistency */
            aspect-ratio: 1.414 / 1;
            /* A4 aspect ratio */
        }

        .certificate {
            background: var(--light);
            border: 2px solid var(--primary);
            border-radius: 15px;
            padding: 40px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 102, 255, 0.2);
            overflow: hidden;
            z-index: 1;
            height: 100%;
            box-sizing: border-box;
        }

        /* Tech background elements */
        .tech-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.07;
        }

        .circuit-line {
            position: absolute;
            background: var(--primary);
            opacity: 0.5;
        }

        .circuit-line-1 {
            top: 50px;
            left: 0;
            width: 100%;
            height: 1px;
        }

        .circuit-line-2 {
            top: 0;
            left: 150px;
            width: 1px;
            height: 100%;
        }

        .circuit-line-3 {
            bottom: 80px;
            right: 0;
            width: 70%;
            height: 1px;
        }

        .circuit-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--primary);
            box-shadow: 0 0 10px var(--primary);
        }

        .circuit-dot-1 {
            top: 50px;
            left: 150px;
        }

        .circuit-dot-2 {
            bottom: 80px;
            right: 30%;
        }

        .circuit-dot-3 {
            top: 30%;
            right: 50px;
        }

        .circuit-node {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 1px solid var(--primary);
            border-radius: 50%;
            opacity: 0.5;
        }

        .circuit-node-1 {
            top: 100px;
            right: 100px;
        }

        .circuit-node-2 {
            bottom: 150px;
            left: 80px;
        }

        .grid-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(0, 102, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 102, 255, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
            z-index: -1;
        }

        .certificate-header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            margin-top: -50px;
        }

        .certificate-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            color: var(--primary);
            font-size: 3rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 0 2px 4px rgba(0, 102, 255, 0.2);
        }

        .certificate-subtitle {
            color: var(--secondary);
            font-weight: 500;
            font-size: 1.5rem;
            margin-bottom: 20px;
            letter-spacing: 2px;
            position: relative;
            display: inline-block;
        }

        .certificate-subtitle::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--primary), transparent);
        }

        .certificate-body {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            z-index: 2;
        }

        .certificate-intro {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .certificate-recipient-container {
            position: relative;
            margin: 30px 0;
        }

        .certificate-recipient {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            display: inline-block;
            padding: 0 30px 5px;
            margin-bottom: 20px;
            position: relative;
            /* cursor: pointer; */
            transition: all 0.3s ease;
        }

        .certificate-text {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--dark);
            margin: 30px auto;
            max-width: 80%;
        }

        .certificate-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
            position: relative;
        }

        .signature-container {
            text-align: center;
            flex: 1;
            padding: 0 20px;
            position: relative;
        }

        .signature {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.3rem;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .signature-line {
            width: 80%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--primary), transparent);
            margin: 0 auto 10px;
        }

        .signature-title {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--primary);
            letter-spacing: 1px;
        }

        .certificate-seal {
            position: absolute;
            bottom: 10px;
            right: 20px;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .seal-circle {
            width: 100%;
            height: 100%;
            border: 2px solid var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 0 15px rgba(0, 102, 255, 0.2);
        }

        .seal-circle::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 50%;
            background: conic-gradient(transparent 0deg,
                    transparent 67.5deg,
                    var(--primary) 67.5deg,
                    var(--primary) 90deg,
                    transparent 90deg,
                    transparent 157.5deg,
                    var(--primary) 157.5deg,
                    var(--primary) 180deg,
                    transparent 180deg,
                    transparent 247.5deg,
                    var(--primary) 247.5deg,
                    var(--primary) 270deg,
                    transparent 270deg,
                    transparent 337.5deg,
                    var(--primary) 337.5deg,
                    var(--primary) 360deg);
            opacity: 0.3;
            z-index: -1;
        }

        .seal-inner {
            width: 85%;
            height: 85%;
            border: 1px solid var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .seal-text {
            font-family: 'Orbitron', sans-serif;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--primary);
            text-align: center;
            letter-spacing: 1px;
        }

        .certificate-date {
            position: absolute;
            bottom: 40px;
            left: 60px;
            text-align: center;
        }

        .date-text {
            font-size: 1rem;
            font-weight: 500;
            color: var(--primary);
            letter-spacing: 1px;
        }

        .location-text {
            font-size: 0.9rem;
            color: var(--dark);
        }

        .certificate-id {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 0.8rem;
            color: #777;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
        }

        .tech-icon-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }

        .tech-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--primary);
            border-radius: 50%;
            color: var(--primary);
            font-size: 1.2rem;
            position: relative;
            overflow: hidden;
        }

        .tech-icon img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }


        .tech-icon::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0, 102, 255, 0.2) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .hologram {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 102, 255, 0.1), rgba(102, 16, 242, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hologram::before {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: conic-gradient(transparent 0deg,
                    rgba(0, 102, 255, 0.3) 72deg,
                    transparent 90deg,
                    transparent 180deg,
                    rgba(102, 16, 242, 0.3) 252deg,
                    transparent 270deg,
                    transparent 360deg);
        }

        .hologram::after {
            content: '2025';
            font-family: 'Orbitron', sans-serif;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--primary);
            z-index: 1;
        }

        .border-effect {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 15px;
            pointer-events: none;
            background: linear-gradient(45deg,
                    transparent 0%,
                    transparent 40%,
                    rgba(0, 102, 255, 0.1) 45%,
                    rgba(0, 102, 255, 0.1) 55%,
                    transparent 60%,
                    transparent 100%);
            background-size: 200% 200%;
        }

        .tech-decoration {
            position: absolute;
            opacity: 0.05;
            z-index: -1;
        }

        .tech-decoration-1 {
            top: 10%;
            left: 5%;
            width: 150px;
            height: 150px;
            border: 1px solid var(--primary);
            border-radius: 50%;
        }

        .tech-decoration-2 {
            bottom: 15%;
            right: 8%;
            width: 100px;
            height: 100px;
            border: 1px solid var(--secondary);
            transform: rotate(45deg);
        }

        /* Print-specific styles */
        @media print {
            @page {
                size: A4 landscape;
                /* Use landscape for certificates */
                margin: 0;
            }

            html,
            body {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                background-color: white;
            }

            body {
                display: block;
            }

            .certificate-container {
                width: 100%;
                height: 100%;
                max-width: none;
                padding: 0;
                margin: 0;
                box-shadow: none;
                page-break-inside: avoid;
            }

            .certificate {
                border-radius: 0;
                box-shadow: none;
                height: 100vh;
                width: 100vw;
                padding: 2cm;
                box-sizing: border-box;
            }

            /* Ensure all animations are disabled for print */
            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
                box-shadow: none !important;
                text-shadow: none !important;
            }

            /* Ensure background elements print */
            .tech-bg,
            .grid-pattern,
            .circuit-line,
            .circuit-dot,
            .circuit-node {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* Adjust font sizes for print */
            .certificate-title {
                font-size: 36pt;
            }

            .certificate-subtitle {
                font-size: 18pt;
            }

            .certificate-recipient {
                font-size: 30pt;
            }

            .certificate-text {
                font-size: 12pt;
            }

            .signature {
                font-size: 14pt;
            }

            .signature-title {
                font-size: 10pt;
            }

            /* Ensure absolute positioned elements print correctly */
            .certificate-seal,
            .certificate-date,
            .certificate-id {
                position: absolute;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* Hide interactive elements when printing */
            .certificate-recipient:hover::before,
            .certificate-recipient:hover::after,
            .tech-icon::after {
                display: none;
            }

            /* Remove cursor pointer on print */
            .certificate-recipient {
                cursor: default;
            }
        }

        /* Responsive styles for screens */
        @media screen and (max-width: 768px) {
            .certificate {
                padding: 30px 20px;
            }

            .certificate-title {
                font-size: 2rem;
            }

            .certificate-subtitle {
                font-size: 1.2rem;
            }

            .certificate-recipient {
                font-size: 1.8rem;
            }

            .certificate-text {
                font-size: 1rem;
                max-width: 100%;
            }

            .certificate-footer {
                flex-direction: column;
                gap: 30px;
            }

            .certificate-seal {
                position: relative;
                bottom: auto;
                right: auto;
                margin: 30px auto;
            }

            .certificate-date {
                position: relative;
                bottom: auto;
                left: auto;
                margin: 20px auto;
            }

            .tech-icon {
                width: 30px;
                height: 30px;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="certificate-container">
        <div class="certificate">
            <!-- Tech background elements -->
            <div class="tech-bg">
                <div class="grid-pattern"></div>
                <div class="circuit-line circuit-line-1"></div>
                <div class="circuit-line circuit-line-2"></div>
                <div class="circuit-line circuit-line-3"></div>
                <div class="circuit-dot circuit-dot-1"></div>
                <div class="circuit-dot circuit-dot-2"></div>
                <div class="circuit-dot circuit-dot-3"></div>
                <div class="circuit-node circuit-node-1"></div>
                <div class="circuit-node circuit-node-2"></div>
                <div class="tech-decoration tech-decoration-1"></div>
                <div class="tech-decoration tech-decoration-2"></div>
            </div>

            <div class="border-effect"></div>
            {{-- <div class="hologram"></div> --}}

            <div class="certificate-header">
                <h1 class="certificate-title">TechnoVision 2025</h1>
                <h2 class="certificate-subtitle">Innovation Beyond Code</h2>

                <div class="tech-icon-container">
                    <div class="tech-icon">
                        <img src="{{ asset('logo-dikti.png') }}" alt="tes">
                    </div>
                    <div class="tech-icon">
                        <img src="{{ asset('img/logo-ubp.png') }}" alt="">
                    </div>
                    <div class="tech-icon">
                        <img src="{{ asset('img/logo-expo.jpg') }}" alt="">
                    </div>
                    <div class="tech-icon">
                        <img src="{{ asset('logo-fik.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="certificate-body">
                <p class="certificate-intro">This is to certify that</p>
                <div class="certificate-recipient-container">
                    <h3 class="certificate-recipient">{{ $peserta->nama }}</h3>
                </div>
                <p class="certificate-text">
                    has successfully contributed as an evaluator in the TechnoVision 2025 Expo, organized by the Faculty of <b>Computer Science</b> at <b>Universitas Buana Perjuangan Karawang</b>, held on <b>Saturday, July 26, 2025.</b> Their participation in assessing the contestants demonstrated a strong commitment to academic excellence and the advancement of innovation in the field of emerging technologies.
                </p>
            </div>
            <div class="certificate-footer">
                <div class="signature-container">
                    <div id="qrcode-dekan" class="d-flex justify-content-center mb-2"></div>
                    <div class="signature">Dr. Ahmad Fauzi, M.Kom</div>
                    <div class="signature-line"></div>
                    <div class="signature-title">Dekan Fakultas Ilmu Komputer</div>
                </div>
                <div class="signature-container">
                    <div id="qrcode-kaprodi-if" class="d-flex justify-content-center mb-2"></div>
                    <div class="signature">Jamaludin Indra M.Kom</div>
                    <div class="signature-line"></div>
                    <div class="signature-title">Kaprodi Teknik Informatika</div>
                </div>
                <div class="signature-container">
                    <div id="qrcode-kaprodi-si" class="d-flex justify-content-center mb-2"></div>
                    <div class="signature">Tukino, MMSI</div>
                    <div class="signature-line"></div>
                    <div class="signature-title">Kaprodi Sistem Informasi</div>
                </div>
            </div>

            {{-- <div class="certificate-date">
                <div class="date-text">JULY 26, 2025</div>
                <div class="location-text">KARAWANG, INDONESIA</div>
            </div> --}}
            <div class="certificate-seal">
                <div class="seal-circle">
                    <div class="seal-inner">
                        <div class="seal-text">
                            TECHNOV<br>
                            2025<br>
                            VERIFIED
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="certificate-id">CERT ID: TV2025-8675309</div> --}}
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>


    <!-- Certificate Customization Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Add subtle animation to circuit elements (only for screen display, not print)
            if (!window.matchMedia('print').matches) {
                const circuitDots = document.querySelectorAll('.circuit-dot');
                circuitDots.forEach((dot, index) => {
                    dot.style.animation = `pulse ${2 + index * 0.5}s infinite alternate`;
                });

                // Add hover effect to tech icons (only for screen display)
                const techIcons = document.querySelectorAll('.tech-icon');
                techIcons.forEach(icon => {
                    icon.addEventListener('mouseover', function() {
                        this.style.transform = 'scale(1.1)';
                        this.style.boxShadow = '0 0 10px rgba(0, 102, 255, 0.5)';
                    });

                    icon.addEventListener('mouseout', function() {
                        this.style.transform = 'scale(1)';
                        this.style.boxShadow = 'none';
                    });
                });

                // Add rotation animation to hologram (only for screen display)
                const hologramBefore = document.querySelector('.hologram::before');
                if (hologramBefore) {
                    hologramBefore.style.animation = 'rotate 10s linear infinite';
                }

                // Add border animation (only for screen display)
                const borderEffect = document.querySelector('.border-effect');
                if (borderEffect) {
                    borderEffect.style.animation = 'borderAnimation 4s ease infinite';
                }
            }

            // Add print button functionality
            const printButton = document.createElement('button');
            printButton.textContent = 'Print Certificate';
            printButton.className = 'btn btn-primary position-fixed';
            printButton.style.top = '20px';
            printButton.style.right = '20px';
            printButton.style.zIndex = '1000';
            printButton.addEventListener('click', function() {
                window.print();
            });

            // Only add print button if not in print mode
            if (!window.matchMedia('print').matches) {
                document.body.appendChild(printButton);
            }

            // Hide print button when printing
            window.matchMedia('print').addEventListener('change', function(mql) {
                if (mql.matches) {
                    printButton.style.display = 'none';
                } else {
                    printButton.style.display = 'block';
                }
            });
        });
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'9641f0aa2036fcfe',t:'MTc1MzM0NDYxNi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const pesertaId = "{{ url('/verify-sertifikat/' . $peserta->id) }}";

            new QRCode(document.getElementById("qrcode-dekan"), {
                text: pesertaId,
                width: 60,
                height: 60,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });

            new QRCode(document.getElementById("qrcode-kaprodi-if"), {
                text: pesertaId,
                width: 60,
                height: 60,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });

            new QRCode(document.getElementById("qrcode-kaprodi-si"), {
                text: pesertaId,
                width: 60,
                height: 60,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        });
    </script>


</body>

</html>
