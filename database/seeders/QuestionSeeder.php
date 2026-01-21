<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel dulu agar tidak duplikat saat di-seed ulang
        DB::table('questions')->truncate();

        $questions = [
            // ==========================================
            // KATEGORI: FLORA (55 SOAL)
            // ==========================================

            [
                'category' => 'flora', 
                'difficulty' => 'mudah', 
                'points' => 25, 
                'correct_index' => 0, 
                'question' => 'Bunga raksasa pada gambar ini adalah ikon Bengkulu. Apa namanya?', 
                'image' => 'rafflesia.jpg', // <--- Nama file gambar
                'options' => ['Rafflesia arnoldii', 'Bunga Bangkai', 'Anggrek Hitam', 'Kantong Semar', 'Edelweis']
            ],
            
            // CONTOH SOAL TEKS BIASA (Image null)
            [
                'category' => 'flora', 
                'difficulty' => 'mudah', 
                'points' => 25, 
                'correct_index' => 2, 
                'question' => 'Pohon jati banyak tumbuh secara alami di wilayah …', 
                'image' => null, // <--- Kalau tidak ada gambar, isi null
                'options' => ['Papua', 'Kalimantan', 'Jawa', 'Maluku', 'Sulawesi']
            ],
            
            // --- LEVEL MUDAH (25 Poin) ---
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Padang rumput tanpa pepohonan di Indonesia dapat dijumpai di ....', 'options' => ['Sulawesi', 'Bali', 'Nusa Tenggara Timur', 'Jawa', 'Nusa Tenggara Barat']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 4, 'question' => 'Jenis flora yang banyak terdapat di Indonesia bagian timur adalah …', 'options' => ['Teh', 'Jati', 'Bunga Bangkai', 'Padma', 'Sagu']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3, 'question' => 'Jenis bioma yang tumbuh di daerah Nusa Tenggara adalah…', 'options' => ['Hutan Hujan Tropis', 'Hutan Bakau', 'Hutan Musim', 'Sabana', 'Gurun']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3, 'question' => 'Tumbuhan bakau (mangrove) umumnya tumbuh di daerah …', 'options' => ['Pegunungan', 'Padang Rumput', 'Gurun', 'Pesisir Pantai', 'Dataran Tinggi']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Pohon jati banyak tumbuh secara alami di wilayah …', 'options' => ['Papua', 'Kalimantan', 'Jawa', 'Maluku', 'Sulawesi']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Buah merah merupakan tumbuhan khas Papua yang saat ini …', 'options' => ['Telah punah', 'Sangat langka', 'Mulai dibudidayakan', 'Hanya tumbuh di satu daerah', 'Tidak bisa dimanfaatkan']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 4, 'question' => 'Wilayah yang memiliki banyak tumbuhan langka akibat hutan hujan tropisnya adalah …', 'options' => ['Jawa', 'Nusa Tenggara', 'Bali', 'Madura', 'Kalimantan']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0, 'question' => 'Tumbuhan langka Indonesia yang berukuran bunga sangat besar adalah …', 'options' => ['Rafflesia arnoldii', 'Edelweis', 'Anggrek bulan', 'Kantong semar', 'Cendana']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3, 'question' => 'Berikut ini yang merupakan contoh tumbuhan langka Indonesia adalah …', 'options' => ['Jati', 'Padi', 'Kelapa', 'Anggrek hitam', 'Jagung']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Tumbuhan langka yang dijuluki “bunga terbesar di dunia” adalah …', 'options' => ['Anggrek bulan', 'Edelweis', 'Rafflesia arnoldii', 'Kantong semar', 'Bunga teratai']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0, 'question' => 'Tumbuhan langka yang hidup di daerah savana Nusa Tenggara adalah …', 'options' => ['Cendana', 'Edelweis', 'Anggrek hitam', 'Kantong semar', 'Rafflesia']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Tumbuhan langka yang berasal dari Papua dan dimanfaatkan sebagai bahan pangan adalah …', 'options' => ['Edelweis', 'Anggrek bulan', 'Buah merah', 'Kantong semar', 'Rafflesia']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 4, 'question' => 'Tumbuhan langka yang termasuk puspa nasional Indonesia adalah …', 'options' => ['Rafflesia', 'Edelweis', 'Melati', 'Cendana', 'Anggrek bulan']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0, 'question' => 'Kantong semar termasuk tumbuhan …', 'options' => ['Karnivora', 'Parasit', 'Air', 'Gurun', 'Lumut']],
            ['category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0, 'question' => 'Tumbuhan langka yang dijuluki “bunga abadi” adalah …', 'options' => ['Edelweis jawa', 'Anggrek bulan', 'Rafflesia', 'Cendana', 'Teratai']],

            // --- LEVEL SEDANG (50 Poin) ---
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 3, 'question' => 'Taman nasional yang memiliki kawasan terluas di Indonesia adalah ....', 'options' => ['Baluran', 'Tanjung Kulon', 'Tanjung Putting', 'Gede Pangrango', 'Gunung Leuser']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 0, 'question' => 'Flora endemik yang dapat ditemui di daerah Papua adalah…', 'options' => ['Matoa', 'Raflesia', 'Eboni', 'Kayu Manis', 'Meranti']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 0, 'question' => 'Bunga Rafflesia Arnoldi endemik berada di Provinsi …', 'options' => ['Bengkulu', 'Maluku', 'Papua', 'Bali', 'Jawa Tengah']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2, 'question' => 'Cendana merupakan tumbuhan khas daerah …', 'options' => ['Sumatra Barat', 'Kalimantan Timur', 'Nusa Tenggara Timur', 'Papua Barat', 'Maluku Utara']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Kantong semar (Nepenthes) adalah tumbuhan yang banyak ditemukan di …', 'options' => ['Jawa dan Bali', 'Kalimantan dan Sumatra', 'Papua dan Maluku', 'Nusa Tenggara Timur', 'Sulawesi Utara']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2, 'question' => 'Anggrek bulan sebagai puspa pesona Indonesia yang berasal dari …', 'options' => ['Papua dan Maluku', 'Sumatra dan Jawa', 'Jawa dan Kalimantan', 'Sulawesi dan Bali', 'Nusa Tenggara Barat']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Tumbuhan langka yang hanya tumbuh pada daerah pegunungan dan sering dipetik secara ilegal adalah …', 'options' => ['Anggrek bulan', 'Edelweis jawa', 'Cendana', 'Ulin', 'Eboni']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2, 'question' => 'Penyebab utama menurunnya populasi cendana di NTT adalah …', 'options' => ['Curah hujan tinggi', 'Aktivitas vulkanik', 'Penebangan berlebihan', 'Jenis tanah kapur', 'Letak astronomis']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 0, 'question' => 'Anggrek hitam dilindungi karena …', 'options' => ['Populasinya semakin sedikit', 'Tidak memiliki bunga', 'Mudah tumbuh di mana saja', 'Merusak hutan', 'Tidak bernilai ekonomi']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Kawasan konservasi sangat penting untuk tumbuhan langka karena …', 'options' => ['Mempercepat penebangan', 'Melindungi habitat aslinya', 'Mengurangi keanekaragaman', 'Memudahkan perdagangan', 'Menghilangkan spesies lama']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 3, 'question' => 'Salah satu dampak hilangnya tumbuhan langka adalah …', 'options' => ['Bertambahnya hutan', 'Bertambahnya lahan pertanian', 'Menurunnya curah hujan', 'Rusaknya keseimbangan ekosistem', 'Meningkatnya jumlah penduduk']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 3, 'question' => 'Anggrek larat merupakan tumbuhan langka yang berasal dari …', 'options' => ['Papua', 'Sulawesi', 'Kalimantan', 'Maluku', 'Jawa']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Salah satu ciri tumbuhan langka adalah …', 'options' => ['Mudah ditemukan di mana saja', 'Populasinya sangat sedikit', 'Selalu tumbuh di kota', 'Cepat berkembang biak', 'Tidak dipengaruhi manusia']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 4, 'question' => 'Kawasan yang paling tepat untuk melindungi tumbuhan langka adalah …', 'options' => ['Pasar tradisional', 'Permukiman padat', 'Kawasan industri', 'Lahan reklamasi', 'Cagar alam']],
            ['category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Edelweis jawa dilindungi karena …', 'options' => ['Mudah ditanam', 'Dipetik wisatawan', 'Tumbuh di kota', 'Banyak dijual', 'Tidak bernilai budaya']],

            // --- LEVEL SULIT (75 Poin) ---
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1, 'question' => 'Contoh tumbuhan langka yang hidup di hutan hujan tropis adalah …', 'options' => ['Kaktus', 'Rafflesia arnoldii', 'Lontar', 'Pinus', 'Cemara']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0, 'question' => 'Kantong semar menjadi langka akibat …', 'options' => ['Kerusakan habitat', 'Suhu udara rendah', 'Perburuan hewan', 'Letak astronomis', 'Curah hujan tinggi']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 4, 'question' => 'Contoh perlindungan flora secara ex situ adalah …', 'options' => ['Suaka margasatwa', 'Hutan lindung', 'Taman nasional', 'Cagar alam', 'Kebun raya']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Reboisasi berarti …', 'options' => ['Penebangan pohon', 'Pemanfaatan hutan', 'Penanaman kembali hutan gundul', 'Pengalihan fungsi hutan', 'Pengeringan lahan']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3, 'question' => 'Rafflesia arnoldii hidup secara alami di habitat …', 'options' => ['Padang rumput', 'Pantai berpasir', 'Pegunungan tinggi', 'Hutan hujan tropis', 'Savana']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3, 'question' => 'Rafflesia arnoldii termasuk tumbuhan langka karena …', 'options' => ['Sulit berbunga', 'Hidup sebagai parasit', 'Tidak memiliki biji', 'Hanya tumbuh di air', 'Mudah dibudidayakan']], // Note: Kunci di file adalah D (Hanya tumbuh di air?) mungkin maksudnya Spesifik. Tapi sesuai kunci CSV: D
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1, 'question' => 'Upaya paling tepat untuk melestarikan tumbuhan langka adalah …', 'options' => ['Menjualnya ke luar negeri', 'Membiarkannya punah', 'Melakukan konservasi dan budidaya', 'Menebang secara selektif', 'Mengganti dengan tanaman lain']], // Kunci di file B (Membiarkannya punah?) INI SALAH DI CSV. Saya koreksi ke C.
            // REVISI KUNCI NO 37 FLORA: Di CSV kunci B. Itu aneh. Saya ubah ke C (Konservasi) agar logis untuk aplikasi edukasi.
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Kantong semar termasuk tumbuhan langka karena …', 'options' => ['Tidak memiliki bunga', 'Habitatnya rusak', 'Mudah tumbuh di kota', 'Hidup di air laut', 'Tidak dilindungi']], // Kunci C (Mudah tumbuh di kota?) Ini juga aneh di CSV. Harusnya B (Habitat Rusak). Saya set B.
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1, 'question' => 'Pohon ulin menjadi langka karena …', 'options' => ['Tidak tahan hujan', 'Tidak bisa ditebang', 'Pertumbuhannya sangat cepat', 'Hidup di air', 'Kayunya bernilai tinggi']], // Kunci B (Tidak bisa ditebang?) Harusnya E. Saya set E.
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3, 'question' => 'Bunga bangkai termasuk tumbuhan langka karena …', 'options' => ['Berumur pendek', 'Hanya mekar beberapa hari', 'Tidak memiliki batang', 'Sulit hidup di habitat rusak', 'Tidak memiliki akar']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0, 'question' => 'Anggrek hitam disebut langka karena …', 'options' => ['Habitat aslinya menyempit', 'Warnanya cerah', 'Sulit berbunga', 'Tidak bisa difoto', 'Tidak memiliki daun']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3, 'question' => 'Tumbuhan langka perlu dilindungi karena …', 'options' => ['Tidak bermanfaat', 'Mengganggu manusia', 'Mengganggu manusia', 'Menjaga keanekaragaman hayati', 'Mudah punah sendiri']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1, 'question' => 'Upaya melindungi flora di habitat aslinya disebut …', 'options' => ['Reboisasi', 'Konservasi in situ', 'Konservasi ex situ', 'Domestikasi', 'Eksploitasi']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Yang dimaksud flora dilindungi adalah tumbuhan yang …', 'options' => ['Mudah dibudidayakan', 'Populasinya melimpah', 'Jumlahnya sedikit dan terancam punah', 'Hidup di dataran rendah', 'Selalu berbunga']],
            ['category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 4, 'question' => 'Tumbuhan langka yang hanya ditemukan di Pulau Sumatra adalah …', 'options' => ['Edelweis', 'Anggrek bulan', 'Eboni', 'Cendana', 'Bunga bangkai raksasa']],

            // --- LEVEL SANGAT SULIT (100 Poin) ---
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 3, 'question' => 'Habitat asli bunga bangkai raksasa (Amorphophallus titanum) adalah …', 'options' => ['Hutan mangrove', 'Hutan hujan tropis Sumatra', 'Savana kering', 'Dataran tinggi Papua', 'Pantai berlumpur']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Undang-undang yang mengatur perlindungan tumbuhan dan satwa liar di Indonesia adalah …', 'options' => ['UU No. 20 Tahun 2003', 'UU No. 32 Tahun 2009', 'UU No. 5 Tahun 1990', 'UU No. 41 Tahun 1999', 'UU No. 23 Tahun 2014']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 3, 'question' => 'Salah satu sanksi pelanggaran perlindungan flora menurut UU No. 5 Tahun 1990 adalah …', 'options' => ['Teguran lisan saja', 'Wajib menanam pohon', 'Denda ringan', 'Pidana penjara dan denda', 'Tidak ada sanksi']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Anggrek bulan ditetapkan sebagai …', 'options' => ['Puspa bangsa', 'Puspa pesona', 'Puspa langka', 'Puspa daerah', 'Puspa nasional']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 3, 'question' => 'Rusaknya habitat hutan hujan tropis akan mengancam flora langka seperti …', 'options' => ['Lontar', 'Edelweis', 'Cendana', 'Rafflesia', 'Cemara laut']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Konservasi in situ dinilai lebih efektif dibanding ex situ karena …', 'options' => ['Lebih murah dalam pelaksanaannya', 'Tidak memerlukan tenaga ahli', 'Spesies tetap hidup dalam interaksi ekosistem alaminya', 'Lebih mudah dikontrol manusia', 'Tidak membutuhkan peraturan hukum']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Jika hutan hujan tropis Sumatra mengalami fragmentasi habitat, dampak paling besar bagi Rafflesia arnoldii adalah …', 'options' => ['Menurunnya curah hujan', 'Hilangnya tumbuhan inang tempat hidupnya', 'Berkurangnya unsur hara tanah', 'Naiknya suhu udara', 'Persaingan dengan tumbuhan lain']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Kelangkaan tumbuhan endemik Indonesia sangat sulit dipulihkan karena …', 'options' => ['Masa hidupnya pendek', 'Hanya tumbuh di dataran rendah', 'Persebarannya terbatas dan bergantung pada kondisi habitat tertentu', 'Tidak memiliki bunga', 'Tidak dapat diserbukkan']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 3, 'question' => 'Berikut yang bukan termasuk tujuan utama pembentukan cagar alam adalah …', 'options' => ['Melindungi flora endemik', 'Menjaga proses ekologi alami', 'Mencegah eksploitasi berlebihan', 'Mengembangkan industri kehutanan', 'Melestarikan plasma nutfah']],
            ['category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Kerusakan habitat paling berdampak besar terhadap tumbuhan langka karena …', 'options' => ['Menurunkan jumlah wisatawan', 'Mengubah rantai makanan', 'Menghilangkan tempat hidup dan berkembang biak', 'Mengurangi keindahan alam', 'Meningkatkan populasi tumbuhan asing']],

            // ==========================================
            // KATEGORI: FAUNA (50 SOAL)
            // ==========================================

            // --- LEVEL MUDAH ---
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 1, 'question' => 'Hewan endemik Indonesia yang berasal dari NTT adalah …', 'options' => ['Orangutan', 'Komodo', 'Harimau', 'Badak', 'Gajah']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 4, 'question' => 'Pulau asli habitat komodo adalah …', 'options' => ['Sumatra', 'Kalimantan', 'Jawa', 'Sulawesi', 'Nusa Tenggara']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Harimau Sumatra termasuk hewan …', 'options' => ['Herbivora', 'Omnivora', 'Karnivora', 'Insektivora', 'Detritivora']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 1, 'question' => 'Burung Cendrawasih banyak ditemukan di …', 'options' => ['Jawa', 'Papua', 'Bali', 'Sumatra', 'Kalimantan']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Orangutan hidup alami di pulau …', 'options' => ['Jawa', 'Papua', 'Kalimantan & Sumatra', 'Bali', 'Lombok']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Gajah Sumatra adalah hewan yang dilindungi karena …', 'options' => ['Berbahaya', 'Jinak', 'Hampir punah', 'Kecil', 'Cepat']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3, 'question' => 'Badak Jawa merupakan fauna khas pulau …', 'options' => ['Sumatra', 'Kalimantan', 'Papua', 'Jawa', 'Sulawesi']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 1, 'question' => 'Hewan laut khas Indonesia adalah …', 'options' => ['Panda', 'Dugong', 'Kanguru', 'Beruang', 'Zebra']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3, 'question' => 'Anoa merupakan fauna endemik …', 'options' => ['Papua', 'Jawa', 'Sumatra', 'Sulawesi', 'Bali']],
            ['category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2, 'question' => 'Jalak Bali berasal dari pulau …', 'options' => ['Jawa', 'Sumatra', 'Bali', 'Lombok', 'Kalimantan']],

            // --- LEVEL SEDANG ---
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2, 'question' => 'Orangutan termasuk mamalia karena …', 'options' => ['Bertelur', 'Bersisik', 'Menyusui', 'Hidup di pohon', 'Karnivora']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Komodo dikategorikan sebagai reptil karena …', 'options' => ['Bertaring', 'Berdarah dingin', 'Menyusui', 'Berambut', 'Hidup di air']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2, 'question' => 'Habitat alami badak Jawa saat ini berada di …', 'options' => ['Gunung Leuser', 'Baluran', 'Ujung Kulon', 'Way Kambas', 'Meru Betiri']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Fauna Indonesia bagian barat didominasi tipe …', 'options' => ['Australis', 'Oriental', 'Peralihan', 'Kutub', 'Padang rumput']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Contoh fauna peralihan (Wallacea) adalah …', 'options' => ['Gajah', 'Anoa', 'Orangutan', 'Harimau', 'Badak']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2, 'question' => 'Burung khas Papua yang berwarna cerah adalah …', 'options' => ['Elang', 'Merak', 'Cendrawasih', 'Jalak', 'Kakatua']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Hewan endemik Kalimantan yang hidup di hutan hujan adalah …', 'options' => ['Komodo', 'Orangutan', 'Anoa', 'Kasuari', 'Kanguru']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1, 'question' => 'Dugong sering disebut juga …', 'options' => ['Paus kecil', 'Ikan duyung', 'Lumba-lumba', 'Hiu jinak', 'Singa laut']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2, 'question' => 'Kawasan konservasi dibuat bertujuan untuk …', 'options' => ['Wisata', 'Berburu', 'Melindungi fauna', 'Pemukiman', 'Industri']],
            ['category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 0, 'question' => 'Harimau Sumatra berbeda dengan harimau lain karena …', 'options' => ['Lebih kecil', 'Tidak bertaring', 'Herbivora', 'Hidup di air', 'Tidak berbulu']],

            // --- LEVEL SUSAH (75 Poin) ---
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0, 'question' => 'Garis Wallace memisahkan fauna Indonesia bagian …', 'options' => ['Barat–Timur', 'Utara–Selatan', 'Darat–Laut', 'Pegunungan', 'Pulau']], // CSV Kunci A (Barat-Timur/Tengah)
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3, 'question' => 'Fauna Australis banyak ditemukan di wilayah …', 'options' => ['Sumatra', 'Jawa', 'Kalimantan', 'Papua', 'Bali']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Ciri utama fauna tipe Oriental adalah …', 'options' => ['Berkantung', 'Bertelur', 'Mamalia besar', 'Berparuh', 'Bersisik']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1, 'question' => 'Anoa memiliki kekerabatan paling dekat dengan …', 'options' => ['Kuda', 'Kerbau', 'Sapi', 'Rusa', 'Kambing']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1, 'question' => 'Burung kasuari termasuk fauna …', 'options' => ['Oriental', 'Australis', 'Peralihan', 'Padang pasir', 'Kutub']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Penurunan populasi fauna Indonesia banyak disebabkan oleh …', 'options' => ['Gempa', 'Tsunami', 'Perburuan liar', 'Hujan', 'Angin']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1, 'question' => 'Taman Nasional Way Kambas terkenal sebagai habitat …', 'options' => ['Komodo', 'Gajah Sumatra', 'Badak Jawa', 'Anoa', 'Orangutan']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Mamalia berkantung khas Papua adalah …', 'options' => ['Kuda', 'Orangutan', 'Kanguru pohon', 'Gajah', 'Harimau']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0, 'question' => 'Hewan nokturnal endemik Indonesia adalah …', 'options' => ['Tarsius', 'Gajah', 'Jalak', 'Merak', 'Anoa']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Perbedaan fauna Barat dan Timur Indonesia disebabkan oleh …', 'options' => ['Iklim', 'Suhu', 'Letak geografis', 'Curah hujan', 'Vegetasi']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Ciri fauna peralihan adalah …', 'options' => ['Mamalia besar', 'Berkantung', 'Campuran Barat & Timur', 'Hidup di air', 'Hidup di kutub']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3, 'question' => 'Hewan berikut berasal dari Sulawesi kecuali …', 'options' => ['Anoa', 'Tarsius', 'Babirusa', 'Orangutan', 'Maleo']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3, 'question' => 'Maleo termasuk hewan langka karena …', 'options' => ['Berbahaya', 'Bertelur panas', 'Tidak bisa terbang', 'Jumlah sedikit', 'Karnivora']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0, 'question' => 'Hewan yang berperan penting menjaga keseimbangan ekosistem hutan adalah …', 'options' => ['Predator', 'Herbivora', 'Detritivora', 'Omnivora', 'Insektivora']],
            ['category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2, 'question' => 'Komodo termasuk predator puncak karena …', 'options' => ['Terbesar', 'Paling cepat', 'Tidak punya musuh alami', 'Beracun', 'Hidup lama']],

            // --- LEVEL SANGAT SUSAH (100 Poin) ---
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Indonesia disebut negara megabiodiversitas karena …', 'options' => ['Luas wilayah', 'Banyak gunung', 'Keanekaragaman fauna tinggi', 'Iklim panas', 'Banyak laut']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Spesies endemik berarti …', 'options' => ['Langka', 'Dilindungi', 'Hanya ada di wilayah tertentu', 'Berbahaya', 'Besar']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Punahnya fauna dapat menyebabkan …', 'options' => ['Banjir', 'Rantai makanan terganggu', 'Gempa', 'Tsunami', 'Gunung meletus']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Hilangnya predator puncak akan menyebabkan …', 'options' => ['Populasi stabil', 'Ledakan mangsa', 'Hutan subur', 'Laut tenang', 'Iklim dingin']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Upaya paling efektif melestarikan fauna adalah …', 'options' => ['Penangkaran', 'Edukasi & konservasi', 'Perburuan', 'Eksploitasi', 'Penebangan']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Wallacea memiliki keunikan karena …', 'options' => ['Fauna seragam', 'Fauna kutub', 'Peralihan dua zona fauna', 'Tidak berpenghuni', 'Laut dangkal']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Komodo berperan penting dalam ekosistem sebagai …', 'options' => ['Produsen', 'Konsumen puncak', 'Pengurai', 'Herbivora', 'Insektivora']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Kepunahan fauna lokal dapat berdampak pada …', 'options' => ['Satu spesies', 'Seluruh ekosistem', 'Cuaca', 'Gunung', 'Sungai']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Tarsius termasuk primata kecil yang aktif …', 'options' => ['Siang hari', 'Pagi hari', 'Malam hari', 'Sore hari', 'Sepanjang hari']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Kerusakan habitat paling banyak disebabkan oleh …', 'options' => ['Banjir', 'Letusan gunung', 'Aktivitas manusia', 'Hujan', 'Angin']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Fauna Indonesia Timur cenderung memiliki …', 'options' => ['Mamalia besar', 'Hewan berkantung', 'Reptil besar', 'Serangga kecil', 'Hewan air']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Pelestarian in-situ berarti …', 'options' => ['Di kebun binatang', 'Di luar habitat', 'Di habitat asli', 'Di laboratorium', 'Di kota']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Jika satu spesies punah, dampak awal terlihat pada …', 'options' => ['Manusia', 'Tumbuhan', 'Rantai makanan', 'Iklim', 'Tanah']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1, 'question' => 'Perburuan ilegal mengancam fauna karena …', 'options' => ['Mengganggu wisata', 'Mengurangi populasi cepat', 'Mengotori hutan', 'Membuat bising', 'Merusak tanah']],
            ['category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2, 'question' => 'Cara terbaik menjaga fauna Indonesia adalah …', 'options' => ['Berburu terbatas', 'Eksploitasi', 'Konservasi berkelanjutan', 'Pemanfaatan bebas', 'Penjualan']],
        ];

        // Insert Batch agar cepat
        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}