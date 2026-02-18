<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Dark Modern Futuristic Theme */
            --bg-color: #0f172a;
            /* Slate 900 */
            --bg-secondary: #1e293b;
            /* Slate 800 */
            --card-bg: #1e293b;

            --text-primary: #f8fafc;
            /* Slate 50 */
            --text-secondary: #94a3b8;
            /* Slate 400 */

            --primary: #3b82f6;
            /* Blue 500 */
            --accent: #06b6d4;
            /* Cyan 500 */

            --border-color: #334155;
            /* Slate 700 */
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            background-image:
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(6, 182, 212, 0.15) 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
            color: var(--text-primary);
        }

        .login-container {
            position: relative;
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            border-radius: 20px;
            padding: 1px;
            background: linear-gradient(45deg, transparent, rgba(6, 182, 212, 0.3), transparent);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        h1 {
            background: linear-gradient(to right, #60a5fa, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 2rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 1rem;
            outline: none;
            transition: all 0.2s;
            box-sizing: border-box;
            font-family: inherit;
        }

        input::placeholder {
            color: var(--text-secondary);
            opacity: 0.5;
        }

        input:focus {
            background: rgba(15, 23, 42, 0.8);
            border-color: #06b6d4;
            box-shadow: 0 0 0 2px rgba(6, 182, 212, 0.15);
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            margin-top: 1rem;
            box-shadow: 0 4px 14px 0 rgba(0, 118, 255, 0.39);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(0, 118, 255, 0.23);
            filter: brightness(1.1);
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-secondary);
            opacity: 0.5;
            transition: opacity 0.2s;
            display: flex;
            align-items: center;
        }

        .password-toggle:hover {
            opacity: 1;
        }

        .error {
            color: #ef4444;
            font-size: 0.9rem;
            margin-top: 6px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 4px;
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
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Admin Portal</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required autofocus>
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <div class="password-toggle" onclick="togglePassword('password', this)">
                    <svg class="eye-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="eye-open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    <svg class="eye-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="eye-closed"
                        style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18">
                        </path>
                    </svg>
                </div>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const eyeOpen = el.querySelector('#eye-open');
            const eyeClosed = el.querySelector('#eye-closed');

            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'block';
            } else {
                input.type = 'password';
                eyeOpen.style.display = 'block';
                eyeClosed.style.display = 'none';
            }
        }
    </script>
</body>

</html>