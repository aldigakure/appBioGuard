<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar - BIOGUARD</title>

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
               <img src="{{ asset('assets/images/dinacom.png') }}" style="width: 62px" alt="">
                <span>BIOGUARD</span>
            </div>

            <h1 class="auth-title">Buat Akun Baru</h1>
            <p class="auth-subtitle">Bergabung untuk melindungi keanekaragaman hayati Indonesia</p>

            {{-- Benefits --}}
            <div class="register-benefits">
                <div class="benefit-item">
                    <span class="benefit-icon">✓</span>
                    <span>Catat observasi spesies flora & fauna</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">✓</span>
                    <span>Ikut program reboisasi & volunteer</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">✓</span>
                    <span>Dapatkan poin & badge gamifikasi</span>
                </div>
            </div>

            @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input 
                            type="text" 
                            id="first_name" 
                            name="first_name" 
                            class="form-input" 
                            placeholder="Nama depan"
                            value="{{ old('first_name') }}"
                            required 
                            autofocus
                        >
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input 
                            type="text" 
                            id="last_name" 
                            name="last_name" 
                            class="form-input" 
                            placeholder="Nama belakang"
                            value="{{ old('last_name') }}"
                            required
                        >
                    </div>
                </div>

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
                    >
                </div>

                <div class="form-group">
                    <label for="role" class="form-label">Daftar Sebagai</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="" disabled selected>Pilih peran Anda</option>
                        <option value="volunteer">🤝 Volunteer</option>
                        <option value="researcher">🔬 Researcher</option>
                        <option value="citizen">👤 Citizen Reporter</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input" 
                        placeholder="Minimal 8 karakter"
                        required
                        minlength="8"
                    >
                    <div class="password-strength">
                        <div class="password-strength-bar">
                            <div class="password-strength-fill" id="strengthFill"></div>
                        </div>
                        <div class="password-strength-text" id="strengthText"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        class="form-input" 
                        placeholder="Ulangi password"
                        required
                    >
                </div>

                <div class="form-checkbox-wrapper form-checkbox-terms">
                    <label for="terms" class="form-checkbox-label">
                        <input type="checkbox" name="terms" id="terms" class="form-checkbox" required>
                        <span>Saya menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> BIOGUARD</span>
                    </label>
                </div>

                <button type="submit" class="btn-auth btn-auth-primary">
                    <span>Daftar Sekarang</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="8.5" cy="7" r="4"/>
                        <line x1="20" y1="8" x2="20" y2="14"/>
                        <line x1="23" y1="11" x2="17" y2="11"/>
                    </svg>
                </button>
            </form>

            <div class="auth-divider">
                <span>atau</span>
            </div>

            <div class="auth-footer">
                Sudah punya akun? <a href="{{ route('login') }}" class="form-link">Masuk di sini</a>
            </div>
        </div>
    </div>

    <script>
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const strengthFill = document.getElementById('strengthFill');
        const strengthText = document.getElementById('strengthText');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            let text = '';
            let color = '';

            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]/)) strength += 25;
            if (password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/) || password.match(/[^a-zA-Z0-9]/)) strength += 25;

            if (strength <= 25) {
                text = 'Lemah';
                color = '#ef4444';
            } else if (strength <= 50) {
                text = 'Cukup';
                color = '#f59e0b';
            } else if (strength <= 75) {
                text = 'Baik';
                color = '#10b981';
            } else {
                text = 'Kuat';
                color = '#059669';
            }

            strengthFill.style.width = strength + '%';
            strengthFill.style.background = color;
            strengthText.textContent = password.length > 0 ? 'Kekuatan password: ' + text : '';
            strengthText.style.color = color;
        });
    </script>
</body>
</html>
