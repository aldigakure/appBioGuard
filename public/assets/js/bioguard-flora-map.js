/**
 * BioGuard Flora Map - Interactive Indonesia Map
 * Fetches flora data from external JSON API
 * Updated: Now uses 38 provinces GeoJSON (includes new Papua provinces)
 */

// Flora data storage
let floraData = {};
let rawProvinsiData = {};
let indonesiaGeoJson = null;

// API URLs
const FLORA_API_URL = 'https://smartonesda.github.io/bioexplore-nusantara/assets/data/provinsi.json';
const GEOJSON_URL = '/assets/data/indonesia-38-provinsi.json';

// Province name mapping from GeoJSON to API data
// Only needed for provinces with different names
const floraProvinceNameMapping = {
    'Daerah Istimewa Yogyakarta': 'DI Yogyakarta'
};

/**
 * Get normalized province name for data lookup
 */
function getFloraProvinceName(geoJsonName) {
    return floraProvinceNameMapping[geoJsonName] || geoJsonName;
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
 * Fetch flora data from external API and GeoJSON
 */
async function fetchFloraData() {
    try {
        // Fetch both GeoJSON and flora data in parallel
        const [geoResponse, floraResponse] = await Promise.all([
            fetch(GEOJSON_URL),
            fetch(FLORA_API_URL)
        ]);

        indonesiaGeoJson = await geoResponse.json();
        const data = await floraResponse.json();
        rawProvinsiData = data;

        // Transform data - store with province name as key
        for (const [provinceName, provinceData] of Object.entries(data)) {
            if (provinceData.flora) {
                const flora = provinceData.flora;
                const otherSpecies = flora.lainnya || [];

                // Build species array from main flora and lainnya
                const species = [{
                    name: flora.nama,
                    latin: flora.latin,
                    namaLain: flora.namaLain,
                    status: parseStatus(flora.status),
                    habitat: flora.habitat,
                    manfaat: flora.manfaat,
                    tips: flora.tips,
                    warna: flora.warna,
                    tinggi: flora.tinggi,
                    budaya: flora.budaya,
                    simbol: flora.simbol,
                    identitas: flora.identitas,
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
                        ancaman: s.ancaman
                    });
                });

                // Store with province name as key
                floraData[provinceName] = {
                    name: provinceName,
                    mainFlora: flora,
                    species: species,
                    value: 100 + (species.length * 50) + Math.floor(Math.random() * 200)
                };
            }
        }

        initializeFloraMap();
    } catch (error) {
        console.error('Error fetching flora data:', error);
        initializeFloraMap();
    }
}

/**
 * Initialize Highcharts map for flora
 */
function initializeFloraMap() {
    // Check if GeoJSON is loaded
    if (!indonesiaGeoJson) {
        console.error('GeoJSON not loaded for flora map');
        return;
    }

    const mapData = [];

    // Build map data from GeoJSON features
    indonesiaGeoJson.features.forEach(function (f) {
        const geoJsonName = f.properties.PROVINSI;
        const normalizedName = getFloraProvinceName(geoJsonName);
        const data = floraData[normalizedName];

        mapData.push({
            'PROVINSI': geoJsonName,
            value: data?.value || 150,
            name: geoJsonName
        });
    });

    Highcharts.mapChart('flora-map', {
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
            useHTML: true,
            formatter: function () {
                const normalizedName = getFloraProvinceName(this.point.name);
                const d = floraData[normalizedName];
                const speciesCount = d?.species?.length || 0;
                return '<div style="padding:8px;"><b>🌿 ' + this.point.name + '</b><br>' + speciesCount + ' spesies flora tercatat</div>';
            }
        },
        series: [{
            data: mapData,
            mapData: indonesiaGeoJson,
            joinBy: 'PROVINSI',
            borderColor: 'white',
            borderWidth: 1,
            states: {
                hover: {
                    color: '#10b981',
                    borderWidth: 2
                }
            },
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        showFloraDetail(this.name);
                    }
                }
            }
        }]
    });
}

/**
 * Show flora detail panel for selected province (EcoDetect-style layout)
 */
function showFloraDetail(provinceName) {
    const normalizedName = getFloraProvinceName(provinceName);
    const d = floraData[normalizedName];

    if (!d) {
        document.getElementById('floraHabitatList').innerHTML = `
            <div class="bioguard-habitat-placeholder">
                <div class="bioguard-habitat-placeholder-icon">🌿</div>
                <p>Data flora untuk ${provinceName} belum tersedia</p>
            </div>
        `;
        return;
    }

    const mainFlora = d.mainFlora;
    const mainStatus = parseStatus(mainFlora?.status);
    const statusClass = mainStatus === 'Kritis' ? 'status-critical' :
        (mainStatus === 'Terancam' ? 'status-critical' :
            (mainStatus === 'Rentan' ? 'status-vulnerable' :
                (mainStatus === 'Langka' ? 'status-vulnerable' : 'status-safe')));

    // Build description from available fields
    const mainDescription = mainFlora?.budaya ?
        `${mainFlora.nama} adalah ${mainFlora.identitas || 'flora khas'} ${d.name}. ${mainFlora.budaya ? 'Dalam budaya lokal, ' + mainFlora.nama.toLowerCase() + ' digunakan sebagai ' + mainFlora.budaya.toLowerCase() + '.' : ''} ${mainFlora.simbol ? 'Melambangkan ' + mainFlora.simbol.toLowerCase() + '.' : ''}` :
        `${mainFlora?.nama || 'Flora ini'} merupakan flora identitas provinsi ${d.name}. Tumbuhan ini memiliki nilai ekologis dan budaya yang penting bagi masyarakat setempat.`;

    // 1. Render Main Identity to Sidebar
    document.getElementById('floraHabitatList').innerHTML = `
        <div class="peta-detail-content-wrapper">
            <!-- Province Header -->
            <div class="peta-detail-header">
                <div class="peta-detail-icon">🌿</div>
                <div>
                    <h3 class="peta-detail-title">${d.name}</h3>
                    <p class="peta-detail-subtitle">${d.species.length} spesies flora tercatat</p>
                </div>
            </div>

            <!-- Stats -->
            <div class="peta-detail-stats">
                <div class="peta-stat-item">
                    <div class="peta-stat-number">${d.species.length}</div>
                    <div class="peta-stat-label">Total Flora</div>
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

            <!-- Main Flora Identity Card -->
            <div class="peta-species-section">
                <h4 class="peta-species-title">🏆 Flora Identitas</h4>
                <div class="peta-flora-identity-card">
                    <div class="peta-flora-identity-header">
                        <div class="peta-flora-identity-icon">🌺</div>
                        <div class="peta-flora-identity-info">
                            <h5 class="peta-flora-identity-name">${mainFlora?.nama || '-'}</h5>
                            ${mainFlora?.namaLain ? `<p class="peta-flora-identity-alias">${mainFlora.namaLain}</p>` : ''}
                            <p class="peta-flora-identity-latin"><em>${(mainFlora?.latin && !mainFlora.latin.toLowerCase().includes('sp.')) ? mainFlora.latin : '-'}</em></p>
                            <span class="peta-flora-identity-status ${statusClass}">${mainStatus}</span>
                        </div>
                    </div>
                    <div class="peta-flora-identity-desc">
                        <p>${mainDescription}</p>
                    </div>
                    <div class="peta-flora-identity-details">
                        ${mainFlora?.warna ? `<div class="peta-flora-detail-item"><span class="peta-flora-detail-icon">🎨</span><span class="peta-flora-detail-label">Warna:</span> ${mainFlora.warna}</div>` : ''}
                        ${mainFlora?.tinggi ? `<div class="peta-flora-detail-item"><span class="peta-flora-detail-icon">📏</span><span class="peta-flora-detail-label">Tinggi:</span> ${mainFlora.tinggi}</div>` : ''}
                        ${mainFlora?.habitat ? `<div class="peta-flora-detail-item"><span class="peta-flora-detail-icon">🏔️</span><span class="peta-flora-detail-label">Habitat:</span> ${mainFlora.habitat}</div>` : ''}
                        ${mainFlora?.manfaat ? `<div class="peta-flora-detail-item"><span class="peta-flora-detail-icon">✨</span><span class="peta-flora-detail-label">Manfaat:</span> ${mainFlora.manfaat}</div>` : ''}
                        ${mainFlora?.tips ? `<div class="peta-flora-detail-item peta-flora-tips"><span class="peta-flora-detail-icon">💡</span><span class="peta-flora-detail-label">Tips:</span> ${mainFlora.tips}</div>` : ''}
                    </div>
                </div>
            </div>
        </div>
    `;

    // 2. Render Other Species to Bottom Container
    const otherSpecies = d.species.filter(s => !s.isMain);
    const bottomContainer = document.getElementById('floraLainnyaContainer');

    if (otherSpecies.length > 0) {
        let otherHtml = `
            <div class="peta-species-section bottom-section">
                <h4 class="peta-species-title">🌱 Flora Lainnya di ${d.name}</h4>
                <div class="peta-flora-grid">
        `;

        otherSpecies.forEach(function (s, index) {
            const sStatusClass = s.status === 'Kritis' ? 'status-critical' :
                (s.status === 'Langka' ? 'status-vulnerable' :
                    (s.status === 'Rentan' ? 'status-vulnerable' : 'status-safe'));

            otherHtml += `
                <div class="peta-flora-card">
                    <div class="peta-flora-number">${index + 1}</div>
                    <div class="peta-flora-info">
                        <h5 class="peta-flora-name">${s.name}</h5>
                        <p class="peta-flora-latin"><em>${(s.latin && !s.latin.toLowerCase().includes('sp.')) ? s.latin : '-'}</em></p>
                        <span class="peta-flora-status ${sStatusClass}">${s.status || 'Umum'}</span>
                        ${s.deskripsi ? `<p class="peta-flora-desc">${s.deskripsi}</p>` : ''}
                        ${s.ancaman && s.ancaman !== 'Tidak ada ancaman signifikan saat ini' ? `<p class="peta-flora-threat">⚠️ ${s.ancaman}</p>` : ''}
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
        document.getElementById('floraHabitatList').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function () {
    fetchFloraData();
});
