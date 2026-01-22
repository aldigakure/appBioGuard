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

            // --- LEVEL MUDAH ---
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0,
                'question' => 'Bunga raksasa pada gambar ini adalah ikon Bengkulu. Apa namanya?',
                'image' => 'flora_rafflesia.jpg', // [KEEP] Soal merujuk ke gambar
                'options' => json_encode(['Rafflesia arnoldii', 'Bunga Bangkai', 'Anggrek Hitam', 'Kantong Semar', 'Edelweis']),
                'explanation' => 'Rafflesia arnoldii adalah bunga tunggal terbesar di dunia yang menjadi simbol provinsi Bengkulu.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Pohon jati banyak tumbuh secara alami di wilayah …',
                'image' => null,
                'options' => json_encode(['Papua', 'Kalimantan', 'Jawa', 'Maluku', 'Sulawesi']),
                'explanation' => 'Hutan Jati (Tectona grandis) tumbuh subur di tanah kapur Jawa yang memiliki musim kemarau dan hujan yang tegas.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Padang rumput tanpa pepohonan di Indonesia dapat dijumpai di ....',
                'image' => null,
                'options' => json_encode(['Sulawesi', 'Bali', 'Nusa Tenggara Timur', 'Jawa', 'Nusa Tenggara Barat']),
                'explanation' => 'Nusa Tenggara Timur memiliki curah hujan rendah, menciptakan ekosistem sabana (padang rumput) yang luas.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 4,
                'question' => 'Jenis flora yang banyak terdapat di Indonesia bagian timur adalah …',
                'image' => null,
                'options' => json_encode(['Teh', 'Jati', 'Bunga Bangkai', 'Padma', 'Sagu']),
                'explanation' => 'Sagu (Metroxylon sagu) adalah tanaman pangan utama bagi masyarakat di Papua dan Maluku.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3,
                'question' => 'Jenis bioma yang tumbuh di daerah Nusa Tenggara adalah…',
                'image' => null,
                'options' => json_encode(['Hutan Hujan Tropis', 'Hutan Bakau', 'Hutan Musim', 'Sabana', 'Gurun']),
                'explanation' => 'Sabana adalah padang rumput yang diselingi semak belukar, cocok untuk peternakan kuda dan sapi di NTT.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3,
                'question' => 'Tumbuhan bakau (mangrove) umumnya tumbuh di daerah …',
                'image' => null,
                'options' => json_encode(['Pegunungan', 'Padang Rumput', 'Gurun', 'Pesisir Pantai', 'Dataran Tinggi']),
                'explanation' => 'Akar tunjang mangrove berfungsi menahan ombak dan mencegah abrasi di pesisir pantai.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Ciri khas pohon jati saat musim kemarau adalah …',
                'image' => null,
                'options' => json_encode(['Berbunga lebat', 'Berbuah', 'Menggugurkan daun (meranggas)', 'Batang membesar', 'Akar memanjang']),
                'explanation' => 'Pohon Jati menggugurkan daunnya (meranggas) saat kemarau untuk mengurangi penguapan air.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Buah merah merupakan tumbuhan khas Papua yang saat ini …',
                'image' => null,
                'options' => json_encode(['Telah punah', 'Sangat langka', 'Mulai dibudidayakan', 'Hanya tumbuh di satu daerah', 'Tidak bisa dimanfaatkan']),
                'explanation' => 'Buah Merah (Pandanus conoideus) kini dibudidayakan luas karena khasiatnya sebagai obat dan suplemen.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 4,
                'question' => 'Wilayah yang memiliki banyak tumbuhan langka akibat hutan hujan tropisnya adalah …',
                'image' => null,
                'options' => json_encode(['Jawa', 'Nusa Tenggara', 'Bali', 'Madura', 'Kalimantan']),
                'explanation' => 'Hutan hujan tropis Kalimantan adalah salah satu yang tertua di dunia, menyimpan biodiversitas flora tertinggi.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0,
                'question' => 'Tumbuhan langka Indonesia yang berukuran bunga sangat besar adalah …',
                'image' => null,
                'options' => json_encode(['Rafflesia arnoldii', 'Edelweis', 'Anggrek bulan', 'Kantong semar', 'Cendana']),
                'explanation' => 'Diameter bunga Rafflesia bisa mencapai 1 meter, menjadikannya bunga tunggal terbesar di dunia.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3,
                'question' => 'Berikut ini yang merupakan contoh tumbuhan langka Indonesia adalah …',
                'image' => null,
                'options' => json_encode(['Jati', 'Padi', 'Kelapa', 'Anggrek hitam', 'Jagung']),
                'explanation' => 'Anggrek Hitam (Coelogyne pandurata) adalah spesies langka yang dilindungi, berbeda dengan tanaman budidaya lainnya.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Tumbuhan langka yang dijuluki “bunga terbesar di dunia” adalah …',
                'image' => null,
                'options' => json_encode(['Anggrek bulan', 'Edelweis', 'Rafflesia arnoldii', 'Kantong semar', 'Bunga teratai']),
                'explanation' => 'Rafflesia Arnoldii memegang rekor dunia sebagai bunga mekar terbesar.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0,
                'question' => 'Tumbuhan langka yang hidup di daerah savana Nusa Tenggara adalah …',
                'image' => null,
                'options' => json_encode(['Cendana', 'Edelweis', 'Anggrek hitam', 'Kantong semar', 'Rafflesia']),
                'explanation' => 'Pohon Cendana (Santalum album) adalah tumbuhan parasit akar yang tumbuh baik di iklim kering NTT.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Tumbuhan langka yang berasal dari Papua dan dimanfaatkan sebagai bahan pangan adalah …',
                'image' => null,
                'options' => json_encode(['Edelweis', 'Anggrek bulan', 'Buah merah', 'Kantong semar', 'Rafflesia']),
                'explanation' => 'Masyarakat Papua mengolah Buah Merah menjadi saus kental yang kaya nutrisi.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 4,
                'question' => 'Tumbuhan langka yang termasuk puspa nasional Indonesia adalah …',
                'image' => null,
                'options' => json_encode(['Rafflesia', 'Edelweis', 'Melati', 'Cendana', 'Anggrek bulan']),
                'explanation' => 'Anggrek Bulan dinobatkan sebagai "Puspa Pesona" Indonesia, mendampingi Melati (Puspa Bangsa) dan Rafflesia (Puspa Langka).'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0,
                'question' => 'Kantong semar termasuk tumbuhan …',
                'image' => 'flora_kantong_semar.jpg', // [KEEP] Bentuknya unik, bagus untuk visual
                'options' => json_encode(['Karnivora', 'Parasit', 'Air', 'Gurun', 'Lumut']),
                'explanation' => 'Kantong semar memerangkap serangga untuk mendapatkan nitrogen yang kurang di tanah tempat ia tumbuh.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 0,
                'question' => 'Tumbuhan langka yang dijuluki “bunga abadi” adalah …',
                'image' => null,
                'options' => json_encode(['Edelweis jawa', 'Anggrek bulan', 'Rafflesia', 'Cendana', 'Teratai']),
                'explanation' => 'Edelweis disebut bunga abadi karena hormon etilen yang dimilikinya mencegah kelopak bunganya rontok.'
            ],

            // --- LEVEL SEDANG ---
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 3,
                'question' => 'Taman nasional yang memiliki kawasan terluas di Indonesia adalah ....',
                'image' => null,
                'options' => json_encode(['Baluran', 'Tanjung Kulon', 'Tanjung Putting', 'Gede Pangrango', 'Gunung Leuser']),
                'explanation' => 'TN Gunung Leuser (Aceh/Sumut) adalah kawasan pelestarian alam terluas dan rumah bagi banyak satwa kunci.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 0,
                'question' => 'Flora endemik yang dapat ditemui di daerah Papua adalah…',
                'image' => null,
                'options' => json_encode(['Matoa', 'Raflesia', 'Eboni', 'Kayu Manis', 'Meranti']),
                'explanation' => 'Matoa adalah pohon buah khas Papua yang rasanya unik, perpaduan rambutan, lengkeng, dan durian.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 0,
                'question' => 'Bunga Rafflesia Arnoldi endemik berada di Provinsi …',
                'image' => null,
                'options' => json_encode(['Bengkulu', 'Maluku', 'Papua', 'Bali', 'Jawa Tengah']),
                'explanation' => 'Bengkulu dikenal sebagai "The Land of Rafflesia" karena bunga ini pertama kali ditemukan di sana.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2,
                'question' => 'Cendana merupakan tumbuhan khas daerah …',
                'image' => null,
                'options' => json_encode(['Sumatra Barat', 'Kalimantan Timur', 'Nusa Tenggara Timur', 'Papua Barat', 'Maluku Utara']),
                'explanation' => 'Pulau Sumba dan Timor di NTT dulunya dijuluki "Sandalwood Island" karena populasi Cendana yang melimpah.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Kantong semar (Nepenthes) adalah tumbuhan yang banyak ditemukan di …',
                'image' => null,
                'options' => json_encode(['Jawa dan Bali', 'Kalimantan dan Sumatra', 'Papua dan Maluku', 'Nusa Tenggara Timur', 'Sulawesi Utara']),
                'explanation' => 'Kalimantan adalah pusat keanekaragaman Nepenthes dunia, dengan puluhan spesies unik.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2,
                'question' => 'Anggrek bulan sebagai puspa pesona Indonesia yang berasal dari …',
                'image' => null,
                'options' => json_encode(['Papua dan Maluku', 'Sumatra dan Jawa', 'Jawa dan Kalimantan', 'Sulawesi dan Bali', 'Nusa Tenggara Barat']),
                'explanation' => 'Meskipun tersebar luas, Anggrek Bulan (Phalaenopsis amabilis) pertama kali ditemukan di Ambon, namun tumbuh subur di hutan Kalimantan dan Jawa.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Tumbuhan langka yang hanya tumbuh pada daerah pegunungan dan sering dipetik secara ilegal adalah …',
                'image' => null,
                'options' => json_encode(['Anggrek bulan', 'Edelweis jawa', 'Cendana', 'Ulin', 'Eboni']),
                'explanation' => 'Edelweis Jawa (Anaphalis javanica) sering dipetik pendaki tak bertanggung jawab, padahal ia berperan menjaga tanah pegunungan.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2,
                'question' => 'Penyebab utama menurunnya populasi cendana di NTT adalah …',
                'image' => null,
                'options' => json_encode(['Curah hujan tinggi', 'Aktivitas vulkanik', 'Penebangan berlebihan', 'Jenis tanah kapur', 'Letak astronomis']),
                'explanation' => 'Wangi minyak cendana yang bernilai tinggi memicu eksploitasi besar-besaran tanpa penanaman kembali.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 0,
                'question' => 'Anggrek hitam dilindungi karena …',
                'image' => null,
                'options' => json_encode(['Populasinya semakin sedikit', 'Tidak memiliki bunga', 'Mudah tumbuh di mana saja', 'Merusak hutan', 'Tidak bernilai ekonomi']),
                'explanation' => 'Penyusutan hutan Kalimantan dan kebakaran hutan membuat populasi Anggrek Hitam di alam liar semakin kritis.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Kawasan konservasi sangat penting untuk tumbuhan langka karena …',
                'image' => null,
                'options' => json_encode(['Mempercepat penebangan', 'Melindungi habitat aslinya', 'Mengurangi keanekaragaman', 'Memudahkan perdagangan', 'Menghilangkan spesies lama']),
                'explanation' => 'Konservasi habitat menjamin tumbuhan bisa bereproduksi dan berinteraksi dengan alam tanpa gangguan manusia.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 3,
                'question' => 'Salah satu dampak hilangnya tumbuhan langka adalah …',
                'image' => null,
                'options' => json_encode(['Bertambahnya hutan', 'Bertambahnya lahan pertanian', 'Menurunnya curah hujan', 'Rusaknya keseimbangan ekosistem', 'Meningkatnya jumlah penduduk']),
                'explanation' => 'Hilangnya satu spesies tumbuhan dapat memutus rantai makanan, menyebabkan kepunahan hewan yang bergantung padanya.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 3,
                'question' => 'Anggrek larat merupakan tumbuhan langka yang berasal dari …',
                'image' => null,
                'options' => json_encode(['Papua', 'Sulawesi', 'Kalimantan', 'Maluku', 'Jawa']),
                'explanation' => 'Dinamakan Anggrek Larat karena berasal dari Pulau Larat di Kepulauan Tanimbar, Maluku.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Salah satu ciri tumbuhan langka adalah …',
                'image' => null,
                'options' => json_encode(['Mudah ditemukan di mana saja', 'Populasinya sangat sedikit', 'Selalu tumbuh di kota', 'Cepat berkembang biak', 'Tidak dipengaruhi manusia']),
                'explanation' => 'Tumbuhan dikategorikan langka jika jumlah individunya di alam sedikit dan sebaran wilayahnya terbatas.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 4,
                'question' => 'Kawasan yang paling tepat untuk melindungi tumbuhan langka adalah …',
                'image' => null,
                'options' => json_encode(['Pasar tradisional', 'Permukiman padat', 'Kawasan industri', 'Lahan reklamasi', 'Cagar alam']),
                'explanation' => 'Cagar Alam adalah kawasan suaka alam yang kondisinya dibiarkan murni untuk melindungi kekhasan tumbuhan di dalamnya.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Edelweis jawa dilindungi karena …',
                'image' => null,
                'options' => json_encode(['Mudah ditanam', 'Dipetik wisatawan', 'Tumbuh di kota', 'Banyak dijual', 'Tidak bernilai budaya']),
                'explanation' => 'Eksploitasi oleh wisatawan sebagai suvenir membuat Edelweis kini hanya boleh dilihat, tidak boleh dipetik.'
            ],

            // --- LEVEL SULIT ---
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1,
                'question' => 'Contoh tumbuhan langka yang hidup di hutan hujan tropis adalah …',
                'image' => null,
                'options' => json_encode(['Kaktus', 'Rafflesia arnoldii', 'Lontar', 'Pinus', 'Cemara']),
                'explanation' => 'Rafflesia membutuhkan kelembaban tinggi dan inang (liana) yang hanya tersedia di hutan hujan tropis lebat.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0,
                'question' => 'Kantong semar menjadi langka akibat …',
                'image' => null,
                'options' => json_encode(['Kerusakan habitat', 'Suhu udara rendah', 'Perburuan hewan', 'Letak astronomis', 'Curah hujan tinggi']),
                'explanation' => 'Alih fungsi hutan menjadi perkebunan kelapa sawit menghilangkan habitat asli Kantong Semar.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 4,
                'question' => 'Contoh perlindungan flora secara ex situ adalah …',
                'image' => null,
                'options' => json_encode(['Suaka margasatwa', 'Hutan lindung', 'Taman nasional', 'Cagar alam', 'Kebun raya']),
                'explanation' => 'Ex-situ artinya pelestarian di luar habitat asli, seperti Kebun Raya Bogor yang menampung koleksi tumbuhan dari berbagai daerah.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Reboisasi berarti …',
                'image' => null,
                'options' => json_encode(['Penebangan pohon', 'Pemanfaatan hutan', 'Penanaman kembali hutan gundul', 'Pengalihan fungsi hutan', 'Pengeringan lahan']),
                'explanation' => 'Reboisasi adalah langkah vital untuk memulihkan ekosistem hutan yang telah rusak agar flora bisa tumbuh kembali.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3,
                'question' => 'Rafflesia arnoldii hidup secara alami di habitat …',
                'image' => null,
                'options' => json_encode(['Padang rumput', 'Pantai berpasir', 'Pegunungan tinggi', 'Hutan hujan tropis', 'Savana']),
                'explanation' => 'Ia hanya bisa hidup menempel pada akar liana genus Tetrastigma di lantai hutan hujan tropis yang lembab.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1,
                'question' => 'Rafflesia arnoldii termasuk tumbuhan langka karena …',
                'image' => null,
                'options' => json_encode(['Sulit berbunga', 'Hidup sebagai parasit spesifik', 'Tidak memiliki biji', 'Hanya tumbuh di air', 'Mudah dibudidayakan']),
                'explanation' => 'Sebagai parasit, Rafflesia sangat bergantung pada inangnya. Jika inangnya mati atau ditebang, Rafflesia juga mati.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Upaya paling tepat untuk melestarikan tumbuhan langka adalah …',
                'image' => null,
                'options' => json_encode(['Menjualnya ke luar negeri', 'Membiarkannya punah', 'Melakukan konservasi dan budidaya', 'Menebang secara selektif', 'Mengganti dengan tanaman lain']),
                'explanation' => 'Konservasi (perlindungan) dan budidaya (perbanyakan) adalah kunci agar tumbuhan langka tidak punah.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1,
                'question' => 'Kantong semar termasuk tumbuhan langka karena …',
                'image' => null,
                'options' => json_encode(['Tidak memiliki bunga', 'Habitatnya rusak', 'Mudah tumbuh di kota', 'Hidup di air laut', 'Tidak dilindungi']),
                'explanation' => 'Hutan kerangas tempatnya hidup sering dianggap lahan tidak produktif dan diubah fungsinya, menghancurkan populasi Nepenthes.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 4,
                'question' => 'Pohon ulin menjadi langka karena …',
                'image' => null,
                'options' => json_encode(['Tidak tahan hujan', 'Tidak bisa ditebang', 'Pertumbuhannya sangat cepat', 'Hidup di air', 'Kayunya bernilai tinggi']),
                'explanation' => 'Kayu Ulin atau "Kayu Besi" sangat kuat dan tahan air, membuatnya diburu habis-habisan untuk konstruksi.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3,
                'question' => 'Bunga bangkai termasuk tumbuhan langka karena …',
                'image' => null,
                'options' => json_encode(['Berumur pendek', 'Hanya mekar beberapa hari', 'Tidak memiliki batang', 'Sulit hidup di habitat rusak', 'Tidak memiliki akar']),
                'explanation' => 'Bunga Bangkai butuh kondisi hutan yang spesifik dan waktu bertahun-tahun untuk fase vegetatif sebelum bisa mekar.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0,
                'question' => 'Anggrek hitam disebut langka karena …',
                'image' => null,
                'options' => json_encode(['Habitat aslinya menyempit', 'Warnanya cerah', 'Sulit berbunga', 'Tidak bisa difoto', 'Tidak memiliki daun']),
                'explanation' => 'Konversi hutan Kalimantan menjadi tambang dan sawit membuat rumah asli Anggrek Hitam semakin sempit.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3,
                'question' => 'Tumbuhan langka perlu dilindungi karena …',
                'image' => null,
                'options' => json_encode(['Tidak bermanfaat', 'Mengganggu manusia', 'Hanya hiasan', 'Menjaga keanekaragaman hayati', 'Mudah punah sendiri']),
                'explanation' => 'Setiap tumbuhan memiliki peran genetik unik (plasma nutfah) yang penting bagi keseimbangan alam dan masa depan manusia.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1,
                'question' => 'Upaya melindungi flora di habitat aslinya disebut …',
                'image' => null,
                'options' => json_encode(['Reboisasi', 'Konservasi in situ', 'Konservasi ex situ', 'Domestikasi', 'Eksploitasi']),
                'explanation' => 'In-situ (Latin: di tempat) berarti melindungi flora tanpa memindahkannya, contohnya di Cagar Alam atau Taman Nasional.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Yang dimaksud flora dilindungi adalah tumbuhan yang …',
                'image' => null,
                'options' => json_encode(['Mudah dibudidayakan', 'Populasinya melimpah', 'Jumlahnya sedikit dan terancam punah', 'Hidup di dataran rendah', 'Selalu berbunga']),
                'explanation' => 'Status "Dilindungi" diberikan negara kepada spesies yang populasinya kritis agar tidak punah.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 4,
                'question' => 'Tumbuhan langka yang hanya ditemukan di Pulau Sumatra adalah …',
                'image' => null,
                'options' => json_encode(['Edelweis', 'Anggrek bulan', 'Eboni', 'Cendana', 'Bunga bangkai raksasa']),
                'explanation' => 'Amorphophallus titanum (Bunga Bangkai Raksasa) adalah endemik asli hutan Sumatra.'
            ],

            // --- LEVEL SANGAT SULIT ---
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 3,
                'question' => 'Habitat asli bunga bangkai raksasa (Amorphophallus titanum) adalah …',
                'image' => null,
                'options' => json_encode(['Hutan mangrove', 'Hutan hujan tropis Sumatra', 'Savana kering', 'Dataran tinggi Papua', 'Pantai berlumpur']),
                'explanation' => 'Bunga ini membutuhkan naungan kanopi hutan hujan tropis Sumatra dan tanah yang kaya humus untuk tumbuh.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Undang-undang yang mengatur perlindungan tumbuhan dan satwa liar di Indonesia adalah …',
                'image' => null,
                'options' => json_encode(['UU No. 20 Tahun 2003', 'UU No. 32 Tahun 2009', 'UU No. 5 Tahun 1990', 'UU No. 41 Tahun 1999', 'UU No. 23 Tahun 2014']),
                'explanation' => 'UU No. 5 Tahun 1990 adalah payung hukum utama Konservasi Sumber Daya Alam Hayati dan Ekosistemnya.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 3,
                'question' => 'Salah satu sanksi pelanggaran perlindungan flora menurut UU No. 5 Tahun 1990 adalah …',
                'image' => null,
                'options' => json_encode(['Teguran lisan saja', 'Wajib menanam pohon', 'Denda ringan', 'Pidana penjara dan denda', 'Tidak ada sanksi']),
                'explanation' => 'Pelaku perdagangan tumbuhan dilindungi dapat dikenakan pidana penjara maksimal 5 tahun dan denda 100 juta rupiah.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Anggrek bulan ditetapkan sebagai …',
                'image' => null,
                'options' => json_encode(['Puspa bangsa', 'Puspa pesona', 'Puspa langka', 'Puspa daerah', 'Puspa nasional']),
                'explanation' => 'Berdasarkan Keputusan Presiden No. 4 Tahun 1993, Anggrek Bulan menyandang gelar Puspa Pesona.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 3,
                'question' => 'Rusaknya habitat hutan hujan tropis akan mengancam flora langka seperti …',
                'image' => null,
                'options' => json_encode(['Lontar', 'Edelweis', 'Cendana', 'Rafflesia', 'Cemara laut']),
                'explanation' => 'Rafflesia sangat sensitif. Hutan yang rusak mengubah suhu dan kelembaban mikro, membuatnya gagal tumbuh.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Konservasi in situ dinilai lebih efektif dibanding ex situ karena …',
                'image' => null,
                'options' => json_encode(['Lebih murah', 'Tanpa tenaga ahli', 'Spesies tetap hidup dalam interaksi ekosistem alami', 'Mudah dikontrol', 'Tanpa hukum']),
                'explanation' => 'Di habitat asli, tumbuhan terus berevolusi bersama serangga penyerbuk dan kondisi alam, menjaga keaslian genetiknya.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Jika hutan hujan tropis Sumatra mengalami fragmentasi habitat, dampak paling besar bagi Rafflesia arnoldii adalah …',
                'image' => null,
                'options' => json_encode(['Menurunnya curah hujan', 'Hilangnya tumbuhan inang tempat hidupnya', 'Berkurangnya unsur hara tanah', 'Naiknya suhu udara', 'Persaingan dengan tumbuhan lain']),
                'explanation' => 'Rafflesia adalah parasit obligat. Tanpa tumbuhan inang (Tetrastigma) yang sehat, ia tidak bisa hidup sama sekali.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Kelangkaan tumbuhan endemik Indonesia sangat sulit dipulihkan karena …',
                'image' => null,
                'options' => json_encode(['Masa hidup pendek', 'Tumbuh di dataran rendah', 'Persebaran terbatas & bergantung habitat spesifik', 'Tidak berbunga', 'Tidak bisa diserbukkan']),
                'explanation' => 'Tumbuhan endemik biasanya hanya cocok di satu lokasi spesifik. Jika lokasi itu rusak, mereka tidak bisa pindah ke tempat lain.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 3,
                'question' => 'Berikut yang bukan termasuk tujuan utama pembentukan cagar alam adalah …',
                'image' => null,
                'options' => json_encode(['Melindungi flora endemik', 'Menjaga proses ekologi', 'Mencegah eksploitasi', 'Mengembangkan industri kehutanan', 'Melestarikan plasma nutfah']),
                'explanation' => 'Cagar Alam adalah kawasan konservasi mutlak, kegiatan industri kehutanan (penebangan) dilarang keras di sana.'
            ],
            [
                'category' => 'flora', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Kerusakan habitat paling berdampak besar terhadap tumbuhan langka karena …',
                'image' => null,
                'options' => json_encode(['Turunnya wisatawan', 'Rantai makanan berubah', 'Menghilangkan tempat hidup dan berkembang biak', 'Kurang indah', 'Tumbuhan asing']),
                'explanation' => 'Habitat adalah "rumah". Jika rumahnya hancur, tumbuhan langka kehilangan tempat mencari makan dan berkembang biak.'
            ],

            // ==========================================
            // KATEGORI: FAUNA (50 SOAL)
            // ==========================================

            // --- LEVEL MUDAH ---
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 1,
                'question' => 'Hewan endemik Indonesia yang berasal dari NTT adalah …',
                'image' => 'fauna_komodo.jpg', // [KEEP] Ikonik
                'options' => json_encode(['Orangutan', 'Komodo', 'Harimau', 'Badak', 'Gajah']),
                'explanation' => 'Komodo (Varanus komodoensis) adalah kadal purba terbesar yang hanya ada di Nusa Tenggara Timur.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 4,
                'question' => 'Pulau asli habitat komodo adalah …',
                'image' => null,
                'options' => json_encode(['Sumatra', 'Kalimantan', 'Jawa', 'Sulawesi', 'Nusa Tenggara']),
                'explanation' => 'Taman Nasional Komodo terletak di Kepulauan Nusa Tenggara.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Harimau Sumatra termasuk hewan …',
                'image' => null,
                'options' => json_encode(['Herbivora', 'Omnivora', 'Karnivora', 'Insektivora', 'Detritivora']),
                'explanation' => 'Harimau Sumatra adalah pemakan daging (karnivora) yang memangsa babi hutan dan rusa.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 1,
                'question' => 'Burung Cendrawasih banyak ditemukan di …',
                'image' => null,
                'options' => json_encode(['Jawa', 'Papua', 'Bali', 'Sumatra', 'Kalimantan']),
                'explanation' => 'Papua dikenal sebagai "Bumi Cendrawasih" karena keragaman burung surga ini di sana.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Orangutan hidup alami di pulau …',
                'image' => null,
                'options' => json_encode(['Jawa', 'Papua', 'Kalimantan & Sumatra', 'Bali', 'Lombok']),
                'explanation' => 'Hanya dua pulau di dunia yang menjadi habitat asli Orangutan: Kalimantan (Borneo) dan Sumatra.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Gajah Sumatra adalah hewan yang dilindungi karena …',
                'image' => null,
                'options' => json_encode(['Berbahaya', 'Jinak', 'Hampir punah', 'Kecil', 'Cepat']),
                'explanation' => 'Perburuan gading dan konflik lahan membuat Gajah Sumatra berstatus Sangat Terancam Punah (Critically Endangered).'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3,
                'question' => 'Badak Jawa merupakan fauna khas pulau …',
                'image' => null,
                'options' => json_encode(['Sumatra', 'Kalimantan', 'Papua', 'Jawa', 'Sulawesi']),
                'explanation' => 'Sesuai namanya, Badak Jawa adalah endemik Pulau Jawa, kini hanya tersisa di Ujung Kulon.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 1,
                'question' => 'Hewan laut khas Indonesia adalah …',
                'image' => null,
                'options' => json_encode(['Panda', 'Dugong', 'Kanguru', 'Beruang', 'Zebra']),
                'explanation' => 'Dugong adalah mamalia laut pemakan lamun yang hidup di perairan dangkal Indonesia.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 3,
                'question' => 'Anoa merupakan fauna endemik …',
                'image' => null,
                'options' => json_encode(['Papua', 'Jawa', 'Sumatra', 'Sulawesi', 'Bali']),
                'explanation' => 'Anoa adalah kerbau kerdil yang hanya bisa ditemukan di hutan-hutan Sulawesi.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'mudah', 'points' => 25, 'correct_index' => 2,
                'question' => 'Jalak Bali berasal dari pulau …',
                'image' => null,
                'options' => json_encode(['Jawa', 'Sumatra', 'Bali', 'Lombok', 'Kalimantan']),
                'explanation' => 'Burung berbulu putih indah dengan pelupuk mata biru ini adalah maskot fauna Pulau Bali.'
            ],

            // --- LEVEL SEDANG ---
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2,
                'question' => 'Orangutan termasuk mamalia karena …',
                'image' => null,
                'options' => json_encode(['Bertelur', 'Bersisik', 'Menyusui', 'Hidup di pohon', 'Karnivora']),
                'explanation' => 'Mamalia adalah hewan yang memiliki kelenjar susu (mammae) untuk menyusui anaknya, seperti Orangutan.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Komodo dikategorikan sebagai reptil karena …',
                'image' => null,
                'options' => json_encode(['Bertaring', 'Berdarah dingin & bersisik', 'Menyusui', 'Berambut', 'Hidup di air']),
                'explanation' => 'Komodo adalah hewan ektoterm (berdarah dingin), tubuhnya bersisik, dan bertelur, ciri khas reptil.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2,
                'question' => 'Habitat alami badak Jawa saat ini berada di …',
                'image' => null,
                'options' => json_encode(['Gunung Leuser', 'Baluran', 'Ujung Kulon', 'Way Kambas', 'Meru Betiri']),
                'explanation' => 'TN Ujung Kulon di Banten adalah benteng terakhir populasi Badak Jawa di dunia.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Fauna Indonesia bagian barat didominasi tipe …',
                'image' => null,
                'options' => json_encode(['Australis', 'Oriental (Asiatis)', 'Peralihan', 'Kutub', 'Padang rumput']),
                'explanation' => 'Karena sejarah geologis Paparan Sunda, fauna Indonesia Barat mirip dengan fauna benua Asia (Gajah, Harimau).'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Contoh fauna peralihan (Wallacea) adalah …',
                'image' => null,
                'options' => json_encode(['Gajah', 'Anoa & Babirusa', 'Orangutan', 'Harimau', 'Badak']),
                'explanation' => 'Fauna peralihan (Sulawesi/Nusa Tenggara) memiliki ciri unik campuran Asia-Australia atau endemik khas.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2,
                'question' => 'Burung khas Papua yang berwarna cerah adalah …',
                'image' => null,
                'options' => json_encode(['Elang', 'Merak', 'Cendrawasih', 'Jalak', 'Kakatua']),
                'explanation' => 'Warna-warni bulu Cendrawasih jantan berevolusi untuk menarik perhatian betina saat musim kawin.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Hewan endemik Kalimantan yang hidup di hutan hujan adalah …',
                'image' => null,
                'options' => json_encode(['Komodo', 'Orangutan & Bekantan', 'Anoa', 'Kasuari', 'Kanguru']),
                'explanation' => 'Selain Orangutan, Bekantan (monyet hidung panjang) juga merupakan primata khas Kalimantan.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 1,
                'question' => 'Dugong sering disebut juga …',
                'image' => null,
                'options' => json_encode(['Paus kecil', 'Ikan duyung', 'Lumba-lumba', 'Hiu jinak', 'Singa laut']),
                'explanation' => 'Legenda putri duyung konon berasal dari pelaut yang melihat Dugong sedang menyusui anaknya.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 2,
                'question' => 'Kawasan konservasi dibuat bertujuan untuk …',
                'image' => null,
                'options' => json_encode(['Wisata', 'Berburu', 'Melindungi fauna & habitat', 'Pemukiman', 'Industri']),
                'explanation' => 'Tujuan utama konservasi adalah memastikan kelestarian satwa dan tumbuhan agar tidak punah.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sedang', 'points' => 50, 'correct_index' => 0,
                'question' => 'Harimau Sumatra berbeda dengan harimau lain karena …',
                'image' => null,
                'options' => json_encode(['Ukuran terkecil & loreng rapat', 'Tidak bertaring', 'Herbivora', 'Hidup di air', 'Tidak berbulu']),
                'explanation' => 'Harimau Sumatra adalah subspesies harimau terkecil yang masih hidup, dengan loreng yang lebih gelap dan rapat.'
            ],

            // --- LEVEL SULIT ---
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0,
                'question' => 'Garis Wallace memisahkan fauna Indonesia bagian …',
                'image' => null,
                'options' => json_encode(['Barat (Asiatis) – Tengah (Peralihan)', 'Utara–Selatan', 'Darat–Laut', 'Pegunungan', 'Pulau']),
                'explanation' => 'Garis imajiner ini membentang di Selat Lombok dan Makassar, memisahkan fauna Asia dengan fauna unik Wallacea.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3,
                'question' => 'Fauna Australis banyak ditemukan di wilayah …',
                'image' => null,
                'options' => json_encode(['Sumatra', 'Jawa', 'Kalimantan', 'Papua', 'Bali']),
                'explanation' => 'Papua berada di Paparan Sahul yang menyatu dengan Australia, sehingga faunanya (seperti marsupial) mirip.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Ciri utama fauna tipe Oriental (Asiatis) adalah …',
                'image' => null,
                'options' => json_encode(['Berkantung', 'Bertelur', 'Mamalia besar', 'Berparuh', 'Bersisik']),
                'explanation' => 'Fauna Asiatis identik dengan mamalia berukuran besar seperti Gajah, Badak, dan Harimau.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1,
                'question' => 'Anoa memiliki kekerabatan paling dekat dengan …',
                'image' => null,
                'options' => json_encode(['Kuda', 'Kerbau', 'Sapi', 'Rusa', 'Kambing']),
                'explanation' => 'Secara genetik, Anoa adalah kerbau liar kerdil yang berevolusi terisolasi di pulau Sulawesi.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1,
                'question' => 'Burung kasuari termasuk fauna …',
                'image' => null,
                'options' => json_encode(['Oriental', 'Australis', 'Peralihan', 'Padang pasir', 'Kutub']),
                'explanation' => 'Kasuari adalah burung besar tak bisa terbang khas fauna Australis yang hidup di Papua.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Penurunan populasi fauna Indonesia banyak disebabkan oleh …',
                'image' => null,
                'options' => json_encode(['Gempa', 'Tsunami', 'Perburuan liar & habitat hilang', 'Hujan', 'Angin']),
                'explanation' => 'Aktivitas manusia seperti berburu dan menebang hutan adalah ancaman terbesar bagi satwa liar.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 1,
                'question' => 'Taman Nasional Way Kambas terkenal sebagai habitat …',
                'image' => null,
                'options' => json_encode(['Komodo', 'Gajah Sumatra', 'Badak Jawa', 'Anoa', 'Orangutan']),
                'explanation' => 'TN Way Kambas di Lampung memiliki Pusat Latihan Gajah (PLG) dan suaka Badak Sumatra.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Mamalia berkantung khas Papua adalah …',
                'image' => null,
                'options' => json_encode(['Kuda', 'Orangutan', 'Kanguru pohon', 'Gajah', 'Harimau']),
                'explanation' => 'Kanguru Pohon (Dendrolagus) adalah marsupial yang beradaptasi untuk hidup memanjat pohon di hutan Papua.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0,
                'question' => 'Hewan nokturnal endemik Indonesia adalah …',
                'image' => null,
                'options' => json_encode(['Tarsius', 'Gajah', 'Jalak', 'Merak', 'Anoa']),
                'explanation' => 'Tarsius Sulawesi aktif di malam hari (nokturnal) dan memiliki mata yang sangat besar untuk melihat dalam gelap.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Perbedaan fauna Barat dan Timur Indonesia disebabkan oleh …',
                'image' => null,
                'options' => json_encode(['Iklim', 'Suhu', 'Sejarah Geologis (Paparan Sunda & Sahul)', 'Curah hujan', 'Vegetasi']),
                'explanation' => 'Sejarah geologi saat zaman es memisahkan dan menyatukan pulau-pulau, mempengaruhi persebaran hewan.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Ciri fauna peralihan adalah …',
                'image' => null,
                'options' => json_encode(['Mamalia besar', 'Berkantung', 'Campuran Barat & Timur / Endemik', 'Hidup di air', 'Hidup di kutub']),
                'explanation' => 'Fauna peralihan (seperti Maleo dan Babirusa) tidak sepenuhnya mirip Asia maupun Australia, mereka unik.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3,
                'question' => 'Hewan berikut berasal dari Sulawesi kecuali …',
                'image' => null,
                'options' => json_encode(['Anoa', 'Tarsius', 'Babirusa', 'Orangutan', 'Maleo']),
                'explanation' => 'Orangutan berasal dari Kalimantan dan Sumatra, bukan Sulawesi.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 3,
                'question' => 'Maleo termasuk hewan langka karena …',
                'image' => null,
                'options' => json_encode(['Berbahaya', 'Bertelur panas', 'Tidak bisa terbang', 'Tingkat keberhasilan menetas rendah', 'Karnivora']),
                'explanation' => 'Telur Maleo ditimbun di pasir panas. Ancamannya adalah predator yang mencuri telur dan kerusakan habitat pantai.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 0,
                'question' => 'Hewan yang berperan penting menjaga keseimbangan ekosistem hutan sebagai pemangsa adalah …',
                'image' => null,
                'options' => json_encode(['Predator', 'Herbivora', 'Detritivora', 'Omnivora', 'Insektivora']),
                'explanation' => 'Predator mengontrol populasi hewan pemakan tumbuhan agar hutan tidak gundul dimakan herbivora.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sulit', 'points' => 75, 'correct_index' => 2,
                'question' => 'Komodo termasuk predator puncak karena …',
                'image' => null,
                'options' => json_encode(['Terbesar', 'Paling cepat', 'Tidak punya musuh alami di habitatnya', 'Beracun', 'Hidup lama']),
                'explanation' => 'Di ekosistem pulau Komodo, komodo dewasa berada di puncak rantai makanan.'
            ],

            // --- LEVEL SANGAT SULIT ---
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Indonesia disebut negara megabiodiversitas karena …',
                'image' => null,
                'options' => json_encode(['Luas wilayah', 'Banyak gunung', 'Keanekaragaman fauna tinggi', 'Iklim panas', 'Banyak laut']),
                'explanation' => 'Indonesia memiliki jumlah spesies mamalia dan burung salah satu yang terbanyak di dunia.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Spesies endemik berarti …',
                'image' => null,
                'options' => json_encode(['Langka', 'Dilindungi', 'Hanya ada di wilayah geografis tertentu', 'Berbahaya', 'Besar']),
                'explanation' => 'Contoh endemik: Cendrawasih (Papua), Bekantan (Kalimantan). Mereka tidak ditemukan secara alami di tempat lain.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Punahnya fauna dapat menyebabkan …',
                'image' => null,
                'options' => json_encode(['Banjir', 'Rantai makanan terganggu', 'Gempa', 'Tsunami', 'Gunung meletus']),
                'explanation' => 'Setiap hewan punya peran. Jika satu punah, keseimbangan jaring-jaring makanan akan runtuh.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Hilangnya predator puncak akan menyebabkan …',
                'image' => null,
                'options' => json_encode(['Populasi stabil', 'Ledakan populasi mangsa (overpopulasi)', 'Hutan subur', 'Laut tenang', 'Iklim dingin']),
                'explanation' => 'Tanpa Harimau, populasi Babi Hutan akan meledak dan merusak lahan pertanian warga.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Upaya paling efektif melestarikan fauna adalah …',
                'image' => null,
                'options' => json_encode(['Penangkaran', 'Edukasi & konservasi habitat', 'Perburuan', 'Eksploitasi', 'Penebangan']),
                'explanation' => 'Melindungi rumah mereka (habitat) dan mengedukasi masyarakat adalah kunci keberhasilan konservasi jangka panjang.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Wallacea memiliki keunikan karena …',
                'image' => null,
                'options' => json_encode(['Fauna seragam', 'Fauna kutub', 'Zona transisi zoogeografi', 'Tidak berpenghuni', 'Laut dangkal']),
                'explanation' => 'Kawasan Wallacea adalah laboratorium evolusi alamiah yang memadukan elemen Asia dan Australia.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Komodo berperan penting dalam ekosistem sebagai …',
                'image' => null,
                'options' => json_encode(['Produsen', 'Konsumen puncak (Karnivora)', 'Pengurai', 'Herbivora', 'Insektivora']),
                'explanation' => 'Sebagai top predator, Komodo menjaga kesehatan populasi Rusa dan Kerbau liar dengan memangsa yang sakit atau tua.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Kepunahan fauna lokal dapat berdampak pada …',
                'image' => null,
                'options' => json_encode(['Satu spesies', 'Kestabilan seluruh ekosistem', 'Cuaca', 'Gunung', 'Sungai']),
                'explanation' => 'Ekosistem bekerja seperti mesin. Jika satu komponen (fauna) hilang, mesin itu bisa rusak total.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Tarsius termasuk primata kecil yang aktif …',
                'image' => null,
                'options' => json_encode(['Siang hari', 'Pagi hari', 'Malam hari (Nokturnal)', 'Sore hari', 'Sepanjang hari']),
                'explanation' => 'Mata Tarsius tidak bisa digerakkan, jadi ia memutar kepalanya 180 derajat untuk melihat mangsa di malam hari.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Kerusakan habitat paling banyak disebabkan oleh …',
                'image' => null,
                'options' => json_encode(['Banjir', 'Letusan gunung', 'Aktivitas manusia (Antropogenik)', 'Hujan', 'Angin']),
                'explanation' => 'Deforestasi, pertambangan, dan perluasan lahan oleh manusia adalah penyebab utama hilangnya biodiversitas.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Fauna Indonesia Timur cenderung memiliki …',
                'image' => null,
                'options' => json_encode(['Mamalia besar', 'Hewan berkantung (Marsupial)', 'Reptil besar', 'Serangga kecil', 'Hewan air']),
                'explanation' => 'Pengaruh benua Australia membuat Papua kaya akan hewan berkantung seperti Kuskus dan Kanguru.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Pelestarian in-situ berarti …',
                'image' => null,
                'options' => json_encode(['Di kebun binatang', 'Di luar habitat', 'Di habitat asli', 'Di laboratorium', 'Di kota']),
                'explanation' => 'Contoh in-situ: Melindungi Badak Jawa tetap di Ujung Kulon, bukan memindahkannya ke kandang di kota.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Jika satu spesies punah, dampak awal terlihat pada …',
                'image' => null,
                'options' => json_encode(['Manusia', 'Tumbuhan', 'Rantai makanan', 'Iklim', 'Tanah']),
                'explanation' => 'Spesies yang memangsa atau dimangsa oleh hewan punah tersebut akan langsung mengalami gangguan populasi.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 1,
                'question' => 'Perburuan ilegal mengancam fauna karena …',
                'image' => null,
                'options' => json_encode(['Mengganggu wisata', 'Mengurangi populasi lebih cepat dari reproduksi', 'Mengotori hutan', 'Membuat bising', 'Merusak tanah']),
                'explanation' => 'Hewan butuh waktu lama untuk berkembang biak. Jika diburu terus menerus, mereka habis sebelum sempat punya anak.'
            ],
            [
                'category' => 'fauna', 'difficulty' => 'sangat_sulit', 'points' => 100, 'correct_index' => 2,
                'question' => 'Cara terbaik menjaga fauna Indonesia adalah …',
                'image' => null,
                'options' => json_encode(['Berburu terbatas', 'Eksploitasi', 'Konservasi berkelanjutan', 'Pemanfaatan bebas', 'Penjualan']),
                'explanation' => 'Konservasi berkelanjutan memastikan alam tetap lestari untuk dinikmati generasi masa depan.'
            ],
        ];

        // Insert Batch agar cepat
        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}