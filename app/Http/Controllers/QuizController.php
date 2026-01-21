<?php

namespace App\Http\Controllers;

use App\Models\Gamification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;

class QuizController extends Controller
{
    // Halaman Utama Game (Lobby)
    public function index()
    {
        // Arahkan ke file blade yang baru kita buat
        return view('user.gamification.quiz');
    }

    // API untuk mengambil soal (AJAX)
    public function getQuestions(Request $request)
    {
        $category = $request->query('category', 'flora'); // default flora
        $difficulty = $request->query('difficulty', 'all'); // default semua level

        $query = Question::where('category', $category);

        if ($difficulty !== 'all') {
            $query->where('difficulty', $difficulty);
        }

        // Ambil 10 soal secara acak
        $questions = $query->inRandomOrder()->limit(10)->get();

        return response()->json($questions);
    }

    // API Simpan Skor (POST)
    public function store(Request $request)
    {
        // 1. Validasi
        $validated = $request->validate([
            'score' => 'required|integer',
            'streak' => 'required|integer',
        ]);

        $user = Auth::user();

        // 2. Cari data game user ini
        $gameData = Gamification::where('user_id', $user->id)->first();

        if ($gameData) {
            // JIKA SUDAH ADA: Update poinnya (ditambahkan)
            $gameData->total_points += $validated['score'];
            
            // Cek apakah streak sekarang rekor baru?
            if ($validated['streak'] > $gameData->highest_streak) {
                $gameData->highest_streak = $validated['streak'];
            }
            
            $gameData->save();
        } else {
            // JIKA BELUM ADA: Buat baru
            $gameData = Gamification::create([
                'user_id' => $user->id,
                'total_points' => $validated['score'],
                'highest_streak' => $validated['streak'],
                'badge_level' => 'Ranger Pemula',
            ]);
        }

        return response()->json([
            'message' => 'Skor berhasil diamankan!', 
            'total_points' => $gameData->total_points
        ]);
    }
}
