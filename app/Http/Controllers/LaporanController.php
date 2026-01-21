<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display the forum laporan page for Admin.
     */
    public function index()
    {
        // Sample laporan data (in production, this would come from database)
        $laporans = [
            [
                'id' => 1,
                'title' => 'Penemuan Harimau Sumatera di Kawasan Hutan Lindung',
                'author' => 'Budi Santoso',
                'avatar' => null,
                'created_at' => '2 jam yang lalu',
                'status' => 'proses',
                'description' => 'Terlihat satu ekor harimau sumatera melintas di area blok B hutan lindung pada pagi hari.',
                'image' => 'https://images.unsplash.com/photo-1561731216-c3a4d99437d5?w=600',
                'location' => 'Taman Nasional Gunung Leuser, Aceh',
                'coordinates' => '3.7833° N, 97.3167° E',
                'time' => '08:45 WIB',
                'animal_name' => 'Harimau Sumatera (Panthera tigris sumatrae)',
            ],
            [
                'id' => 2,
                'title' => 'Laporan Aktivitas Penebangan Liar di Taman Nasional',
                'author' => 'Siti Rahayu',
                'avatar' => null,
                'created_at' => '5 jam yang lalu',
                'status' => 'proses',
                'description' => 'Suara gergaji mesin terdengar di zona inti taman nasional. Perlu investigasi segera.',
                'image' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?w=600',
                'location' => 'Taman Nasional Kerinci Seblat, Jambi',
                'coordinates' => '1.6964° S, 101.2656° E',
                'time' => '14:30 WIB',
                'animal_name' => '-',
            ],
            [
                'id' => 3,
                'title' => 'Identifikasi Spesies Burung Langka di Raja Ampat',
                'author' => 'Ahmad Fadli',
                'avatar' => null,
                'created_at' => '1 hari yang lalu',
                'status' => 'selesai',
                'description' => 'Berhasil memotret spesies Cenderawasih Merah yang sedang melakukan tarian jemputan.',
                'image' => 'https://images.unsplash.com/photo-1555169062-013468b47731?w=600',
                'location' => 'Raja Ampat, Papua Barat',
                'coordinates' => '0.2333° S, 130.5167° E',
                'time' => '06:15 WIB',
                'animal_name' => 'Cenderawasih Merah (Paradisaea rubra)',
            ],
            [
                'id' => 4,
                'title' => 'Dampak Perubahan Iklim terhadap Ekosistem Terumbu Karang',
                'author' => 'Maya Putri',
                'avatar' => null,
                'created_at' => '2 hari yang lalu',
                'status' => 'selesai',
                'description' => 'Terjadi pemutihan karang (bleaching) di beberapa titik dangkal akibat kenaikan suhu air laut.',
                'image' => 'https://images.unsplash.com/photo-1546026423-cc4642628d2b?w=600',
                'location' => 'Kepulauan Bunaken, Sulawesi Utara',
                'coordinates' => '1.6233° N, 124.7622° E',
                'time' => '10:00 WIB',
                'animal_name' => 'Penyu Hijau (Chelonia mydas)',
            ],
            [
                'id' => 5,
                'title' => 'Program Reboisasi Mangrove di Pesisir Pantai Utara',
                'author' => 'Dewi Lestari',
                'avatar' => null,
                'created_at' => '3 hari yang lalu',
                'status' => 'selesai',
                'description' => 'Penanaman 1000 bibit mangrove telah selesai dilaksanakan bersama komunitas lokal.',
                'image' => 'https://images.unsplash.com/photo-1569163139599-0f4517e36f31?w=600',
                'location' => 'Pantai Utara Jawa, Semarang',
                'coordinates' => '6.9667° S, 110.4167° E',
                'time' => '07:30 WIB',
                'animal_name' => 'Kepiting Bakau (Scylla serrata)',
            ],
        ];

        return view('admin.laporan', compact('laporans'));
    }

    /**
     * Display laporan page for Jagawana.
     * Includes sensitive data like precise coordinates for operations.
     */
    public function jagawanaIndex()
    {
        $laporans = [
            [
                'id' => 1,
                'title' => 'Penemuan Jejak Harimau di Blok A',
                'status' => 'selesai',
                'created_at' => '2 jam yang lalu',
                'location' => 'Blok A, Kawasan Hutan Lindung',
                'description' => 'Jejak kaki segar ditemukan di dekat sumber mata air. Ukuran sekitar 15cm.',
                'coordinates' => '-6.595038, 106.816635', // Jagawana boleh lihat ini
                'priority' => 'high'
            ],
            [
                'id' => 2,
                'title' => 'Aktivitas Mencurigakan dekat Sungai',
                'status' => 'proses',
                'created_at' => '1 hari yang lalu',
                'location' => 'Sungai Cikapundung',
                'description' => 'Ditemukan sisa api unggun dan sampah plastik di area terlarang.',
                'coordinates' => '-6.914744, 107.609810',
                'priority' => 'medium'
            ],
        ];

        return view('user.jagawana.laporan', compact('laporans'));
    }

    /**
     * Show form to create new report (Jagawana).
     */
    public function create()
    {
        return view('user.jagawana.laporkan');
    }

    /**
     * Display laporan page for Warga.
     * SECURITY: This method MUST NOT return detailed coordinates.
     */
    public function wargaIndex()
    {
        // Sample laporan data for warga - WITHOUT COORDINATES
        $laporans = [
            [
                'id' => 1,
                'title' => 'Laporan Saya: Pohon Tumbang',
                'status' => 'selesai',
                'created_at' => '3 hari yang lalu',
                'location' => 'Jalan Raya Bogor KM 30', // Lokasi umum text saja
                'description' => 'Ada pohon besar yang tumbang menghalangi jalan...',
            ],
            [
                'id' => 2,
                'title' => 'Tumpukan Sampah Liar',
                'status' => 'proses',
                'created_at' => '5 hari yang lalu',
                'location' => 'Pinggir Sungai Ciliwung',
                'description' => 'Banyak sampah menumpuk dan bau menyengat.',
            ],
        ];

        return view('user.warga.laporan', compact('laporans'));
    }

    /**
     * Store a new report (Jagawana).
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|string',
        ]);

        // TODO: Save to database
        // For now, just redirect with success message
        return redirect()->route('jagawana.laporan')->with('success', 'Laporan berhasil dikirim!');
    }
}
