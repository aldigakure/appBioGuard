/**
 * Dashboard Flora Map - Interactive Indonesia Map for Dashboard
 * Fetches flora data from external JSON API
 */

// Province name to Highcharts key mapping
const floraProvinceToKey = {
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

// Flora data storage
let dashboardFloraData = {};

// API URL for province data
const FLORA_API_URL = 'https://smartonesda.github.io/bioexplore-nusantara/assets/data/provinsi.json';

/**
 * Parse conservation status from status string
 */
function parseFloraStatus(statusString) {
    if (!statusString) return 'Umum';
    if (statusString.includes('Kritis') || statusString.includes('Critically')) return 'Kritis';
    if (statusString.includes('Terancam') || statusString.includes('Endangered')) return 'Terancam';
    if (statusString.includes('Rentan') || statusString.includes('Vulnerable')) return 'Rentan';
    if (statusString.includes('Langka')) return 'Langka';
    return 'Umum';
}

/**
 * Fetch flora data from external API
 */
async function fetchDashboardFloraData() {
    try {
        const response = await fetch(FLORA_API_URL);
        const data = await response.json();

        // Transform data to match Highcharts key format
        for (const [provinceName, provinceData] of Object.entries(data)) {
            const key = floraProvinceToKey[provinceName];
            if (key && provinceData.flora) {
                const flora = provinceData.flora;
                const otherSpecies = flora.lainnya || [];

                // Build species array from main flora and lainnya
                const species = [{
                    name: flora.nama,
                    latin: flora.latin,
                    namaLain: flora.namaLain,
                    status: parseFloraStatus(flora.status),
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

                dashboardFloraData[key] = {
                    name: provinceName,
                    mainFlora: flora,
                    species: species,
                    value: 100 + (species.length * 50) + Math.floor(Math.random() * 200)
                };
            }
        }

        initializeDashboardFloraMap();
    } catch (error) {
        console.error('Error fetching flora data:', error);
        initializeDashboardFloraMap();
    }
}

/**
 * Initialize Highcharts map for flora on dashboard
 */
function initializeDashboardFloraMap() {
    const mapData = [];
    Highcharts.maps['countries/id/id-all'].features.forEach(function (f) {
        const code = f.properties['hc-key'];
        mapData.push({
            'hc-key': code,
            value: dashboardFloraData[code]?.value || 150,
            name: f.properties.name
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
                const d = dashboardFloraData[this.point['hc-key']];
                const speciesCount = d?.species?.length || 0;
                return '<div style="padding:8px;"><b>🌿 ' + this.point.name + '</b><br>' + speciesCount + ' spesies flora tercatat</div>';
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
                    color: '#10b981',
                    borderWidth: 2
                }
            },
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        showDashboardFloraDetail(this['hc-key'], this.name);
                    }
                }
            }
        }]
    });
}

/**
 * Show flora detail panel for selected province
 */
function showDashboardFloraDetail(code, name) {
    const d = dashboardFloraData[code];

    if (!d) {
        document.getElementById('floraHabitatList').innerHTML = `
            <div class="bioguard-habitat-placeholder">
                <div class="bioguard-habitat-placeholder-icon">🌿</div>
                <p>Data flora untuk ${name} belum tersedia</p>
            </div>
        `;
        document.getElementById('dashboardFloraLainnyaContainer').innerHTML = '';
        return;
    }

    const mainFlora = d.mainFlora;
    const mainStatus = parseFloraStatus(mainFlora?.status);
    const statusClass = mainStatus === 'Kritis' ? 'status-critical' :
        (mainStatus === 'Terancam' ? 'status-critical' :
            (mainStatus === 'Rentan' ? 'status-vulnerable' :
                (mainStatus === 'Langka' ? 'status-vulnerable' : 'status-safe')));

    // Check for latin placeholder
    const mainLatinDisplay = (mainFlora?.latin && !mainFlora.latin.toLowerCase().includes('sp.')) ? mainFlora.latin : '-';

    // Build description from available fields
    const mainDescription = mainFlora?.budaya ?
        `${mainFlora.nama} adalah ${mainFlora.identitas || 'flora khas'} ${d.name}. ${mainFlora.budaya ? 'Dalam budaya lokal, ' + mainFlora.nama.toLowerCase() + ' digunakan sebagai ' + mainFlora.budaya.toLowerCase() + '.' : ''} ${mainFlora.simbol ? 'Melambangkan ' + mainFlora.simbol.toLowerCase() + '.' : ''}` :
        `${mainFlora?.nama || 'Flora ini'} merupakan flora identitas provinsi ${d.name}. Tumbuhan ini memiliki nilai ekologis dan budaya yang penting bagi masyarakat setempat.`;

    // Identity Content (Sidebar)
    let identityHtml = `
        <div class="peta-detail-content-wrapper">
            <div class="peta-detail-header">
                <div class="peta-detail-icon">🌿</div>
                <div>
                    <h3 class="peta-detail-title">${d.name}</h3>
                    <p class="peta-detail-subtitle">${d.species.length} spesies flora tercatat</p>
                </div>
            </div>

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

            <div class="peta-species-section">
                <h4 class="peta-species-title">🏆 Flora Identitas</h4>
                <div class="peta-flora-identity-card">
                    <div class="peta-flora-identity-header">
                        <div class="peta-flora-identity-icon">🌺</div>
                        <div class="peta-flora-identity-info">
                            <h5 class="peta-flora-identity-name">${mainFlora?.nama || '-'}</h5>
                            ${mainFlora?.namaLain ? `<p class="peta-flora-identity-alias">${mainFlora.namaLain}</p>` : ''}
                            <p class="peta-flora-identity-latin"><em>${mainLatinDisplay}</em></p>
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

    // Render Identity to Sidebar
    document.getElementById('floraHabitatList').innerHTML = identityHtml;

    // Others Content (Bottom)
    const otherSpecies = d.species.filter(s => !s.isMain);
    let othersHtml = '';

    if (otherSpecies.length > 0) {
        othersHtml = `
            <div class="flora-lainnya-wrapper">
                <div class="peta-species-section bottom-section">
                    <h4 class="peta-species-title">🌱 Flora Lainnya di ${d.name}</h4>
                    <div class="peta-flora-grid">
        `;

        otherSpecies.forEach(function (s, index) {
            const sStatusClass = s.status === 'Kritis' ? 'status-critical' :
                (s.status === 'Langka' ? 'status-vulnerable' :
                    (s.status === 'Rentan' ? 'status-vulnerable' : 'status-safe'));

            // Check for latin placeholder in others
            const sLatinDisplay = (s.latin && !s.latin.toLowerCase().includes('sp.')) ? s.latin : '-';

            othersHtml += `
                <div class="peta-flora-card">
                    <div class="peta-flora-number">${index + 1}</div>
                    <div class="peta-flora-info">
                        <h5 class="peta-flora-name">${s.name}</h5>
                        <p class="peta-flora-latin"><em>${sLatinDisplay}</em></p>
                        <span class="peta-flora-status ${sStatusClass}">${s.status || 'Umum'}</span>
                        ${s.deskripsi ? `<p class="peta-flora-desc">${s.deskripsi}</p>` : ''}
                        ${s.ancaman && s.ancaman !== 'Tidak ada ancaman signifikan saat ini' ? `<p class="peta-flora-threat">⚠️ ${s.ancaman}</p>` : ''}
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
    document.getElementById('dashboardFloraLainnyaContainer').innerHTML = othersHtml;

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
    fetchDashboardFloraData();
});
