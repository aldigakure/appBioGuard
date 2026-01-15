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
                <img src="{{ asset('assets/images/dinacom_notext.png') }}" style="width: 62px" alt="" >
                <span>BIOGUARD</span>
            </div>

            <h1 class="auth-title">Selamat Datang!</h1>
            <p class="auth-subtitle">Masuk ke akun Anda untuk melanjutkan</p>

            {{-- Demo Info --}}
            <div class="demo-info">
                <div class="demo-info-title">
                    <span>💡</span> Demo Login
                </div>
                <div class="demo-info-text">
                    Email: <code>admin@bioguard.id</code><br>
                    Password: <code>password</code>
                </div>
            </div>

            @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        placeholder="nama@email.com"
                        value="{{ old('email') }}"
                        required 
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input" 
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <div class="form-checkbox-wrapper ">
                    <label class="form-checkbox-label">
                        <input type="checkbox" name="remember" class="form-checkbox">
                        Ingat saya
                    </label>
                    <a href="#" class="form-link">Lupa password?</a>
                </div>

                <button type="submit" class="btn-auth btn-auth-primary">
                    <span>Masuk</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
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


</body>
</html>
