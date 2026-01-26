/**
 * Dashboard Fauna Map - Interactive Indonesia Map for Dashboard
 * Fetches fauna data from external JSON API
 * Updated: Now uses 38 provinces GeoJSON (includes new Papua provinces)
 */

// Fauna data storage
let dashboardFaunaData = {};
let dashboardFaunaGeoJson = null;

// API URLs
const DASHBOARD_FAUNA_API_URL = 'https://smartonesda.github.io/bioexplore-nusantara/assets/data/provinsi.json';
const DASHBOARD_FAUNA_GEOJSON_URL = '/assets/data/indonesia-38-provinsi.json';

// Province name mapping from GeoJSON to API data
const dashboardFaunaProvinceMapping = {
    'Daerah Istimewa Yogyakarta': 'DI Yogyakarta'
};

/**
 * Get normalized province name for data lookup
 */
function getDashboardFaunaProvinceName(geoJsonName) {
    return dashboardFaunaProvinceMapping[geoJsonName] || geoJsonName;
}

// Fauna icon mapping based on animal type
const dashboardFaunaIcons = {
    'harimau': '🐅', 'macan': '🐆', 'gajah': '🐘', 'badak': '🦏',
    'orangutan': '🦧', 'beruang': '🐻', 'komodo': '🦎', 'penyu': '🐢',
    'cenderawasih': '🐦', 'kakatua': '🦜', 'nuri': '🦜', 'elang': '🦅',
    'jalak': '🐦', 'merak': '🦚', 'kanguru': '🦘', 'rusa': '🦌',
    'banteng': '🐃', 'anoa': '🐃', 'bekantan': '🐒', 'tarsius': '🐒',
    'pesut': '🐬', 'lumba': '🐬', 'ikan': '🐟', 'kasuari': '🐦',
    'default': '🦋'
};

/**
 * Get appropriate icon for fauna based on name
 */
function getDashboardFaunaIcon(name) {
    const lowerName = name.toLowerCase();
    for (const [key, icon] of Object.entries(dashboardFaunaIcons)) {
        if (lowerName.includes(key)) return icon;
    }
    return dashboardFaunaIcons.default;
}

/**
 * Parse conservation status from status string
 */
function parseFaunaStatus(statusString) {
    if (!statusString) return 'Umum';
    if (statusString.includes('Kritis') || statusString.includes('Critically')) return 'Kritis';
    if (statusString.includes('Terancam') || statusString.includes('Endangered')) return 'Terancam';
    if (statusString.includes('Rentan') || statusString.includes('Vulnerable')) return 'Rentan';
    if (statusString.includes('Langka')) return 'Langka';
    return 'Umum';
}

/**
 * Fetch fauna data from external API and GeoJSON
 */
async function fetchDashboardFaunaData() {
    try {
        // Fetch both GeoJSON and fauna data in parallel
        const [geoResponse, faunaResponse] = await Promise.all([
            fetch(DASHBOARD_FAUNA_GEOJSON_URL),
            fetch(DASHBOARD_FAUNA_API_URL)
        ]);

        dashboardFaunaGeoJson = await geoResponse.json();
        const data = await faunaResponse.json();

        // Transform data - store with province name as key
        for (const [provinceName, provinceData] of Object.entries(data)) {
            if (provinceData.fauna) {
                const fauna = provinceData.fauna;
                const otherSpecies = fauna.lainnya || [];

                // Build species array from main fauna and lainnya
                const species = [{
                    name: fauna.nama,
                    latin: fauna.latin,
                    namaLain: fauna.namaLain,
                    status: parseFaunaStatus(fauna.status),
                    habitat: fauna.habitat,
                    ukuran: fauna.ukuran,
                    warna: fauna.warna,
                    adaptasi: fauna.adaptasi,
                    identitas: fauna.identitas,
                    icon: getDashboardFaunaIcon(fauna.nama),
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
                        icon: getDashboardFaunaIcon(s.nama)
                    });
                });

                // Store with province name as key
                dashboardFaunaData[provinceName] = {
                    name: provinceName,
                    mainFauna: fauna,
                    species: species,
                    value: 50 + (species.length * 30) + Math.floor(Math.random() * 150)
                };
            }
        }

        initializeDashboardFaunaMap();
    } catch (error) {
        console.error('Error fetching fauna data:', error);
        initializeDashboardFaunaMap();
    }
}

/**
 * Initialize Highcharts map for fauna on dashboard
 */
function initializeDashboardFaunaMap() {
    // Check if GeoJSON is loaded
    if (!dashboardFaunaGeoJson) {
        console.error('GeoJSON not loaded for dashboard fauna map');
        return;
    }

    const mapData = [];

    // Build map data from GeoJSON features
    dashboardFaunaGeoJson.features.forEach(function (f) {
        const geoJsonName = f.properties.PROVINSI;
        const normalizedName = getDashboardFaunaProvinceName(geoJsonName);
        const data = dashboardFaunaData[normalizedName];

        mapData.push({
            'PROVINSI': geoJsonName,
            value: data?.value || 80,
            name: geoJsonName
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
                const normalizedName = getDashboardFaunaProvinceName(this.point.name);
                const d = dashboardFaunaData[normalizedName];
                const speciesCount = d?.species?.length || 0;
                return '<div style="padding:8px;"><b>🦋 ' + this.point.name + '</b><br>' + speciesCount + ' spesies fauna tercatat</div>';
            }
        },
        series: [{
            data: mapData,
            mapData: dashboardFaunaGeoJson,
            joinBy: 'PROVINSI',
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
                        showDashboardFaunaDetail(this.name);
                    }
                }
            }
        }]
    });
}

/**
 * Show fauna detail panel for selected province
 */
function showDashboardFaunaDetail(provinceName) {
    const normalizedName = getDashboardFaunaProvinceName(provinceName);
    const d = dashboardFaunaData[normalizedName];

    if (!d) {
        document.getElementById('faunaHabitatList').innerHTML = `
            <div class="bioguard-habitat-placeholder">
                <div class="bioguard-habitat-placeholder-icon">🦋</div>
                <p>Data fauna untuk ${provinceName} belum tersedia</p>
            </div>
        `;
        document.getElementById('dashboardFaunaLainnyaContainer').innerHTML = '';
        return;
    }

    const mainFauna = d.mainFauna;
    const mainStatus = parseFaunaStatus(mainFauna?.status);
    const statusClass = mainStatus === 'Kritis' ? 'status-critical' :
        (mainStatus === 'Terancam' ? 'status-critical' :
            (mainStatus === 'Rentan' ? 'status-vulnerable' :
                (mainStatus === 'Langka' ? 'status-vulnerable' : 'status-safe')));

    // Check for latin placeholder
    const mainLatinDisplay = (mainFauna?.latin && !mainFauna.latin.toLowerCase().includes('sp.')) ? mainFauna.latin : '-';

    // Build description for main fauna
    const mainDescription = `${mainFauna?.nama || 'Fauna ini'} merupakan ${mainFauna?.identitas || 'fauna identitas'} provinsi ${d.name}. ${mainFauna?.habitat ? 'Hewan ini dapat ditemukan di ' + mainFauna.habitat.toLowerCase() + '.' : ''} ${mainFauna?.warna ? 'Memiliki warna ' + mainFauna.warna.toLowerCase() + '.' : ''}`;

    // Identity Content (Sidebar)
    let identityHtml = `
        <div class="peta-detail-content-wrapper fauna">
            <div class="peta-detail-header fauna">
                <div class="peta-detail-icon">${getDashboardFaunaIcon(mainFauna?.nama || '')}</div>
                <div>
                    <h3 class="peta-detail-title">${d.name}</h3>
                    <p class="peta-detail-subtitle">${d.species.length} spesies fauna tercatat</p>
                </div>
            </div>

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

            <div class="peta-species-section">
                <h4 class="peta-species-title fauna">🏆 Fauna Identitas</h4>
                <div class="peta-fauna-identity-card">
                    <div class="peta-fauna-identity-header">
                        <div class="peta-fauna-identity-icon">${getDashboardFaunaIcon(mainFauna?.nama || '')}</div>
                        <div class="peta-fauna-identity-info">
                            <h5 class="peta-fauna-identity-name">${mainFauna?.nama || '-'}</h5>
                            ${mainFauna?.namaLain ? `<p class="peta-fauna-identity-alias">${mainFauna.namaLain}</p>` : ''}
                            <p class="peta-fauna-identity-latin"><em>${mainLatinDisplay}</em></p>
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

    // Render Identity to Sidebar
    document.getElementById('faunaHabitatList').innerHTML = identityHtml;

    // Others Content (Bottom)
    const otherSpecies = d.species.filter(s => !s.isMain);
    let othersHtml = '';

    if (otherSpecies.length > 0) {
        othersHtml = `
            <div class="fauna-lainnya-wrapper">
                <div class="peta-species-section bottom-section">
                    <h4 class="peta-species-title fauna">🐾 Fauna Lainnya di ${d.name}</h4>
                    <div class="peta-fauna-grid">
        `;

        otherSpecies.forEach(function (s, index) {
            const sStatusClass = s.status === 'Kritis' ? 'status-critical' :
                (s.status === 'Langka' ? 'status-vulnerable' :
                    (s.status === 'Rentan' ? 'status-vulnerable' : 'status-safe'));

            // Check for latin placeholder in others
            const sLatinDisplay = (s.latin && !s.latin.toLowerCase().includes('sp.')) ? s.latin : '-';

            othersHtml += `
                <div class="peta-fauna-card">
                    <div class="peta-fauna-number">${index + 1}</div>
                    <div class="peta-fauna-info">
                        <h5 class="peta-fauna-name">${s.name}</h5>
                        <p class="peta-fauna-latin"><em>${sLatinDisplay}</em></p>
                        <span class="peta-fauna-status ${sStatusClass}">${s.status || 'Umum'}</span>
                        ${s.deskripsi ? `<p class="peta-fauna-desc">${s.deskripsi}</p>` : ''}
                        ${s.ancaman && s.ancaman !== 'Tidak ada ancaman signifikan saat ini' ? `<p class="peta-fauna-threat">⚠️ ${s.ancaman}</p>` : ''}
                    </div>
                </div>
            `;
        });

        othersHtml += `
                    </div>
                </div>
            </div>
        `;
    }

    // Render Others to Bottom Container
    document.getElementById('dashboardFaunaLainnyaContainer').innerHTML = othersHtml;

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
    fetchDashboardFaunaData();
});
