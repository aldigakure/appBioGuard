{{-- Mascot Chat Widget Component --}}
{{-- Usage: <x-mascot-chat /> --}}

@props([
    'mascotName' => 'BioGuard Assistant',
    'mascotImage' => asset('assets/images/dinacommaskot.webp'),
    'position' => 'right' // 'left' or 'right'
])

{{-- Mascot Launcher --}}
<div class="mascot-launcher {{ $position === 'left' ? 'position-left' : '' }}" id="mascotLauncher" aria-label="Buka Chat">
    <div class="mascot-pulse-ring"></div>
    <img 
        src="{{ $mascotImage }}" 
        alt="{{ $mascotName }}" 
        class="mascot-launcher-img"
        loading="lazy"
    >
</div>

{{-- Chat Overlay --}}
<div class="mascot-chat-overlay" id="mascotChatOverlay"></div>

{{-- Chat Modal --}}
<div class="mascot-chat-modal {{ $position === 'left' ? 'position-left' : '' }}" id="mascotChatModal" role="dialog" aria-modal="true" aria-labelledby="mascotChatTitle">
    {{-- Header --}}
    <div class="mascot-chat-header">
        <img 
            src="{{ $mascotImage }}" 
            alt="{{ $mascotName }}" 
            class="mascot-chat-header-avatar"
        >
        <div class="mascot-chat-header-info">
            <h3 class="mascot-chat-header-name" id="mascotChatTitle">{{ $mascotName }}</h3>
            <span class="mascot-chat-header-status">Online - Siap membantu</span>
        </div>
        <button class="mascot-chat-close" id="mascotChatClose" aria-label="Tutup Chat">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    {{-- Body --}}
    <div class="mascot-chat-body" id="mascotChatBody">
        {{-- Welcome Message --}}
        <div class="mascot-chat-message bot">
            <img 
                src="{{ $mascotImage }}" 
                alt="{{ $mascotName }}" 
                class="mascot-chat-message-avatar"
            >
            <div class="mascot-chat-message-content">
                <strong>Halo! 👋</strong><br>
                Selamat datang di BioGuard! Saya adalah asisten virtual yang siap membantu Anda dengan pertanyaan seputar website kami.
            </div>
        </div>

        {{-- Quick Replies --}}
        <div class="mascot-quick-replies" id="mascotQuickReplies">
            <button class="mascot-quick-reply-btn" data-question="Cara Order">🛒 Cara Order</button>
            <button class="mascot-quick-reply-btn" data-question="Harga">💰 Harga</button>
            <button class="mascot-quick-reply-btn" data-question="Kontak Admin">📞 Kontak Admin</button>
            <button class="mascot-quick-reply-btn" data-question="Fitur Website">✨ Fitur Website</button>
            <button class="mascot-quick-reply-btn" data-question="Cara Daftar">📝 Cara Daftar</button>
        </div>
    </div>

    {{-- Footer --}}
    <div class="mascot-chat-footer">
        <div class="mascot-chat-input-wrapper">
            <input 
                type="text" 
                class="mascot-chat-input" 
                id="mascotChatInput"
                placeholder="Ketik pertanyaan Anda..."
                autocomplete="off"
            >
            <button class="mascot-chat-send" id="mascotChatSend" aria-label="Kirim Pesan">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========================================
    // MASCOT CHAT WIDGET LOGIC
    // ========================================

    // Elements
    const launcher = document.getElementById('mascotLauncher');
    const overlay = document.getElementById('mascotChatOverlay');
    const modal = document.getElementById('mascotChatModal');
    const closeBtn = document.getElementById('mascotChatClose');
    const chatBody = document.getElementById('mascotChatBody');
    const chatInput = document.getElementById('mascotChatInput');
    const sendBtn = document.getElementById('mascotChatSend');
    const quickReplies = document.getElementById('mascotQuickReplies');

    // Mascot image for bot messages
    const mascotImage = "{{ $mascotImage }}";

    // ========================================
    // KEYWORD & RESPONSE DATABASE
    // ========================================
    
    // Keywords that indicate website-related questions
    const validKeywords = [
        'web', 'website', 'harga', 'price', 'biaya', 'tarif',
        'daftar', 'registrasi', 'register', 'signup', 'sign up',
        'fitur', 'feature', 'fungsi', 'layanan',
        'beli', 'order', 'pesan', 'checkout', 'bayar', 'pembayaran',
        'akun', 'account', 'login', 'masuk', 'logout', 'keluar',
        'bioguard', 'bio-guard', 'flora', 'fauna', 'spesies', 'species',
        'kontak', 'contact', 'admin', 'hubungi', 'whatsapp', 'wa', 'email',
        'cara', 'how', 'bagaimana', 'tutorial', 'panduan', 'guide',
        'peta', 'map', 'lokasi', 'location', 'observasi', 'observation',
        'ai', 'identifikasi', 'identify', 'scan', 'kamera',
        'laporan', 'report', 'data', 'statistik', 'dashboard',
        'premium', 'gratis', 'free', 'paket', 'langganan', 'subscribe'
    ];

    // Response database based on keywords
    const responses = {
        'order': {
            keywords: ['order', 'pesan', 'beli', 'checkout', 'cara order'],
            response: `Untuk melakukan order di BioGuard, ikuti langkah berikut:
            
1️⃣ Buat akun atau login ke akun Anda
2️⃣ Pilih paket layanan yang diinginkan
3️⃣ Klik tombol "Berlangganan" atau "Order"
4️⃣ Lengkapi data pembayaran
5️⃣ Konfirmasi pesanan Anda

Butuh bantuan lebih lanjut? Silakan hubungi admin kami! 😊`
        },
        'harga': {
            keywords: ['harga', 'price', 'biaya', 'tarif', 'bayar', 'pembayaran'],
            response: `💰 **Informasi Harga BioGuard:**

🆓 **Paket Gratis:**
- Akses fitur dasar
- Identifikasi spesies terbatas
- Observasi flora & fauna

💎 **Paket Premium:**
- Akses semua fitur AI
- Identifikasi unlimited
- Laporan detail & ekspor data
- Prioritas support

Untuk informasi harga detail, silakan kunjungi halaman Pricing atau hubungi admin kami!`
        },
        'kontak': {
            keywords: ['kontak', 'contact', 'admin', 'hubungi', 'whatsapp', 'wa', 'email'],
            response: `📞 **Kontak Admin BioGuard:**

📧 Email: admin@bioguard.id
📱 WhatsApp: +62 812-XXXX-XXXX
🌐 Website: bioguard.id

⏰ Jam Operasional:
Senin - Jumat: 08.00 - 17.00 WIB
Sabtu: 09.00 - 14.00 WIB

Tim kami siap membantu Anda! 🙌`
        },
        'fitur': {
            keywords: ['fitur', 'feature', 'fungsi', 'layanan', 'apa saja'],
            response: `✨ **Fitur Unggulan BioGuard:**

🔍 **AI Identification** - Identifikasi flora & fauna dengan AI canggih
🗺️ **Interactive Map** - Peta interaktif habitat biodiversitas
📊 **Bio-AI Analytics** - Dashboard analitik data lingkungan
📝 **Observation Log** - Catat observasi spesies Anda
📈 **Reports** - Laporan detail biodiversitas

Jelajahi semua fitur kami untuk pengalaman konservasi yang lebih baik! 🌿`
        },
        'daftar': {
            keywords: ['daftar', 'registrasi', 'register', 'signup', 'sign up', 'cara daftar', 'buat akun'],
            response: `📝 **Cara Mendaftar di BioGuard:**

1️⃣ Klik tombol "Daftar" di halaman utama
2️⃣ Isi formulir dengan data lengkap:
   - Nama lengkap
   - Email aktif
   - Password
3️⃣ Verifikasi email Anda
4️⃣ Login dan mulai menjelajah!

Pendaftaran GRATIS dan hanya butuh 2 menit! 🚀`
        },
        'akun': {
            keywords: ['akun', 'account', 'login', 'masuk', 'logout', 'profil', 'password'],
            response: `👤 **Bantuan Akun:**

🔐 **Login:** Klik "Masuk" di navbar → masukkan email & password
🔄 **Reset Password:** Klik "Lupa Password" di halaman login
👤 **Edit Profil:** Dashboard → Profil → Edit
🚪 **Logout:** Klik ikon profil → Keluar

Mengalami masalah dengan akun? Hubungi admin kami! 🆘`
        },
        'bioguard': {
            keywords: ['bioguard', 'bio-guard', 'tentang', 'about', 'apa itu'],
            response: `🌿 **Tentang BioGuard:**

BioGuard adalah platform pemantauan dan perlindungan keanekaragaman hayati berbasis AI untuk konservasi alam Indonesia.

🎯 **Misi Kami:**
- Melindungi biodiversitas Indonesia
- Memudahkan identifikasi spesies
- Mendukung program konservasi
- Edukasi lingkungan

Bergabunglah dalam misi konservasi bersama kami! 🌍💚`
        },
        'greetings': {
            keywords: ['halo', 'hai', 'hi', 'hello', 'pagi', 'siang', 'sore', 'malam', 'selamat'],
            response: `Halo juga! 👋😊

Senang bisa bertemu dengan Anda! Saya siap membantu menjawab pertanyaan seputar website BioGuard.

Ada yang bisa saya bantu? Silakan pilih topik atau ketik pertanyaan Anda! 💬`
        },
        'terima_kasih': {
            keywords: ['terima kasih', 'thanks', 'thank you', 'makasih', 'thx'],
            response: `Sama-sama! 🙏😊

Senang bisa membantu Anda! Jika ada pertanyaan lain seputar BioGuard, jangan ragu untuk bertanya kembali.

Semoga hari Anda menyenangkan! 🌟`
        }
    };

    // Default rejection message
    const rejectionMessage = `Mohon maaf, kami hanya melayani pertanyaan tentang website kami. 🙏

Silakan ajukan pertanyaan seputar:
• Fitur website BioGuard
• Cara order & harga
• Panduan daftar & login
• Kontak admin

Atau pilih salah satu Quick Reply di atas! 👆`;

    // Default website response
    const defaultWebsiteResponse = `Terima kasih atas pertanyaan Anda! 😊

Untuk informasi lebih detail, silakan:
• Jelajahi menu website kami
• Hubungi admin untuk bantuan langsung
• Pilih Quick Reply yang tersedia

Kami siap membantu Anda! 🌿`;

    // ========================================
    // HELPER FUNCTIONS
    // ========================================

    // Check if message contains valid keywords
    function isValidQuestion(message) {
        const lowerMessage = message.toLowerCase();
        return validKeywords.some(keyword => lowerMessage.includes(keyword));
    }

    // Find matching response
    function findResponse(message) {
        const lowerMessage = message.toLowerCase();
        
        for (const [key, data] of Object.entries(responses)) {
            if (data.keywords.some(keyword => lowerMessage.includes(keyword))) {
                return data.response;
            }
        }
        
        return null;
    }

    // Create message element
    function createMessage(content, isBot = true) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `mascot-chat-message ${isBot ? 'bot' : 'user'}`;

        if (isBot) {
            messageDiv.innerHTML = `
                <img src="${mascotImage}" alt="BioGuard" class="mascot-chat-message-avatar">
                <div class="mascot-chat-message-content">${content.replace(/\n/g, '<br>')}</div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="mascot-chat-message-avatar">U</div>
                <div class="mascot-chat-message-content">${content}</div>
            `;
        }

        return messageDiv;
    }

    // Create typing indicator
    function createTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.className = 'mascot-chat-message bot';
        typingDiv.id = 'typingIndicator';
        typingDiv.innerHTML = `
            <img src="${mascotImage}" alt="BioGuard" class="mascot-chat-message-avatar">
            <div class="mascot-typing-indicator">
                <span></span>
                <span></span>
                <span></span>
            </div>
        `;
        return typingDiv;
    }

    // Auto scroll to bottom
    function scrollToBottom() {
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    // ========================================
    // CHAT LOGIC
    // ========================================

    function sendMessage(message) {
        if (!message.trim()) return;

        // Hide quick replies after first message
        if (quickReplies) {
            quickReplies.style.display = 'none';
        }

        // Add user message
        chatBody.appendChild(createMessage(message, false));
        scrollToBottom();

        // Clear input
        chatInput.value = '';

        // Show typing indicator
        const typingIndicator = createTypingIndicator();
        chatBody.appendChild(typingIndicator);
        scrollToBottom();

        // Simulate bot response delay
        setTimeout(() => {
            // Remove typing indicator
            typingIndicator.remove();

            let response;

            // Check if it's a valid website-related question
            if (isValidQuestion(message)) {
                response = findResponse(message) || defaultWebsiteResponse;
            } else {
                response = rejectionMessage;
            }

            // Add bot response
            chatBody.appendChild(createMessage(response, true));
            scrollToBottom();
        }, 1000 + Math.random() * 500);
    }

    // ========================================
    // EVENT LISTENERS
    // ========================================

    // Open chat
    launcher.addEventListener('click', () => {
        modal.classList.add('active');
        overlay.classList.add('active');
        chatInput.focus();
    });

    // Close chat
    function closeChat() {
        modal.classList.remove('active');
        overlay.classList.remove('active');
    }

    closeBtn.addEventListener('click', closeChat);
    overlay.addEventListener('click', closeChat);

    // Close with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeChat();
        }
    });

    // Send message on button click
    sendBtn.addEventListener('click', () => {
        sendMessage(chatInput.value);
    });

    // Send message on Enter key
    chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            sendMessage(chatInput.value);
        }
    });

    // Quick reply buttons
    document.querySelectorAll('.mascot-quick-reply-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const question = btn.dataset.question;
            sendMessage(question);
        });
    });
});
</script>
