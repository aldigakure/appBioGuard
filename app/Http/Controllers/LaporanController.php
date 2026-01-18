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
            ],
            [
                'id' => 2,
                'title' => 'Laporan Aktivitas Penebangan Liar di Taman Nasional',
                'author' => 'Siti Rahayu',
                'avatar' => null,
                'created_at' => '5 jam yang lalu',
                'comments_count' => 8,
            ],
            [
                'id' => 3,
                'title' => 'Identifikasi Spesies Burung Langka di Raja Ampat',
                'author' => 'Ahmad Fadli',
                'avatar' => null,
                'created_at' => '1 hari yang lalu',
                'comments_count' => 24,
            ],
            [
                'id' => 4,
                'title' => 'Dampak Perubahan Iklim terhadap Ekosistem Terumbu Karang',
                'author' => 'Maya Putri',
                'avatar' => null,
                'created_at' => '2 hari yang lalu',
                'comments_count' => 16,
            ],
            [
                'id' => 5,
                'title' => 'Program Reboisasi Mangrove di Pesisir Pantai Utara',
                'author' => 'Dewi Lestari',
                'avatar' => null,
                'created_at' => '3 hari yang lalu',
                'comments_count' => 31,
            ],
        ];

        return view('admin.laporan', compact('laporans'));
    }
}
