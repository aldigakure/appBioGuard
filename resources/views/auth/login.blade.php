<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - BIOGUARD</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body class="bg-mesh">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-logo">
                <img src="{{ asset('assets/images/dinacom_notext.webp') }}" style="width: 42px" alt="" >
                <span>BIOGUARD</span>
            </div>

            <h1 class="auth-title">Selamat Datang!</h1>
            <p class="auth-subtitle">Masuk ke akun Anda untuk melanjutkan</p>




            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <div class="input-with-icon">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                            <path d="m3 7 9 6 9-6"></path>
                        </svg>
                        <input 
                            type="text" 
                            id="email" 
                            name="email" 
                            class="form-input @error('email') is-invalid @enderror" 
                            placeholder="Email"
                            value="{{ old('email') }}"
                            autofocus
                        >
                    </div>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="password-input-wrapper input-with-icon">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input @error('password') is-invalid @enderror" 
                            placeholder="Password"
                        >
                        <button type="button" class="password-toggle-btn" onclick="togglePassword(this)" aria-label="Toggle password visibility">
                            <svg class="password-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <defs>
                                    <mask id="eye-mask">
                                        <rect width="24" height="24" fill="white"/>
                                        <line class="mask-line" x1="4" y1="4" x2="20" y2="20" stroke="black" stroke-width="3.5" stroke-linecap="round"/>
                                    </mask>
                                </defs>
                                <g class="eye-group">
                                    <path class="eye-path" d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"></path>
                                    <circle class="eye-pupil" cx="12" cy="12" r="2.5"></circle>
                                </g>
                                <line class="eye-slash" x1="4" y1="4" x2="20" y2="20"></line>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-checkbox-wrapper ">
                    <label class="form-checkbox-label">
                        <input type="checkbox" name="remember" class="form-checkbox">
                        Ingat saya
                    </label>
                    <a href="{{ route('password.request') }}" class="form-link">Lupa password?</a>
                </div>

                <button type="submit" class="btn-auth btn-auth-primary">
                    <span>Masuk</span>
                </button>
            </form>

            <div class="auth-divider">
                <span>atau</span>
            </div>

            <div class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}" class="form-link">Daftar sekarang</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(btn) {
            const wrapper = btn.closest('.password-input-wrapper');
            const input = wrapper.querySelector('input');
            
            if (input.type === 'password') {
                input.type = 'text';
                wrapper.classList.add('showing-password');
            } else {
                input.type = 'password';
                wrapper.classList.remove('showing-password');
            }
        }
    </script>
</body>
</html>
