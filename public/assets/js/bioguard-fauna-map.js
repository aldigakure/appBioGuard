/**
 * BioGuard Fauna Map - Interactive Indonesia Map
 * Fetches fauna data from external JSON API
 */

// Province name to Highcharts key mapping (corrected based on actual Highcharts map)
const provinceToKey = {
    'Aceh': 'id-ac',
    'Sumatera Utara': 'id-su',
    'Sumatera Barat': 'id-sb',
    'Riau': 'id-ri',
    'Kepulauan Riau': 'id-kr',
    'Jambi': 'id-ja',
    'Sumatera Selatan': 'id-sl',
    'Kepulauan Bangka Belitung': 'id-bb',
    'Bengkulu': 'id-be',
    'Lampung': 'id-1024',
    'DKI Jakarta': 'id-jk',
    'Jawa Barat': 'id-jr',
    'Banten': 'id-bt',
    'Jawa Tengah': 'id-jt',
    'DI Yogyakarta': 'id-yo',
    'Jawa Timur': 'id-ji',
    'Bali': 'id-ba',
    'Nusa Tenggara Barat': 'id-nb',
    'Nusa Tenggara Timur': 'id-nt',
    'Kalimantan Barat': 'id-kb',
    'Kalimantan Tengah': 'id-kt',
    'Kalimantan Selatan': 'id-ks',
    'Kalimantan Timur': 'id-ki',
    'Kalimantan Utara': 'id-ku',
    'Sulawesi Utara': 'id-sw',
    'Gorontalo': 'id-go',
    'Sulawesi Tengah': 'id-st',
    'Sulawesi Barat': 'id-sr',
    'Sulawesi Selatan': 'id-se',
    'Sulawesi Tenggara': 'id-sg',
    'Maluku': 'id-ma',
    'Maluku Utara': 'id-la',
    'Papua': 'id-pa',
    'Papua Barat': 'id-ib',
    'Papua Barat Daya': 'id-ib',
    'Papua Selatan': 'id-pa',
    'Papua Tengah': 'id-pa',
    'Papua Pegunungan': 'id-pa'
};

// Fauna icon mapping based on animal type
const faunaIcons = {
    'harimau': '🐅', 'macan': '🐆', 'gajah': '🐘', 'badak': '🦏',
    'orangutan': '🦧', 'beruang': '🐻', 'komodo': '🦎', 'penyu': '🐢',
    'cenderawasih': '🐦', 'kakatua': '🦜', 'nuri': '🦜', 'elang': '🦅',
    'jalak': '🐦', 'merak': '🦚', 'kanguru': '🦘', 'rusa': '🦌',
    'banteng': '🐃', 'anoa': '🐃', 'bekantan': '🐒', 'tarsius': '🐒',
    'pesut': '🐬', 'lumba': '🐬', 'ikan': '🐟', 'kasuari': '🐦',
    'default': '🦋'
};

// Fauna data storage
let faunaData = {};
let rawProvinsiData = {};

// API URL for province data
const API_URL = 'https://smartonesda.github.io/bioexplore-nusantara/assets/data/provinsi.json';

/**
 * Get appropriate icon for fauna based on name
 */
function getFaunaIcon(name) {
    const lowerName = name.toLowerCase();
    for (const [key, icon] of Object.entries(faunaIcons)) {
        if (lowerName.includes(key)) return icon;
    }
    return faunaIcons.default;
}

/**
 * Parse conservation status from status string
 */
function parseStatus(statusString) {
    if (!statusString) return 'Umum';
    if (statusString.includes('Kritis') || statusString.includes('Critically')) return 'Kritis';
    if (statusString.includes('Terancam') || statusString.includes('Endangered')) return 'Terancam';
    if (statusString.includes('Rentan') || statusString.includes('Vulnerable')) return 'Rentan';
    if (statusString.includes('Langka')) return 'Langka';
    return 'Umum';
}

/**
 * Fetch fauna data from external API
 */
async function fetchFaunaData() {
    try {
        const response = await fetch(API_URL);
        const data = await response.json();
        rawProvinsiData = data;

        // Transform data to match Highcharts key format
        for (const [provinceName, provinceData] of Object.entries(data)) {
            const key = provinceToKey[provinceName];
            if (key && provinceData.fauna) {
                const fauna = provinceData.fauna;
                const otherSpecies = fauna.lainnya || [];

                // Build species array from main fauna and lainnya
                const species = [{
                    name: fauna.nama,
                    latin: fauna.latin,
                    namaLain: fauna.namaLain,
                    status: parseStatus(fauna.status),
                    habitat: fauna.habitat,
                    ukuran: fauna.ukuran,
                    warna: fauna.warna,
                    adaptasi: fauna.adaptasi,
                    identitas: fauna.identitas,
                    icon: getFaunaIcon(fauna.nama),
                    isMain: true
                }];

                // Add other species
                otherSpecies.forEach(s => {
                    species.push({
                        name: s.nama,
                        latin: s.latin,
                        status: s.status,
                        statusDetail: s.statusDetail,
                        habitat: s.habitat,
                        deskripsi: s.deskripsi,
                        ancaman: s.ancaman,
                        icon: getFaunaIcon(s.nama)
                    });
                });

                faunaData[key] = {
                    name: provinceName,
                    mainFauna: fauna,
                    species: species,
                    value: 50 + (species.length * 30) + Math.floor(Math.random() * 150)
                };
            }
        }

        initializeFaunaMap();
    } catch (error) {
        console.error('Error fetching fauna data:', error);
        initializeFaunaMap(); // Initialize with empty data
    }
}

/**
 * Initialize Highcharts map for fauna
 */
function initializeFaunaMap() {
    const mapData = [];
    Highcharts.maps['countries/id/id-all'].features.forEach(function (f) {
        const code = f.properties['hc-key'];
        mapData.push({
            'hc-key': code,
            value: faunaData[code]?.value || 80,
            name: f.properties.name
        });
    });

    Highcharts.mapChart('fauna-map', {
        chart: {
            backgroundColor: 'transparent'
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
                verticalAlign: 'bottom'
            }
        },
        legend: {
            enabled: false
        },
        colorAxis: {
            min: 50,
            max: 300,
            stops: [
                [0, '#fef3c7'],
                [0.3, '#fbbf24'],
                [0.6, '#f59e0b'],
                [1, '#b45309']
            ]
        },
        tooltip: {
            useHTML: true,
            formatter: function () {
                const d = faunaData[this.point['hc-key']];
                const speciesCount = d?.species?.length || 0;
                return '<div style="padding:8px;"><b>🦋 ' + this.point.name + '</b><br>' + speciesCount + ' spesies fauna tercatat</div>';
            }
        },
        series: [{
            data: mapData,
            mapData: Highcharts.maps['countries/id/id-all'],
            joinBy: 'hc-key',
            borderColor: 'white',
            borderWidth: 1,
            states: {
                hover: {
                    color: '#f59e0b',
                    borderWidth: 2
                }
            },
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        showFaunaDetail(this['hc-key'], this.name);
                    }
                }
            }
        }]
    });
}

/**
 * Show fauna detail panel for selected province (EcoDetect-style layout)
 */
function showFaunaDetail(code, name) {
    const d = faunaData[code];

    if (!d) {
        document.getElementById('faunaHabitatList').innerHTML = `
            <div class="bioguard-habitat-placeholder">
                <div class="bioguard-habitat-placeholder-icon">🦋</div>
                <p>Data fauna untuk ${name} belum tersedia</p>
            </div>
        `;
        return;
    }

    const mainFauna = d.mainFauna;
    const mainStatus = parseStatus(mainFauna?.status);
    const statusClass = mainStatus === 'Kritis' ? 'status-critical' :
        (mainStatus === 'Terancam' ? 'status-critical' :
            (mainStatus === 'Rentan' ? 'status-vulnerable' :
                (mainStatus === 'Langka' ? 'status-vulnerable' : 'status-safe')));

    // Build description for main fauna
    const mainDescription = `${mainFauna?.nama || 'Fauna ini'} merupakan ${mainFauna?.identitas || 'fauna identitas'} provinsi ${d.name}. ${mainFauna?.habitat ? 'Hewan ini dapat ditemukan di ' + mainFauna.habitat.toLowerCase() + '.' : ''} ${mainFauna?.warna ? 'Memiliki warna ' + mainFauna.warna.toLowerCase() + '.' : ''}`;

    // 1. Render Main Identity to Sidebar
    document.getElementById('faunaHabitatList').innerHTML = `
        <div class="peta-detail-content-wrapper fauna">
            <!-- Province Header -->
            <div class="peta-detail-header fauna">
                <div class="peta-detail-icon">${getFaunaIcon(mainFauna?.nama || '')}</div>
                <div>
                    <h3 class="peta-detail-title">${d.name}</h3>
                    <p class="peta-detail-subtitle">${d.species.length} spesies fauna tercatat</p>
                </div>
            </div>

            <!-- Stats -->
            <div class="peta-detail-stats fauna">
                <div class="peta-stat-item">
                    <div class="peta-stat-number">${d.species.length}</div>
                    <div class="peta-stat-label">Total Fauna</div>
                </div>
                <div class="peta-stat-item">
                    <div class="peta-stat-number">${d.species.filter(s => s.status === 'Kritis' || s.status === 'Terancam').length}</div>
                    <div class="peta-stat-label">Terancam</div>
                </div>
                <div class="peta-stat-item">
                    <div class="peta-stat-number">${d.species.filter(s => s.status === 'Rentan' || s.status === 'Langka').length}</div>
                    <div class="peta-stat-label">Perlu Perhatian</div>
                </div>
            </div>

            <!-- Main Fauna Identity Card -->
            <div class="peta-species-section">
                <h4 class="peta-species-title fauna">🏆 Fauna Identitas</h4>
                <div class="peta-fauna-identity-card">
                    <div class="peta-fauna-identity-header">
                        <div class="peta-fauna-identity-icon">${getFaunaIcon(mainFauna?.nama || '')}</div>
                        <div class="peta-fauna-identity-info">
                            <h5 class="peta-fauna-identity-name">${mainFauna?.nama || '-'}</h5>
                            ${mainFauna?.namaLain ? `<p class="peta-fauna-identity-alias">${mainFauna.namaLain}</p>` : ''}
                            <p class="peta-fauna-identity-latin"><em>${(mainFauna?.latin && !mainFauna.latin.toLowerCase().includes('sp.')) ? mainFauna.latin : '-'}</em></p>
                            <span class="peta-fauna-identity-status ${statusClass}">${mainStatus}</span>
                        </div>
                    </div>
                    <div class="peta-fauna-identity-desc">
                        <p>${mainDescription}</p>
                    </div>
                    <div class="peta-fauna-identity-details">
                        ${mainFauna?.ukuran ? `<div class="peta-fauna-detail-item"><span class="peta-fauna-detail-icon">📏</span><span class="peta-fauna-detail-label">Ukuran:</span> ${mainFauna.ukuran}</div>` : ''}
                        ${mainFauna?.warna ? `<div class="peta-fauna-detail-item"><span class="peta-fauna-detail-icon">🎨</span><span class="peta-fauna-detail-label">Warna:</span> ${mainFauna.warna}</div>` : ''}
                        ${mainFauna?.habitat ? `<div class="peta-fauna-detail-item"><span class="peta-fauna-detail-icon">🏔️</span><span class="peta-fauna-detail-label">Habitat:</span> ${mainFauna.habitat}</div>` : ''}
                        ${mainFauna?.adaptasi ? `<div class="peta-fauna-detail-item peta-fauna-tips"><span class="peta-fauna-detail-icon">🔄</span><span class="peta-fauna-detail-label">Adaptasi:</span> ${mainFauna.adaptasi}</div>` : ''}
                    </div>
                </div>
            </div>
        </div>
    `;

    // 2. Render Other Species to Bottom Container
    const otherSpecies = d.species.filter(s => !s.isMain);
    const bottomContainer = document.getElementById('faunaLainnyaContainer');

    if (otherSpecies.length > 0) {
        let otherHtml = `
            <div class="peta-species-section bottom-section fauna">
                <h4 class="peta-species-title fauna">🐾 Fauna Lainnya di ${d.name}</h4>
                <div class="peta-fauna-grid">
        `;

        otherSpecies.forEach(function (s, index) {
            const sStatusClass = s.status === 'Kritis' ? 'status-critical' :
                (s.status === 'Langka' ? 'status-vulnerable' :
                    (s.status === 'Rentan' ? 'status-vulnerable' : 'status-safe'));

            otherHtml += `
                <div class="peta-fauna-card">
                    <div class="peta-fauna-number">${index + 1}</div>
                    <div class="peta-fauna-info">
                        <h5 class="peta-fauna-name">${s.name}</h5>
                        <p class="peta-fauna-latin"><em>${(s.latin && !s.latin.toLowerCase().includes('sp.')) ? s.latin : '-'}</em></p>
                        <span class="peta-fauna-status ${sStatusClass}">${s.status || 'Umum'}</span>
                        ${s.deskripsi ? `<p class="peta-fauna-desc">${s.deskripsi}</p>` : ''}
                        ${s.ancaman && s.ancaman !== 'Tidak ada ancaman signifikan saat ini' ? `<p class="peta-fauna-threat">⚠️ ${s.ancaman}</p>` : ''}
                    </div>
                </div>
            `;
        });

        otherHtml += `
                </div>
            </div>
        `;
        bottomContainer.innerHTML = otherHtml;
        bottomContainer.style.display = 'block';
    } else {
        bottomContainer.innerHTML = '';
        bottomContainer.style.display = 'none';
    }

    // Scroll to detail panel on mobile
    if (window.innerWidth < 1024) {
        document.getElementById('faunaHabitatList').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function () {
    fetchFaunaData();
});
