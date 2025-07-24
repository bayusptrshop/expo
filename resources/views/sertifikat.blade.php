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
            bottom: 40px;
            right: 60px;
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
            width: 40px;
            height: 40px;
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
            <div class="hologram"></div>

            <div class="certificate-header">
                <h1 class="certificate-title">TechnoVision 2025</h1>
                <h2 class="certificate-subtitle">Innovation Beyond Code</h2>

                {{-- <div class="tech-icon-container">
                    <div class="tech-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 11 4.5h1.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H5V2.5A.5.5 0 0 1 5 2V.5A.5.5 0 0 1 5 0M8.5 12a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </div>
                    <div class="tech-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path
                                d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0m2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0" />
                        </svg>
                    </div>
                    <div class="tech-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg>
                    </div>
                    <div class="tech-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                        </svg>
                    </div>
                    <div class="tech-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855q-.215.403-.395.872c.705.157 1.472.257 2.282.287zM4.249 3.539q.214-.577.481-1.078a7 7 0 0 1 .597-.933A7 7 0 0 0 3.051 3.05q.544.277 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9 9 0 0 1-1.565-.667A6.96 6.96 0 0 0 1.018 7.5zm1.4-2.741a12.3 12.3 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332M8.5 5.09V7.5h2.99a12.3 12.3 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.6 13.6 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696q.18.469.395.872c.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a7 7 0 0 1-.598-.933 9 9 0 0 1-.481-1.079 8.4 8.4 0 0 0-1.198.49 7 7 0 0 0 2.276 1.522zm-1.383-2.964A13.4 13.4 0 0 1 3.508 8.5h-2.49a6.96 6.96 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667m6.728 2.964a7 7 0 0 0 2.275-1.521 8.4 8.4 0 0 0-1.197-.49 9 9 0 0 1-.481 1.078 7 7 0 0 1-.597.933M8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855q.216-.403.395-.872A12.6 12.6 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.96 6.96 0 0 0 14.982 8.5h-2.49a13.4 13.4 0 0 1-.437 3.008M14.982 7.5a6.96 6.96 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461q.266.502.482 1.078a8.4 8.4 0 0 0 1.196-.49 7 7 0 0 0-2.275-1.52c.218.283.418.597.597.932m-.488 1.343a8 8 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z" />
                        </svg>
                    </div>
                </div> --}}
            </div>

            <div class="certificate-body">
                <p class="certificate-intro">This is to certify that</p>
                <div class="certificate-recipient-container">
                    <h3 class="certificate-recipient">{{ $peserta->nama }}</h3>
                </div>
                <p class="certificate-text">
                    has successfully participated in the TechnoVision 2025 conference and demonstrated
                    exceptional knowledge and innovation in the field of emerging technologies,
                    contributing valuable insights to the future of digital transformation.
                </p>
            </div>

            <div class="certificate-footer">
                <div class="signature-container">
                    <div class="signature">Bayu Saputra</div>
                    <div class="signature-line"></div>
                    <div class="signature-title">CONFERENCE CHAIR</div>
                </div>

                <div class="signature-container">
                    <div class="signature">Saputra Bayu</div>
                    <div class="signature-line"></div>
                    <div class="signature-title">TECHNICAL DIRECTOR</div>
                </div>
            </div>

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

            <div class="certificate-date">
                <div class="date-text">JULY 26, 2025</div>
                <div class="location-text">KARAWANG, INDONESIA</div>
            </div>

            <div class="certificate-id">CERT ID: TV2025-8675309</div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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
</body>

</html>
