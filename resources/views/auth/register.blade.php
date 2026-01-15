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

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input 
                            type="text" 
                            id="first_name" 
                            name="first_name" 
                            class="form-input @error('first_name') is-invalid @enderror" 
                            placeholder="Nama depan"
                            value="{{ old('first_name') }}"
                            autofocus
                        >
                        @error('first_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <span class="invalid-feedback js-error" id="error-first_name"></span>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input 
                            type="text" 
                            id="last_name" 
                            name="last_name" 
                            class="form-input @error('last_name') is-invalid @enderror" 
                            placeholder="Nama belakang"
                            value="{{ old('last_name') }}"
                        >
                        @error('last_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <span class="invalid-feedback js-error" id="error-last_name"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email" 
                        class="form-input @error('email') is-invalid @enderror" 
                        placeholder="nama@email.com"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <span class="invalid-feedback js-error" id="error-email"></span>
                </div>


                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input @error('password') is-invalid @enderror" 
                        placeholder="Minimal 8 karakter"
                    >
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <span class="invalid-feedback js-error" id="error-password"></span>
                    <div class="password-strength">
                        <div class="password-strength-bar">
                            <div class="password-strength-fill" id="strengthFill"></div>
                        </div>
                        <div class="password-strength-text" id="strengthText"></div>
                        
                        {{-- Password Requirements Checklist --}}
                        <div class="password-requirements">
                            <div class="requirement" id="req-length">
                                <span class="req-icon">○</span> Minimal 8 karakter
                            </div>
                            <div class="requirement" id="req-mixed">
                                <span class="req-icon">○</span> Huruf Besar & Kecil
                            </div>
                            <div class="requirement" id="req-number">
                                <span class="req-icon">○</span> Angka (0-9)
                            </div>
                            <div class="requirement" id="req-symbol">
                                <span class="req-icon">○</span> Simbol (!@#$%^&*)
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        class="form-input @error('password_confirmation') is-invalid @enderror" 
                        placeholder="Ulangi password"
                    >
                    @error('password_confirmation')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <span class="invalid-feedback js-error" id="error-password_confirmation"></span>
                </div>

                <div class="form-checkbox-wrapper @error('terms') is-invalid-checkbox @enderror" style="display: flex; flex-direction: column; align-items: flex-start; gap: 0.5rem; margin-bottom: 1.5rem;">
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <input type="checkbox" name="terms" id="terms" class="form-checkbox" style="margin-top: 3px;">
                        <label for="terms" class="form-checkbox-label" style="display: block; line-height: 1.5; pointer-events: auto;">
                            Saya menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> BIOGUARD
                        </label>
                    </div>
                    @error('terms')
                        <span class="invalid-feedback" style="display: block; margin-top: 0;">{{ $message }}</span>
                    @enderror
                    <span id="termsError" class="invalid-feedback" style="display: none; margin-top: 0;">Anda harus menyetujui Syarat & Ketentuan.</span>
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
            
            // Requirements check
            const requirements = {
                length: password.length >= 8,
                mixed: password.match(/[a-z]/) && password.match(/[A-Z]/),
                number: password.match(/[0-9]/),
                symbol: password.match(/[^a-zA-Z0-9]/)
            };

            // Update UI Checklist
            Object.keys(requirements).forEach(req => {
                const element = document.getElementById('req-' + req);
                const icon = element.querySelector('.req-icon');
                if (requirements[req]) {
                    element.classList.add('valid');
                    icon.textContent = '●';
                    strength += 25;
                } else {
                    element.classList.remove('valid');
                    icon.textContent = '○';
                }
            });

            let text = '';
            let color = '';

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
            strengthText.textContent = password.length > 0 ? 'Keamanan: ' + text : '';
            strengthText.style.color = color;
        });

        // Form Submission Validation
        const registerForm = document.getElementById('registerForm');
        const termsCheckbox = document.getElementById('terms');
        const termsError = document.getElementById('termsError');

        registerForm.addEventListener('submit', function(e) {
            let hasError = false;
            
            // Reset errors
            document.querySelectorAll('.js-error').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.form-input, .form-select').forEach(el => el.classList.remove('is-invalid'));
            termsError.style.display = 'none';

            // Helper to show error
            const showError = (id, msg) => {
                const el = document.getElementById('error-' + id);
                const input = document.getElementById(id);
                if (el) {
                    el.textContent = msg;
                    el.style.display = 'block';
                }
                if (input) input.classList.add('is-invalid');
                hasError = true;
            };

            // Validate First Name
            if (!document.getElementById('first_name').value.trim()) {
                showError('first_name', 'Nama depan wajib diisi.');
            }

            // Validate Last Name
            if (!document.getElementById('last_name').value.trim()) {
                showError('last_name', 'Nama belakang wajib diisi.');
            }

            // Validate Email
            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
                showError('email', 'Alamat email wajib diisi.');
            } else if (!emailRegex.test(email)) {
                showError('email', 'Format email tidak valid.');
            }


            // Validate Password
            const password = document.getElementById('password').value;
            if (!password) {
                showError('password', 'Password wajib diisi.');
            } else if (password.length < 8) {
                showError('password', 'Password minimal harus 8 karakter.');
            }

            // Validate Confirmation
            const confirm = document.getElementById('password_confirmation').value;
            if (password !== confirm) {
                showError('password_confirmation', 'Konfirmasi password tidak cocok.');
            }

            // Validate Terms
            if (!termsCheckbox.checked) {
                termsError.style.display = 'block';
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();
                // Scroll to first error
                const firstError = document.querySelector('.is-invalid, #termsError');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });
    </script>
</body>
</html>
