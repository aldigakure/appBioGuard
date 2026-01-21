@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/spesies.css') }}">
@endsection

@section('content')
@include('layouts.navbar-dashboard')

<div class="spesies-container">
    <div class="spesies-header">
        <h1 class="spesies-title">Eksplorasi Spesies Indonesia</h1>
        <p class="spesies-subtitle">
            Jelajahi kekayaan keanekaragaman hayati nusantara melalui pengamatan jagawana dan relawan.
        </p>
    </div>

    <div class="filter-section">
        <button class="filter-btn active" onclick="filterSpecies('all', this)">
            Semua
        </button>
        <button class="filter-btn" onclick="filterSpecies('fauna', this)">
            Fauna
        </button>
        <button class="filter-btn" onclick="filterSpecies('flora', this)">
            Flora
        </button>
    </div>

    <div class="species-grid" id="speciesGrid">
        @foreach($species as $index => $item)
        <div class="species-card" data-type="{{ $item['type'] }}">
            <div class="species-header-mascot">
                {{ $item['image'] }}
            </div>
            <div class="species-content">
                <div class="content-top">
                    <span class="date-text">{{ $item['date'] }}</span>
                    <span class="category-badge" style="background: {{ $item['badge_color'] }}; color: {{ $item['badge_text'] }};">
                        {{ $item['category_label'] }}
                    </span>
                </div>
                
                <h3 class="species-title-main">{{ $item['name'] }}</h3>
                <span class="species-latin-main">{{ $item['latin'] }}</span>
                
                <div class="location-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>{{ $item['location'] }}</span>
                </div>

                <div class="author-footer">
                    <div class="author-info">
                        <div class="author-initials">
                            {{ $item['initials'] }}
                        </div>
                        <div class="author-details">
                            <span class="author-name">{{ $item['author'] }}</span>
                            <span class="author-role">{{ $item['author_role'] }}</span>
                        </div>
                    </div>
                    <a href="#" class="detail-btn">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function filterSpecies(type, btn) {
        // Update active button
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const cards = document.querySelectorAll('.species-card');
        
        cards.forEach(card => {
            if (type === 'all' || card.getAttribute('data-type') === type) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    }
</script>
@endsection
