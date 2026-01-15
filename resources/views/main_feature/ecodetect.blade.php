@extends('layouts.app')

@section('content')
<!-- Peta Indonesia Interactive Map Page -->
<div class="bioguard-header">
    <div class="bioguard-header-content">
        <div class="bioguard-header-nav">
            <a href="{{ url('/') }}#features" class="bioguard-back-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Kembali
            </a>
            <div class="bioguard-header-badge">
                <span>🗺️</span>
                <span>EcoDetect - Peta Interaktif</span>
            </div>
        </div>
        <h1 class="bioguard-header-title">Peta Interaktif <span class="text-gradient">Habitat Flora Indonesia</span></h1>
        <p class="bioguard-header-desc">Jelajahi sebaran habitat dan temukan spesies flora langka di setiap provinsi Indonesia.</p>
    </div>
</div>

<!-- Interactive Map Section -->
<section class="bioguard-section peta-map-section">
    <div class="bioguard-container">
        <div class="peta-layout">
            <!-- Map Container -->
            <div class="peta-map-wrapper">
                <div id="indonesia-map" class="peta-map-canvas"></div>
                <div class="peta-legend">
                    <div class="peta-legend-title">Tingkat Keanekaragaman Flora</div>
                    <div class="peta-legend-items">
                        <div class="peta-legend-item">
                            <span class="peta-legend-color" style="background: #064e3b;"></span>
                            <span>Sangat Tinggi (>500 spesies)</span>
                        </div>
                        <div class="peta-legend-item">
                            <span class="peta-legend-color" style="background: #059669;"></span>
                            <span>Tinggi (300-500 spesies)</span>
                        </div>
                        <div class="peta-legend-item">
                            <span class="peta-legend-color" style="background: #34d399;"></span>
                            <span>Sedang (150-300 spesies)</span>
                        </div>
                        <div class="peta-legend-item">
                            <span class="peta-legend-color" style="background: #a7f3d0;"></span>
                            <span>Rendah (<150 spesies)</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Province Detail Panel -->
            <div class="peta-detail-panel" id="provinceDetailPanel">
                <div class="peta-detail-placeholder" id="detailPlaceholder">
                    <div class="peta-detail-placeholder-icon">🗺️</div>
                    <h3>Pilih Provinsi</h3>
                    <p>Klik pada peta untuk melihat detail spesies flora di setiap provinsi</p>
                </div>
                
                <div class="peta-detail-content" id="detailContent" style="display: none;">
                    <div class="peta-detail-header">
                        <div class="peta-detail-icon" id="provinceIcon">🌿</div>
                        <div>
                            <h3 class="peta-detail-title" id="provinceName">-</h3>
                            <p class="peta-detail-subtitle" id="provinceRegion">-</p>
                        </div>
                    </div>
                    
                    <div class="peta-detail-stats">
                        <div class="peta-stat-item">
                            <div class="peta-stat-number" id="speciesCount">0</div>
                            <div class="peta-stat-label">Spesies Flora</div>
                        </div>
                        <div class="peta-stat-item">
                            <div class="peta-stat-number" id="endangeredCount">0</div>
                            <div class="peta-stat-label">Terancam Punah</div>
                        </div>
                        <div class="peta-stat-item">
                            <div class="peta-stat-number" id="endemicCount">0</div>
                            <div class="peta-stat-label">Endemik</div>
                        </div>
                    </div>
                    
                    <div class="peta-species-section">
                        <h4 class="peta-species-title">🌺 Spesies Unggulan</h4>
                        <div class="peta-species-list" id="speciesList">
                            <!-- Species cards will be inserted here -->
                        </div>
                    </div>
                    
                    <div class="peta-habitats-section">
                        <h4 class="peta-species-title">🌳 Tipe Habitat</h4>
                        <div class="peta-habitat-tags" id="habitatTags">
                            <!-- Habitat tags will be inserted here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="bioguard-section" style="background: white;">
    <div class="bioguard-container">
        <div class="peta-quick-stats">
            <div class="peta-quick-stat-card">
                <div class="peta-quick-stat-icon">🌿</div>
                <div class="peta-quick-stat-number">30,000+</div>
                <div class="peta-quick-stat-label">Spesies Tumbuhan</div>
            </div>
            <div class="peta-quick-stat-card">
                <div class="peta-quick-stat-icon">🌺</div>
                <div class="peta-quick-stat-number">5,000+</div>
                <div class="peta-quick-stat-label">Spesies Anggrek</div>
            </div>
            <div class="peta-quick-stat-card">
                <div class="peta-quick-stat-icon">🌴</div>
                <div class="peta-quick-stat-number">400+</div>
                <div class="peta-quick-stat-label">Spesies Palem</div>
            </div>
            <div class="peta-quick-stat-card">
                <div class="peta-quick-stat-icon">⚠️</div>
                <div class="peta-quick-stat-number">1,500+</div>
                <div class="peta-quick-stat-label">Spesies Terancam</div>
            </div>
        </div>
    </div>
</section>

<!-- Highcharts Maps Scripts -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<script>
// Flora data for each province
const floraData = {
    'id-ac': {
        name: 'Aceh',
        region: 'Sumatera',
        icon: '🌿',
        speciesCount: 320,
        endangeredCount: 45,
        endemicCount: 28,
        value: 320,
        species: [
            { name: 'Rafflesia arnoldii', latin: 'Rafflesia arnoldii', status: 'Kritis', icon: '🌺' },
            { name: 'Pinus Merkusii', latin: 'Pinus merkusii', status: 'Rentan', icon: '🌲' },
            { name: 'Damar', latin: 'Agathis dammara', status: 'Aman', icon: '🌳' }
        ],
        habitats: ['Hutan Hujan Tropis', 'Pegunungan', 'Rawa Gambut']
    },
    'id-su': {
        name: 'Sumatera Utara',
        region: 'Sumatera',
        icon: '🌴',
        speciesCount: 380,
        endangeredCount: 52,
        endemicCount: 35,
        value: 380,
        species: [
            { name: 'Bunga Bangkai', latin: 'Amorphophallus titanum', status: 'Rentan', icon: '🌸' },
            { name: 'Pohon Kemenyan', latin: 'Styrax benzoin', status: 'Rentan', icon: '🌳' },
            { name: 'Andaliman', latin: 'Zanthoxylum acanthopodium', status: 'Aman', icon: '🌿' }
        ],
        habitats: ['Hutan Hujan Tropis', 'Danau Toba', 'Pegunungan']
    },
    'id-sb': {
        name: 'Sumatera Barat',
        region: 'Sumatera',
        icon: '🌺',
        speciesCount: 420,
        endangeredCount: 58,
        endemicCount: 42,
        value: 420,
        species: [
            { name: 'Rafflesia arnoldii', latin: 'Rafflesia arnoldii', status: 'Kritis', icon: '🌺' },
            { name: 'Kantong Semar', latin: 'Nepenthes spp.', status: 'Rentan', icon: '🪴' },
            { name: 'Anggrek Sumatera', latin: 'Bulbophyllum spp.', status: 'Aman', icon: '🌸' }
        ],
        habitats: ['Hutan Hujan Tropis', 'Pegunungan Bukit Barisan']
    },
    'id-ri': {
        name: 'Riau',
        region: 'Sumatera',
        icon: '🌳',
        speciesCount: 280,
        endangeredCount: 38,
        endemicCount: 22,
        value: 280,
        species: [
            { name: 'Gaharu', latin: 'Aquilaria malaccensis', status: 'Rentan', icon: '🌳' },
            { name: 'Meranti', latin: 'Shorea spp.', status: 'Kritis', icon: '🌲' },
            { name: 'Jelutung', latin: 'Dyera costulata', status: 'Rentan', icon: '🌳' }
        ],
        habitats: ['Hutan Rawa Gambut', 'Hutan Dataran Rendah']
    },
    'id-ja': {
        name: 'Jambi',
        region: 'Sumatera',
        icon: '🌲',
        speciesCount: 310,
        endangeredCount: 42,
        endemicCount: 25,
        value: 310,
        species: [
            { name: 'Jernang', latin: 'Daemonorops draco', status: 'Rentan', icon: '🌴' },
            { name: 'Tembesu', latin: 'Fagraea fragrans', status: 'Aman', icon: '🌳' },
            { name: 'Sialang', latin: 'Koompassia excelsa', status: 'Rentan', icon: '🌲' }
        ],
        habitats: ['Taman Nasional Kerinci Seblat', 'Hutan Gambut']
    },
    'id-be': {
        name: 'Bengkulu',
        region: 'Sumatera',
        icon: '🌺',
        speciesCount: 450,
        endangeredCount: 65,
        endemicCount: 48,
        value: 450,
        species: [
            { name: 'Rafflesia arnoldii', latin: 'Rafflesia arnoldii', status: 'Kritis', icon: '🌺' },
            { name: 'Bunga Bangkai Raksasa', latin: 'Amorphophallus titanum', status: 'Rentan', icon: '🌸' },
            { name: 'Anggrek Pensil', latin: 'Papilionanthe hookeriana', status: 'Rentan', icon: '🌸' }
        ],
        habitats: ['Taman Nasional Kerinci Seblat', 'Hutan Pegunungan']
    },
    'id-1024': {
        name: 'Sumatera Selatan',
        region: 'Sumatera',
        icon: '🌴',
        speciesCount: 290,
        endangeredCount: 35,
        endemicCount: 20,
        value: 290,
        species: [
            { name: 'Gelam', latin: 'Melaleuca cajuputi', status: 'Aman', icon: '🌳' },
            { name: 'Pulai', latin: 'Alstonia scholaris', status: 'Aman', icon: '🌲' },
            { name: 'Ramin', latin: 'Gonystylus bancanus', status: 'Kritis', icon: '🌳' }
        ],
        habitats: ['Hutan Rawa', 'Hutan Dataran Rendah']
    },
    'id-bb': {
        name: 'Kepulauan Bangka Belitung',
        region: 'Sumatera',
        icon: '🌿',
        speciesCount: 180,
        endangeredCount: 18,
        endemicCount: 12,
        value: 180,
        species: [
            { name: 'Pelawan', latin: 'Tristaniopsis merguensis', status: 'Rentan', icon: '🌳' },
            { name: 'Nyatoh', latin: 'Palaquium spp.', status: 'Rentan', icon: '🌲' }
        ],
        habitats: ['Hutan Pantai', 'Hutan Kerangas']
    },
    'id-la': {
        name: 'Lampung',
        region: 'Sumatera',
        icon: '🌳',
        speciesCount: 340,
        endangeredCount: 48,
        endemicCount: 30,
        value: 340,
        species: [
            { name: 'Bunga Bangkai', latin: 'Amorphophallus titanum', status: 'Rentan', icon: '🌸' },
            { name: 'Damar Mata Kucing', latin: 'Shorea javanica', status: 'Rentan', icon: '🌲' },
            { name: 'Kemiri', latin: 'Aleurites moluccana', status: 'Aman', icon: '🌳' }
        ],
        habitats: ['Taman Nasional Way Kambas', 'Hutan Pegunungan']
    },
    'id-kr': {
        name: 'Kepulauan Riau',
        region: 'Sumatera',
        icon: '🌴',
        speciesCount: 150,
        endangeredCount: 15,
        endemicCount: 8,
        value: 150,
        species: [
            { name: 'Bakau', latin: 'Rhizophora spp.', status: 'Aman', icon: '🌳' },
            { name: 'Nipah', latin: 'Nypa fruticans', status: 'Aman', icon: '🌴' }
        ],
        habitats: ['Hutan Mangrove', 'Hutan Pantai']
    },
    'id-jk': {
        name: 'DKI Jakarta',
        region: 'Jawa',
        icon: '🌳',
        speciesCount: 120,
        endangeredCount: 8,
        endemicCount: 5,
        value: 120,
        species: [
            { name: 'Kepuh', latin: 'Sterculia foetida', status: 'Aman', icon: '🌳' },
            { name: 'Bakau', latin: 'Rhizophora spp.', status: 'Rentan', icon: '🌲' }
        ],
        habitats: ['Taman Kota', 'Hutan Mangrove Muara Angke']
    },
    'id-jb': {
        name: 'Jawa Barat',
        region: 'Jawa',
        icon: '🌸',
        speciesCount: 520,
        endangeredCount: 72,
        endemicCount: 55,
        value: 520,
        species: [
            { name: 'Rafflesia patma', latin: 'Rafflesia patma', status: 'Kritis', icon: '🌺' },
            { name: 'Edelweiss Jawa', latin: 'Anaphalis javanica', status: 'Rentan', icon: '🌸' },
            { name: 'Kantil', latin: 'Magnolia champaca', status: 'Rentan', icon: '🌸' }
        ],
        habitats: ['Taman Nasional Gunung Gede Pangrango', 'Hutan Pegunungan', 'Cagar Alam']
    },
    'id-bt': {
        name: 'Banten',
        region: 'Jawa',
        icon: '🌳',
        speciesCount: 280,
        endangeredCount: 32,
        endemicCount: 18,
        value: 280,
        species: [
            { name: 'Langkap', latin: 'Arenga obtusifolia', status: 'Rentan', icon: '🌴' },
            { name: 'Bayur', latin: 'Pterospermum javanicum', status: 'Aman', icon: '🌳' }
        ],
        habitats: ['Taman Nasional Ujung Kulon', 'Hutan Pantai']
    },
    'id-jt': {
        name: 'Jawa Tengah',
        region: 'Jawa',
        icon: '🌲',
        speciesCount: 450,
        endangeredCount: 58,
        endemicCount: 42,
        value: 450,
        species: [
            { name: 'Cemara Gunung', latin: 'Casuarina junghuhniana', status: 'Aman', icon: '🌲' },
            { name: 'Sendang Arum', latin: 'Magnolia spp.', status: 'Rentan', icon: '🌸' },
            { name: 'Sawo Kecik', latin: 'Manilkara kauki', status: 'Rentan', icon: '🌳' }
        ],
        habitats: ['Gunung Lawu', 'Gunung Merbabu', 'Hutan Jati']
    },
    'id-yo': {
        name: 'DI Yogyakarta',
        region: 'Jawa',
        icon: '🌿',
        speciesCount: 220,
        endangeredCount: 25,
        endemicCount: 15,
        value: 220,
        species: [
            { name: 'Edelweiss Jawa', latin: 'Anaphalis javanica', status: 'Rentan', icon: '🌸' },
            { name: 'Cemara Gunung', latin: 'Casuarina junghuhniana', status: 'Aman', icon: '🌲' }
        ],
        habitats: ['Gunung Merapi', 'Hutan Pantai Parangtritis']
    },
    'id-ji': {
        name: 'Jawa Timur',
        region: 'Jawa',
        icon: '🌺',
        speciesCount: 480,
        endangeredCount: 65,
        endemicCount: 48,
        value: 480,
        species: [
            { name: 'Edelweiss Jawa', latin: 'Anaphalis javanica', status: 'Rentan', icon: '🌸' },
            { name: 'Bunga Wijaya Kusuma', latin: 'Epiphyllum anguliger', status: 'Aman', icon: '🌺' },
            { name: 'Pohon Sono', latin: 'Dalbergia latifolia', status: 'Rentan', icon: '🌳' }
        ],
        habitats: ['Taman Nasional Bromo Tengger Semeru', 'Taman Nasional Baluran', 'Alas Purwo']
    },
    'id-ba': {
        name: 'Bali',
        region: 'Bali & Nusa Tenggara',
        icon: '🌺',
        speciesCount: 280,
        endangeredCount: 35,
        endemicCount: 22,
        value: 280,
        species: [
            { name: 'Bunga Jepun', latin: 'Plumeria spp.', status: 'Aman', icon: '🌸' },
            { name: 'Majegau', latin: 'Dysoxylum densiflorum', status: 'Rentan', icon: '🌳' },
            { name: 'Cempaka Kuning', latin: 'Magnolia champaca', status: 'Rentan', icon: '🌸' }
        ],
        habitats: ['Taman Nasional Bali Barat', 'Hutan Pegunungan']
    },
    'id-nb': {
        name: 'Nusa Tenggara Barat',
        region: 'Bali & Nusa Tenggara',
        icon: '🌴',
        speciesCount: 250,
        endangeredCount: 28,
        endemicCount: 18,
        value: 250,
        species: [
            { name: 'Kesambi', latin: 'Schleichera oleosa', status: 'Aman', icon: '🌳' },
            { name: 'Lontar', latin: 'Borassus flabellifer', status: 'Aman', icon: '🌴' }
        ],
        habitats: ['Taman Nasional Gunung Rinjani', 'Savana']
    },
    'id-nt': {
        name: 'Nusa Tenggara Timur',
        region: 'Bali & Nusa Tenggara',
        icon: '🌳',
        speciesCount: 320,
        endangeredCount: 42,
        endemicCount: 28,
        value: 320,
        species: [
            { name: 'Cendana', latin: 'Santalum album', status: 'Rentan', icon: '🌲' },
            { name: 'Kesambi', latin: 'Schleichera oleosa', status: 'Aman', icon: '🌳' },
            { name: 'Asam', latin: 'Tamarindus indica', status: 'Aman', icon: '🌳' }
        ],
        habitats: ['Taman Nasional Komodo', 'Savana', 'Hutan Musim']
    },
    'id-kb': {
        name: 'Kalimantan Barat',
        region: 'Kalimantan',
        icon: '🪴',
        speciesCount: 580,
        endangeredCount: 82,
        endemicCount: 65,
        value: 580,
        species: [
            { name: 'Kantong Semar', latin: 'Nepenthes rajah', status: 'Kritis', icon: '🪴' },
            { name: 'Tengkawang', latin: 'Shorea stenoptera', status: 'Rentan', icon: '🌳' },
            { name: 'Jelutung', latin: 'Dyera costulata', status: 'Rentan', icon: '🌲' }
        ],
        habitats: ['Taman Nasional Betung Kerihun', 'Hutan Kerangas', 'Rawa Gambut']
    },
    'id-kt': {
        name: 'Kalimantan Tengah',
        region: 'Kalimantan',
        icon: '🌳',
        speciesCount: 520,
        endangeredCount: 75,
        endemicCount: 58,
        value: 520,
        species: [
            { name: 'Ulin', latin: 'Eusideroxylon zwageri', status: 'Rentan', icon: '🌲' },
            { name: 'Jelutung', latin: 'Dyera costulata', status: 'Rentan', icon: '🌳' },
            { name: 'Ramin', latin: 'Gonystylus bancanus', status: 'Kritis', icon: '🌳' }
        ],
        habitats: ['Taman Nasional Tanjung Puting', 'Hutan Rawa Gambut']
    },
    'id-ks': {
        name: 'Kalimantan Selatan',
        region: 'Kalimantan',
        icon: '🌲',
        speciesCount: 450,
        endangeredCount: 62,
        endemicCount: 45,
        value: 450,
        species: [
            { name: 'Kasturi', latin: 'Mangifera casturi', status: 'Kritis', icon: '🌳' },
            { name: 'Ulin', latin: 'Eusideroxylon zwageri', status: 'Rentan', icon: '🌲' },
            { name: 'Galam', latin: 'Melaleuca cajuputi', status: 'Aman', icon: '🌳' }
        ],
        habitats: ['Pegunungan Meratus', 'Hutan Rawa']
    },
    'id-ki': {
        name: 'Kalimantan Timur',
        region: 'Kalimantan',
        icon: '🌸',
        speciesCount: 620,
        endangeredCount: 88,
        endemicCount: 72,
        value: 620,
        species: [
            { name: 'Anggrek Hitam', latin: 'Coelogyne pandurata', status: 'Kritis', icon: '🌸' },
            { name: 'Meranti', latin: 'Shorea spp.', status: 'Kritis', icon: '🌲' },
            { name: 'Ulin', latin: 'Eusideroxylon zwageri', status: 'Rentan', icon: '🌳' }
        ],
        habitats: ['Taman Nasional Kutai', 'Hutan Dipterocarp', 'Karst Sangkulirang']
    },
    'id-ku': {
        name: 'Kalimantan Utara',
        region: 'Kalimantan',
        icon: '🌿',
        speciesCount: 480,
        endangeredCount: 65,
        endemicCount: 52,
        value: 480,
        species: [
            { name: 'Agatis Borneo', latin: 'Agathis borneensis', status: 'Rentan', icon: '🌲' },
            { name: 'Kantong Semar', latin: 'Nepenthes lowii', status: 'Rentan', icon: '🪴' }
        ],
        habitats: ['Taman Nasional Kayan Mentarang', 'Hutan Pegunungan']
    },
    'id-sa': {
        name: 'Sulawesi Utara',
        region: 'Sulawesi',
        icon: '🌸',
        speciesCount: 380,
        endangeredCount: 52,
        endemicCount: 85,
        value: 380,
        species: [
            { name: 'Anggrek Bulan', latin: 'Phalaenopsis amabilis', status: 'Rentan', icon: '🌸' },
            { name: 'Matoa', latin: 'Pometia pinnata', status: 'Aman', icon: '🌳' },
            { name: 'Eboni', latin: 'Diospyros celebica', status: 'Rentan', icon: '🌲' }
        ],
        habitats: ['Taman Nasional Bogani Nani Wartabone', 'Taman Nasional Bunaken']
    },
    'id-st': {
        name: 'Sulawesi Tengah',
        region: 'Sulawesi',
        icon: '🌳',
        speciesCount: 420,
        endangeredCount: 58,
        endemicCount: 92,
        value: 420,
        species: [
            { name: 'Eboni Sulawesi', latin: 'Diospyros celebica', status: 'Kritis', icon: '🌲' },
            { name: 'Agatis Sulawesi', latin: 'Agathis celebica', status: 'Rentan', icon: '🌲' }
        ],
        habitats: ['Taman Nasional Lore Lindu', 'Cagar Alam Morowali']
    },
    'id-sg': {
        name: 'Sulawesi Tenggara',
        region: 'Sulawesi',
        icon: '🌿',
        speciesCount: 350,
        endangeredCount: 45,
        endemicCount: 78,
        value: 350,
        species: [
            { name: 'Sagu', latin: 'Metroxylon sagu', status: 'Aman', icon: '🌴' },
            { name: 'Rotan', latin: 'Calamus spp.', status: 'Rentan', icon: '🌿' }
        ],
        habitats: ['Taman Nasional Rawa Aopa Watumohai', 'Hutan Bakau']
    },
    'id-sn': {
        name: 'Sulawesi Selatan',
        region: 'Sulawesi',
        icon: '🌲',
        speciesCount: 390,
        endangeredCount: 55,
        endemicCount: 82,
        value: 390,
        species: [
            { name: 'Eboni Makassar', latin: 'Diospyros celebica', status: 'Kritis', icon: '🌲' },
            { name: 'Kemiri', latin: 'Aleurites moluccana', status: 'Aman', icon: '🌳' }
        ],
        habitats: ['Taman Nasional Bantimurung', 'Karst Maros']
    },
    'id-sw': {
        name: 'Sulawesi Barat',
        region: 'Sulawesi',
        icon: '🌴',
        speciesCount: 280,
        endangeredCount: 38,
        endemicCount: 62,
        value: 280,
        species: [
            { name: 'Aren', latin: 'Arenga pinnata', status: 'Aman', icon: '🌴' },
            { name: 'Kayu Hitam', latin: 'Diospyros spp.', status: 'Rentan', icon: '🌲' }
        ],
        habitats: ['Hutan Pegunungan', 'Hutan Dipterocarp']
    },
    'id-go': {
        name: 'Gorontalo',
        region: 'Sulawesi',
        icon: '🌿',
        speciesCount: 250,
        endangeredCount: 32,
        endemicCount: 55,
        value: 250,
        species: [
            { name: 'Nantu', latin: 'Cordia subcordata', status: 'Rentan', icon: '🌳' }
        ],
        habitats: ['Cagar Alam Panua', 'Hutan Pantai']
    },
    'id-ma': {
        name: 'Maluku',
        region: 'Maluku',
        icon: '🌺',
        speciesCount: 450,
        endangeredCount: 62,
        endemicCount: 95,
        value: 450,
        species: [
            { name: 'Cengkeh', latin: 'Syzygium aromaticum', status: 'Aman', icon: '🌿' },
            { name: 'Pala', latin: 'Myristica fragrans', status: 'Aman', icon: '🌳' },
            { name: 'Kayu Putih', latin: 'Melaleuca cajuputi', status: 'Aman', icon: '🌲' }
        ],
        habitats: ['Taman Nasional Manusela', 'Hutan Hujan Tropis']
    },
    'id-mu': {
        name: 'Maluku Utara',
        region: 'Maluku',
        icon: '🌴',
        speciesCount: 380,
        endangeredCount: 52,
        endemicCount: 82,
        value: 380,
        species: [
            { name: 'Cengkeh Afo', latin: 'Syzygium aromaticum', status: 'Langka', icon: '🌿' },
            { name: 'Damar', latin: 'Agathis dammara', status: 'Rentan', icon: '🌲' }
        ],
        habitats: ['Taman Nasional Aketajawe-Lolobata', 'Pulau Rempah']
    },
    'id-pa': {
        name: 'Papua',
        region: 'Papua',
        icon: '🌺',
        speciesCount: 850,
        endangeredCount: 120,
        endemicCount: 250,
        value: 850,
        species: [
            { name: 'Anggrek Papua', latin: 'Dendrobium spp.', status: 'Rentan', icon: '🌸' },
            { name: 'Matoa', latin: 'Pometia pinnata', status: 'Aman', icon: '🌳' },
            { name: 'Merbau', latin: 'Intsia bijuga', status: 'Rentan', icon: '🌲' },
            { name: 'Rhododendron', latin: 'Rhododendron konori', status: 'Rentan', icon: '🌺' }
        ],
        habitats: ['Taman Nasional Lorentz', 'Pegunungan Jayawijaya', 'Hutan Hujan Tropis']
    },
    'id-pb': {
        name: 'Papua Barat',
        region: 'Papua',
        icon: '🌳',
        speciesCount: 720,
        endangeredCount: 98,
        endemicCount: 185,
        value: 720,
        species: [
            { name: 'Damar Raja', latin: 'Agathis labillardieri', status: 'Rentan', icon: '🌲' },
            { name: 'Buah Merah', latin: 'Pandanus conoideus', status: 'Aman', icon: '🌴' },
            { name: 'Anggrek Kepala Burung', latin: 'Coelogyne spp.', status: 'Rentan', icon: '🌸' }
        ],
        habitats: ['Taman Nasional Teluk Cenderawasih', 'Raja Ampat', 'Pegunungan Arfak']
    }
};

// Default data for provinces without specific data
const defaultProvinceData = {
    icon: '🌿',
    speciesCount: 200,
    endangeredCount: 25,
    endemicCount: 15,
    value: 200,
    species: [
        { name: 'Flora Lokal', latin: 'Species indigenus', status: 'Aman', icon: '🌿' }
    ],
    habitats: ['Hutan Tropis']
};

// Initialize map when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initializeMap();
});

function initializeMap() {
    // Prepare data for Highcharts
    const mapData = [];
    
    // Get all province codes from the map topology
    const topology = Highcharts.maps['countries/id/id-all'];
    
    topology.features.forEach(function(feature) {
        const code = feature.properties['hc-key'];
        const data = floraData[code] || {
            ...defaultProvinceData,
            name: feature.properties.name,
            region: 'Indonesia'
        };
        
        mapData.push({
            'hc-key': code,
            value: data.value || data.speciesCount,
            name: feature.properties.name
        });
    });

    // Create the map
    Highcharts.mapChart('indonesia-map', {
        chart: {
            backgroundColor: 'transparent',
            style: {
                fontFamily: 'Inter, system-ui, sans-serif'
            }
        },
        
        title: {
            text: null
        },
        
        credits: {
            enabled: false
        },
        
        exporting: {
            enabled: false
        },
        
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom',
                theme: {
                    fill: 'white',
                    'stroke-width': 1,
                    stroke: '#e5e7eb',
                    r: 8,
                    states: {
                        hover: {
                            fill: '#f0fdf4'
                        },
                        select: {
                            fill: '#10b981',
                            style: {
                                color: 'white'
                            }
                        }
                    }
                }
            }
        },
        
        legend: {
            enabled: false
        },
        
        colorAxis: {
            min: 100,
            max: 900,
            stops: [
                [0, '#a7f3d0'],
                [0.3, '#34d399'],
                [0.6, '#059669'],
                [1, '#064e3b']
            ]
        },
        
        tooltip: {
            backgroundColor: 'white',
            borderColor: '#e5e7eb',
            borderRadius: 12,
            shadow: true,
            useHTML: true,
            formatter: function() {
                const data = floraData[this.point['hc-key']] || defaultProvinceData;
                return `
                    <div style="padding: 8px;">
                        <div style="font-weight: 600; font-size: 14px; color: #111827; margin-bottom: 4px;">
                            ${data.icon || '🌿'} ${this.point.name}
                        </div>
                        <div style="color: #6b7280; font-size: 12px;">
                            ${data.speciesCount || 200} spesies flora
                        </div>
                        <div style="color: #10b981; font-size: 11px; margin-top: 4px;">
                            Klik untuk detail →
                        </div>
                    </div>
                `;
            }
        },
        
        series: [{
            data: mapData,
            mapData: Highcharts.maps['countries/id/id-all'],
            joinBy: 'hc-key',
            name: 'Keanekaragaman Flora',
            borderColor: 'white',
            borderWidth: 1,
            states: {
                hover: {
                    color: '#10b981',
                    borderColor: '#059669',
                    borderWidth: 2
                }
            },
            dataLabels: {
                enabled: false
            },
            cursor: 'pointer',
            point: {
                events: {
                    click: function() {
                        showProvinceDetail(this['hc-key'], this.name);
                    }
                }
            }
        }]
    });
}

function showProvinceDetail(code, name) {
    const data = floraData[code] || {
        ...defaultProvinceData,
        name: name,
        region: 'Indonesia'
    };
    
    // Hide placeholder, show content
    document.getElementById('detailPlaceholder').style.display = 'none';
    document.getElementById('detailContent').style.display = 'block';
    
    // Update header
    document.getElementById('provinceIcon').textContent = data.icon || '🌿';
    document.getElementById('provinceName').textContent = data.name || name;
    document.getElementById('provinceRegion').textContent = data.region || 'Indonesia';
    
    // Update stats
    document.getElementById('speciesCount').textContent = data.speciesCount || 200;
    document.getElementById('endangeredCount').textContent = data.endangeredCount || 25;
    document.getElementById('endemicCount').textContent = data.endemicCount || 15;
    
    // Update species list
    const speciesList = document.getElementById('speciesList');
    speciesList.innerHTML = '';
    
    (data.species || []).forEach(function(s) {
        const statusClass = getStatusClass(s.status);
        speciesList.innerHTML += `
            <div class="peta-species-card">
                <div class="peta-species-icon">${s.icon || '🌿'}</div>
                <div class="peta-species-info">
                    <div class="peta-species-name">${s.name}</div>
                    <div class="peta-species-latin">${s.latin}</div>
                </div>
                <div class="peta-species-status ${statusClass}">${s.status}</div>
            </div>
        `;
    });
    
    // Update habitat tags
    const habitatTags = document.getElementById('habitatTags');
    habitatTags.innerHTML = '';
    
    (data.habitats || []).forEach(function(h) {
        habitatTags.innerHTML += `<span class="peta-habitat-tag">${h}</span>`;
    });
    
    // Scroll to detail panel on mobile
    if (window.innerWidth < 1024) {
        document.getElementById('provinceDetailPanel').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
}

function getStatusClass(status) {
    switch(status) {
        case 'Kritis': return 'status-critical';
        case 'Rentan': return 'status-vulnerable';
        case 'Langka': return 'status-rare';
        default: return 'status-safe';
    }
}
</script>

@endsection
