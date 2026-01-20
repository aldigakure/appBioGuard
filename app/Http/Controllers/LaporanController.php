<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display the forum laporan page.
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
                'comments_count' => 12,
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
                'comments_count' => 8,
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
                'comments_count' => 24,
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
                'comments_count' => 16,
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
                'comments_count' => 31,
                'image' => 'https://images.unsplash.com/photo-1569163139599-0f4517e36f31?w=600',
                'location' => 'Pantai Utara Jawa, Semarang',
                'coordinates' => '6.9667° S, 110.4167° E',
                'time' => '07:30 WIB',
                'animal_name' => 'Kepiting Bakau (Scylla serrata)',
            ],
        ];

        return view('admin.laporan', compact('laporans'));
    }
}

