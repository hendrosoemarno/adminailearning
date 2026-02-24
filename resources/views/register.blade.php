<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registrasi Siswa - AI Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0f172a;
            --bg-secondary: #1e293b;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --primary: #3b82f6;
            --primary-hover: #2563eb;
            --accent: #06b6d4;
            --success: #22c55e;
            --danger: #ef4444;
            --warning: #f59e0b;
            --border-color: #334155;
            --input-bg: rgba(15, 23, 42, 0.6);
            --input-bg-focus: rgba(15, 23, 42, 0.8);
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
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 50%, rgba(6, 182, 212, 0.12) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(139, 92, 246, 0.08) 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            padding: 2rem 1rem;
        }

        .register-container {
            position: relative;
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid var(--border-color);
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 640px;
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            border-radius: 24px;
            padding: 1px;
            background: linear-gradient(135deg, transparent, rgba(6, 182, 212, 0.3), transparent, rgba(59, 130, 246, 0.2));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            background: linear-gradient(135deg, #60a5fa, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            font-size: 1.8rem;
            letter-spacing: -0.025em;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* Section dividers */
        .section-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.75rem 0 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--accent);
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, var(--border-color), transparent);
        }

        .section-title .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background: rgba(6, 182, 212, 0.1);
        }

        /* Form grid */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-row.single {
            grid-template-columns: 1fr;
        }

        .form-group {
            margin-bottom: 1rem;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 0.4rem;
            letter-spacing: 0.02em;
        }

        .form-group label .required {
            color: var(--danger);
            margin-left: 2px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px 14px;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 0.9rem;
            outline: none;
            transition: all 0.2s;
            font-family: inherit;
        }

        input::placeholder,
        textarea::placeholder {
            color: var(--text-muted);
            opacity: 0.6;
        }

        input:focus,
        select:focus,
        textarea:focus {
            background: var(--input-bg-focus);
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
        }

        input.valid {
            border-color: var(--success);
        }

        input.invalid {
            border-color: var(--danger);
        }

        input[readonly] {
            background: rgba(15, 23, 42, 0.3);
            color: var(--accent);
            cursor: default;
            font-weight: 600;
            font-family: 'Courier New', monospace;
            letter-spacing: 0.05em;
        }

        select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2394a3b8' viewBox='0 0 16 16'%3E%3Cpath d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        select option {
            background: var(--bg-secondary);
            color: var(--text-primary);
        }

        /* Username check indicator */
        .username-wrapper {
            position: relative;
        }

        .username-wrapper .check-indicator {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            display: none;
        }

        .username-wrapper .check-indicator.show {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .username-wrapper .spinner {
            width: 18px;
            height: 18px;
            border: 2px solid var(--border-color);
            border-top-color: var(--accent);
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        /* Password display box */
        .password-display {
            position: relative;
        }

        .password-display .pw-badge {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.65rem;
            padding: 2px 8px;
            border-radius: 4px;
            background: rgba(6, 182, 212, 0.15);
            color: var(--accent);
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        /* Feedback messages */
        .field-feedback {
            font-size: 0.75rem;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
            min-height: 1.2em;
        }

        .field-feedback.success {
            color: var(--success);
        }

        .field-feedback.error {
            color: var(--danger);
        }

        .field-feedback.info {
            color: var(--text-muted);
        }

        /* Error list from server */
        .server-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
            color: #fca5a5;
        }

        .server-error ul {
            list-style: none;
            padding: 0;
        }

        .server-error li {
            padding: 2px 0;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .server-error li::before {
            content: '✕';
            font-size: 0.7rem;
            color: var(--danger);
            font-weight: 700;
        }

        /* Submit button */
        .submit-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1.5rem;
            box-shadow: 0 4px 14px rgba(59, 130, 246, 0.3);
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(59, 130, 246, 0.4);
            filter: brightness(1.05);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .login-link a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .login-link a:hover {
            color: #22d3ee;
            text-decoration: underline;
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

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .register-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="header">
            <h1>Registrasi Siswa</h1>
            <p>AI Learning — Daftarkan siswa baru untuk platform pembelajaran</p>
        </div>

        @if ($errors->any())
            <div class="server-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}" id="regForm" novalidate>
            @csrf

            {{-- ===== SECTION: AKUN ===== --}}
            <div class="section-title">
                <span class="icon">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
                Informasi Akun
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Depan <span class="required">*</span></label>
                    <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="Nama depan"
                        required>
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" name="lastname" value="{{ old('lastname') }}"
                        placeholder="Nama belakang (opsional)">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Panggilan <span class="required">*</span></label>
                    <input type="text" name="nickname" id="nickname" value="{{ old('nickname') }}"
                        placeholder="Contoh: Abi" required oninput="generatePassword()">
                </div>
                <div class="form-group">
                    <label>Username <span class="required">*</span></label>
                    <div class="username-wrapper">
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            placeholder="Username login Moodle" required style="padding-right: 40px;"
                            oninput="this.value = this.value.toLowerCase(); checkUsername()">
                        <div class="check-indicator" id="username-indicator">
                            <div class="spinner"></div>
                        </div>
                    </div>
                    <div class="field-feedback info" id="username-feedback">Huruf kecil, angka, titik, underscore.</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="email@siswa.com" required>
                </div>
                <div class="form-group">
                    <label>Password <span style="color: var(--text-muted); font-weight: 400;">(otomatis)</span></label>
                    <div class="password-display">
                        <input type="text" name="generated_password" id="password-preview" readonly
                            placeholder="— terisi otomatis —" value="">
                        <span class="pw-badge">auto</span>
                    </div>
                    <div class="field-feedback info" id="password-info">Isi nama panggilan & tanggal lahir terlebih
                        dahulu.</div>
                </div>
            </div>

            {{-- ===== SECTION: DATA PRIBADI ===== --}}
            <div class="section-title">
                <span class="icon">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0">
                        </path>
                    </svg>
                </span>
                Data Pribadi
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jenis Kelamin <span class="required">*</span></label>
                    <select name="gender" required>
                        <option value="">— Pilih —</option>
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Agama <span class="required">*</span></label>
                    <select name="agama" required>
                        <option value="">— Pilih —</option>
                        <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam</option>
                        <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="katolik" {{ old('agama') == 'katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="budha" {{ old('agama') == 'budha' ? 'selected' : '' }}>Budha</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Lahir <span class="required">*</span></label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                        placeholder="Kota kelahiran" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir <span class="required">*</span></label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}" required
                        onchange="generatePassword()">
                </div>
            </div>

            <div class="form-row single">
                <div class="form-group">
                    <label>Alamat <span class="required">*</span></label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat lengkap" required>
                </div>
            </div>

            {{-- ===== SECTION: SEKOLAH ===== --}}
            <div class="section-title">
                <span class="icon">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 7l-9-5 9 5 9-5-9 5zm0-7v7"></path>
                    </svg>
                </span>
                Data Sekolah
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Sekolah <span class="required">*</span></label>
                    <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah') }}" placeholder="SMP/SMA/MI"
                        required>
                </div>
                <div class="form-group">
                    <label>Kelas <span class="required">*</span></label>
                    <select name="kelas" required>
                        <option value="">— Pilih —</option>
                        <option value="TK" {{ old('kelas') == 'TK' ? 'selected' : '' }}>TK (Taman Kanak-kanak)</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ old('kelas') == $i ? 'selected' : '' }}>Kelas {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kursus yang Diminati <span class="required">*</span></label>
                    <select name="kursus" required>
                        <option value="">— Pilih Kursus —</option>
                        <option value="Matematika" {{ old('kursus') == 'Matematika' ? 'selected' : '' }}>Matematika
                        </option>
                        <option value="Bahasa Inggris" {{ old('kursus') == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa
                            Inggris</option>
                        <option value="Junior Coder" {{ old('kursus') == 'Junior Coder' ? 'selected' : '' }}>Junior Coder
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Dari mana mendapat informasi tentang AI Learning?</label>
                    <input type="text" name="nama_perekom" value="{{ old('nama_perekom') }}"
                        placeholder="Contoh: Instagram, Teman, dll.">
                </div>
            </div>

            {{-- ===== SECTION: ORANG TUA ===== --}}
            <div class="section-title">
                <span class="icon">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                </span>
                Data Orang Tua
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Orang Tua <span class="required">*</span></label>
                    <input type="text" name="nama_ortu" value="{{ old('nama_ortu') }}"
                        placeholder="Nama lengkap orang tua" required>
                </div>
                <div class="form-group">
                    <label>No. WhatsApp Orang Tua <span class="required">*</span></label>
                    <input type="text" name="wa_ortu" value="{{ old('wa_ortu') }}" placeholder="08xxxx atau +62xxxx"
                        required>
                </div>
            </div>

            <button type="submit" class="submit-btn" id="submit-btn">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>

    <script>
        // ==============================
        // USERNAME AVAILABILITY CHECK
        // ==============================
        let usernameTimer = null;

        function checkUsername() {
            const input = document.getElementById('username');
            const indicator = document.getElementById('username-indicator');
            const feedback = document.getElementById('username-feedback');
            const val = input.value.trim();

            clearTimeout(usernameTimer);

            if (val.length < 3) {
                indicator.className = 'check-indicator';
                input.className = '';
                feedback.className = 'field-feedback info';
                feedback.textContent = val.length === 0 ? 'Huruf kecil, angka, titik, underscore.' : 'Minimal 3 karakter.';
                return;
            }

            // Show spinner
            indicator.innerHTML = '<div class="spinner"></div>';
            indicator.className = 'check-indicator show';

            usernameTimer = setTimeout(() => {
                fetch('{{ route("register.check-username") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ username: val })
                })
                    .then(r => r.json())
                    .then(data => {
                        if (data.available) {
                            indicator.innerHTML = '<svg width="18" height="18" fill="none" stroke="#22c55e" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>';
                            indicator.className = 'check-indicator show';
                            input.className = 'valid';
                            feedback.className = 'field-feedback success';
                            feedback.textContent = '✓ ' + data.message;
                        } else {
                            indicator.innerHTML = '<svg width="18" height="18" fill="none" stroke="#ef4444" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>';
                            indicator.className = 'check-indicator show';
                            input.className = 'invalid';
                            feedback.className = 'field-feedback error';
                            feedback.textContent = '✕ ' + data.message;
                        }
                    })
                    .catch(() => {
                        indicator.className = 'check-indicator';
                        feedback.className = 'field-feedback info';
                        feedback.textContent = 'Gagal memeriksa username.';
                    });
            }, 500); // Debounce 500ms
        }

        // ==============================
        // AUTO GENERATE PASSWORD
        // ==============================
        function generatePassword() {
            const nickname = document.getElementById('nickname').value.trim();
            const tglLahir = document.getElementById('tgl_lahir').value;
            const preview = document.getElementById('password-preview');
            const info = document.getElementById('password-info');

            if (!nickname || !tglLahir) {
                preview.value = '';
                info.className = 'field-feedback info';
                info.textContent = 'Isi nama panggilan & tanggal lahir terlebih dahulu.';
                return;
            }

            const year = tglLahir.split('-')[0];
            // Ucfirst nickname + "." + year
            let pw = nickname.charAt(0).toUpperCase() + nickname.slice(1).toLowerCase() + '.' + year;

            // Pad to 8 if shorter
            if (pw.length < 8) {
                let counter = 1;
                while (pw.length < 8) {
                    pw += counter;
                    counter++;
                }
            }

            preview.value = pw;
            info.className = 'field-feedback success';
            info.innerHTML = '✓ Password otomatis: <strong>' + pw.length + ' karakter</strong>';
        }

        // Re-generate on page load (for old() values)
        document.addEventListener('DOMContentLoaded', function () {
            const nickname = document.getElementById('nickname').value;
            const tglLahir = document.getElementById('tgl_lahir').value;
            if (nickname && tglLahir) {
                generatePassword();
            }
            const username = document.getElementById('username').value;
            if (username && username.length >= 3) {
                checkUsername();
            }
        });
    </script>
</body>

</html>