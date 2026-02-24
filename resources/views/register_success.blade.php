<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil - AI Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --accent: #06b6d4;
            --success: #22c55e;
            --border-color: #334155;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            background-image:
                radial-gradient(at 50% 0%, rgba(34, 197, 94, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(6, 182, 212, 0.12) 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            padding: 2rem 1rem;
        }

        .success-container {
            position: relative;
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid var(--border-color);
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 480px;
            text-align: center;
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .success-container::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            border-radius: 24px;
            padding: 1px;
            background: linear-gradient(135deg, transparent, rgba(34, 197, 94, 0.3), transparent);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .check-circle {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: rgba(34, 197, 94, 0.1);
            border: 2px solid var(--success);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: popIn 0.4s 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }

        h1 {
            background: linear-gradient(135deg, #4ade80, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
        }

        .desc {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        .info-box {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1.5rem;
            text-align: left;
            margin-bottom: 2rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.6rem 0;
        }

        .info-row+.info-row {
            border-top: 1px solid rgba(51, 65, 85, 0.5);
        }

        .info-label {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .info-value {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        .info-value.password {
            color: var(--accent);
            font-family: 'Courier New', monospace;
            letter-spacing: 0.05em;
            background: rgba(6, 182, 212, 0.1);
            padding: 4px 10px;
            border-radius: 6px;
        }

        .copy-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: var(--text-secondary);
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .copy-btn:hover {
            background: rgba(6, 182, 212, 0.1);
            border-color: var(--accent);
            color: var(--accent);
            transform: scale(1.05);
        }

        .copy-btn:active {
            transform: scale(0.95);
        }

        .warning-note {
            background: rgba(245, 158, 11, 0.08);
            border: 1px solid rgba(245, 158, 11, 0.2);
            border-radius: 10px;
            padding: 0.8rem 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.78rem;
            color: #fbbf24;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            text-align: left;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 12px;
            border: none;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: inherit;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            color: white;
            box-shadow: 0 4px 14px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(59, 130, 246, 0.4);
        }

        .btn-ghost {
            background: transparent;
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
            margin-left: 0.5rem;
        }

        .btn-ghost:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
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

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <div class="success-container">
        <div class="check-circle">
            <svg width="36" height="36" fill="none" stroke="#22c55e" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1>Registrasi Berhasil!</h1>
        <p class="desc">Akun siswa telah berhasil dibuat di platform AI Learning.</p>

        <div class="info-box">
            <div class="info-row">
                <span class="info-label">Nama</span>
                <span class="info-value">{{ session('reg_nama') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Username</span>
                <span class="info-value">{{ session('reg_username') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Password</span>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span class="info-value password" id="reg-password">{{ session('reg_password') }}</span>
                    <button onclick="copyPassword()" class="copy-btn" title="Salin Password">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <script>
            function copyPassword() {
                const pw = document.getElementById('reg-password').textContent;
                navigator.clipboard.writeText(pw).then(() => {
                    const btn = document.querySelector('.copy-btn');
                    const originalHTML = btn.innerHTML;
                    btn.innerHTML = '<svg width="14" height="14" fill="none" stroke="#22c55e" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                    setTimeout(() => {
                        btn.innerHTML = originalHTML;
                    }, 2000);
                });
            }
        </script>

        <div class="warning-note">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                style="flex-shrink:0; margin-top: 1px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                </path>
            </svg>
            <span>Simpan informasi akun ini dengan baik. Password digunakan untuk login ke platform Moodle AI
                Learning.</span>
        </div>

        <div class="buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">
                Masuk ke AI Learning
            </a>
        </div>
    </div>
</body>

</html>