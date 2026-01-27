<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display the Species page with filter functionality.
     */
    public function index()
    {
        $species = [
            // FAUNA
            [
                'name' => 'Orangutan Kalimantan',
                'latin' => 'Pongo pygmaeus',
                'type' => 'fauna',
                'category_label' => 'Mamalia',
                'badge_color' => '#fef3c7', // Peach
                'badge_text' => '#d97706',
                'date' => '13 Jan 2026',
                'location' => 'TN Tanjung Puting',
                'author' => 'Maya Putri',
                'author_role' => 'Volunteer',
                'initials' => 'MP',
                'image' => '🦧',
                'status' => 'Kritis',
                'color' => '#f59e0b'
            ],
            [
                'name' => 'Harimau Sumatera',
                'latin' => 'Panthera tigris sumatrae',
                'type' => 'fauna',
                'category_label' => 'Mamalia',
                'badge_color' => '#fef3c7',
                'badge_text' => '#d97706',
                'date' => '13 Jan 2026',
                'location' => 'TN Kerinci Seblat',
                'author' => 'Siti Rahayu',
                'author_role' => 'Researcher',
                'initials' => 'SR',
                'image' => '🐅',
                'status' => 'Kritis',
                'color' => '#f59e0b'
            ],
            [
                'name' => 'Kakatua Raja',
                'latin' => 'Probosciger aterrimus',
                'type' => 'fauna',
                'category_label' => 'Fauna',
                'badge_color' => '#e0f2fe', // Light Blue
                'badge_text' => '#0ea5e9',
                'date' => '13 Jan 2026',
                'location' => 'Raja Ampat, Papua',
                'author' => 'Budi Santoso',
                'author_role' => 'Volunteer',
                'initials' => 'BS',
                'image' => '🦜',
                'status' => 'Dilindungi',
                'color' => '#06b6d4'
            ],
            [
                'name' => 'Komodo',
                'latin' => 'Varanus komodoensis',
                'type' => 'fauna',
                'category_label' => 'Reptil',
                'badge_color' => '#ffedd5', // Orange
                'badge_text' => '#ea580c',
                'date' => '12 Jan 2026',
                'location' => 'Pulau Komodo, NTT',
                'author' => 'Ahmad Fadli',
                'author_role' => 'Jagawana',
                'initials' => 'AF',
                'image' => '🦎',
                'status' => 'Langka',
                'color' => '#f59e0b'
            ],
            [
                'name' => 'Badak Jawa',
                'latin' => 'Rhinoceros sondaicus',
                'type' => 'fauna',
                'category_label' => 'Mamalia',
                'badge_color' => '#fef3c7',
                'badge_text' => '#d97706',
                'date' => '11 Jan 2026',
                'location' => 'TN Ujung Kulon',
                'author' => 'Siti Rahayu',
                'author_role' => 'Researcher',
                'initials' => 'SR',
                'image' => '🦏',
                'status' => 'Kritis',
                'color' => '#f59e0b'
            ],
            
            // FLORA
            [
                'name' => 'Rafflesia Arnoldii',
                'latin' => 'Rafflesia arnoldii',
                'type' => 'flora',
                'category_label' => 'Flora',
                'badge_color' => '#f3e8ff', // Purple
                'badge_text' => '#9333ea',
                'date' => '13 Jan 2026',
                'location' => 'Bengkulu',
                'author' => 'Dewi Lestari',
                'author_role' => 'Botanist',
                'initials' => 'DL',
                'image' => '🌺',
                'status' => 'Langka',
                'color' => '#8b5cf6'
            ],
            [
                'name' => 'Anggrek Hitam',
                'latin' => 'Coelogyne pandurata',
                'type' => 'flora',
                'category_label' => 'Flora',
                'badge_color' => '#f3e8ff',
                'badge_text' => '#9333ea',
                'date' => '10 Jan 2026',
                'location' => 'Kaltim',
                'author' => 'Maya Putri',
                'author_role' => 'Volunteer',
                'initials' => 'MP',
                'image' => '🌸',
                'status' => 'Dilindungi',
                'color' => '#06b6d4'
            ],
            [
                'name' => 'Kantong Semar',
                'latin' => 'Nepenthes spp.',
                'type' => 'flora',
                'category_label' => 'Flora',
                'badge_color' => '#f3e8ff',
                'badge_text' => '#9333ea',
                'date' => '09 Jan 2026',
                'location' => 'Riau',
                'author' => 'Budi Santoso',
                'author_role' => 'Volunteer',
                'initials' => 'BS',
                'image' => '🪴',
                'status' => 'Dilindungi',
                'color' => '#06b6d4'
            ],
        ];

        return view('user.spesies', compact('species'));
    }
}
