/**
 * EcoDetect Map - Kelompok Tani Hutan (KTH) Distribution Map
 * External JavaScript for maintenance convenience
 */

// Province name to Highcharts key mapping
const provinceToKey = {
    'Aceh': 'id-ac',
    'Sumatera Utara': 'id-su',
    'Sumatera Barat': 'id-sb',
    'Riau': 'id-ri',
    'Jambi': 'id-ja',
    'Bengkulu': 'id-be',
    'Sumatera Selatan': 'id-sl',
    'Kepulauan Bangka Belitung': 'id-bb',
    'Lampung': 'id-1024',
    'Kepulauan Riau': 'id-kr',
    'DKI Jakarta': 'id-jk',
    'Jawa Barat': 'id-jr',
    'Banten': 'id-bt',
    'Jawa Tengah': 'id-jt',
    'DIY': 'id-yo',
    'Jawa Timur': 'id-ji',
    'Bali': 'id-ba',
    'NTB': 'id-nb',
    'NTT': 'id-nt',
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
    'Papua Selatan': 'id-ps'
};

// Reverse mapping: hc-key to province name
const keyToProvince = {};
for (const [province, key] of Object.entries(provinceToKey)) {
    keyToProvince[key] = province;
}

// KTH data storage
let kthData = {};

// Data source URL - can be changed to external API
const DATA_URL = '/assets/data/kth-data.json';

/**
 * Fetch KTH data from JSON file
 */
async function fetchKTHData() {
    try {
        const response = await fetch(DATA_URL);
        if (!response.ok) {
            throw new Error('Failed to fetch KTH data');
        }
        const data = await response.json();
        processKTHData(data);
        initializeMap();
    } catch (error) {
        console.error('Error loading KTH data:', error);
        // Show error message
        document.getElementById('detailPlaceholder').innerHTML = `
            <div class="peta-detail-placeholder-icon">⚠️</div>
            <h3>Gagal Memuat Data</h3>
            <p>Terjadi kesalahan saat memuat data. Silakan refresh halaman.</p>
        `;
    }
}

/**
 * Process raw JSON data into usable format
 */
function processKTHData(data) {
    const provinces = data.provinces;

    for (const [provinceName, provinceData] of Object.entries(provinces)) {
        const hcKey = provinceToKey[provinceName];
        if (hcKey) {
            kthData[hcKey] = {
                name: provinceName,
                region: provinceData.region,
                kthCount: provinceData.kthCount,
                groups: provinceData.groups || [],
                value: provinceData.kthCount // For map coloring
            };
        }
    }
}

/**
 * Get color based on KTH count
 */
function getColorByCount(count) {
    if (count >= 300) return '#064e3b'; // Very high
    if (count >= 200) return '#059669'; // High
    if (count >= 100) return '#34d399'; // Medium
    return '#a7f3d0'; // Low
}

/**
 * Initialize Highcharts Map
 */
function initializeMap() {
    // Prepare series data
    const seriesData = [];

    // Get all map points from Highcharts map data
    Highcharts.maps['countries/id/id-all'].features.forEach(feature => {
        const hcKey = feature.properties['hc-key'];
        const provinceData = kthData[hcKey];

        if (provinceData) {
            seriesData.push({
                'hc-key': hcKey,
                value: provinceData.kthCount,
                name: provinceData.name,
                color: getColorByCount(provinceData.kthCount)
            });
        } else {
            seriesData.push({
                'hc-key': hcKey,
                value: 0,
                name: feature.properties.name,
                color: '#e2e8f0'
            });
        }
    });

    // Create the map
    Highcharts.mapChart('indonesia-map', {
        chart: {
            backgroundColor: 'transparent',
            style: {
                fontFamily: 'inherit'
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
                align: 'left'
            }
        },
        colorAxis: {
            min: 0,
            max: 500,
            stops: [
                [0, '#a7f3d0'],
                [0.2, '#34d399'],
                [0.5, '#059669'],
                [1, '#064e3b']
            ],
            labels: {
                enabled: false
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            backgroundColor: 'rgba(255, 255, 255, 0.95)',
            borderColor: '#10b981',
            borderRadius: 8,
            shadow: true,
            useHTML: true,
            formatter: function () {
                const data = kthData[this.point['hc-key']];
                if (data) {
                    return `
                        <div style="padding: 8px;">
                            <strong style="font-size: 14px; color: #064e3b;">${data.name}</strong><br/>
                            <span style="color: #059669;">🌾 ${data.kthCount} Kelompok Tani Hutan</span><br/>
                            <span style="color: #6b7280; font-size: 12px;"></span>
                        </div>
                    `;
                }
                return `<strong>${this.point.name}</strong><br/>Data belum tersedia`;
            }
        },
        series: [{
            data: seriesData,
            mapData: Highcharts.maps['countries/id/id-all'],
            joinBy: 'hc-key',
            name: 'Kelompok Tani Hutan',
            states: {
                hover: {
                    color: '#fbbf24',
                    borderColor: '#f59e0b',
                    borderWidth: 2
                }
            },
            borderColor: '#ffffff',
            borderWidth: 1,
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        showKTHDetail(this['hc-key'], this.name);
                    }
                }
            }
        }]
    });
}

/**
 * Show KTH detail panel for selected province
 */
function showKTHDetail(code, name) {
    const d = kthData[code];

    if (!d) {
        document.getElementById('detailPlaceholder').style.display = 'block';
        document.getElementById('detailContent').style.display = 'none';
        document.getElementById('detailPlaceholder').innerHTML = `
            <div class="peta-detail-placeholder-icon">🗺️</div>
            <h3>${name}</h3>
            <p>Data Kelompok Tani Hutan untuk provinsi ini belum tersedia</p>
        `;
        return;
    }

    // Hide placeholder, show content
    document.getElementById('detailPlaceholder').style.display = 'none';
    document.getElementById('detailContent').style.display = 'block';

    // Update header
    document.getElementById('provinceIcon').textContent = '🌾';
    document.getElementById('provinceName').textContent = d.name;
    document.getElementById('provinceRegion').textContent = d.region;

    // Update stats
    document.getElementById('kthCount').textContent = d.kthCount;
    document.getElementById('groupsCount').textContent = d.groups.length;

    // Calculate active percentage (sample calculation)
    const activePercent = Math.round((d.groups.length / d.kthCount) * 100);
    document.getElementById('activePercent').textContent = activePercent + '%';

    // Update groups list
    let groupsHtml = '';
    const displayGroups = d.groups.slice(0, 5); // Show first 5 groups

    displayGroups.forEach((group, index) => {
        groupsHtml += `
            <div class="peta-kth-card">
                <div class="peta-kth-number">${index + 1}</div>
                <div class="peta-kth-info">
                    <h5 class="peta-kth-name">${group.nama}</h5>
                    <p class="peta-kth-register">📋 ${group.register}</p>
                    <p class="peta-kth-alamat">📍 ${group.alamat}</p>
                </div>
            </div>
        `;
    });

    if (d.kthCount > displayGroups.length) {
        groupsHtml += `
            <div class="peta-kth-more">
                <span>+ ${d.kthCount - displayGroups.length} kelompok lainnya</span>
            </div>
        `;
    }

    document.getElementById('kthList').innerHTML = groupsHtml;

    // Update region info
    document.getElementById('regionTag').textContent = d.region;
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function () {
    fetchKTHData();
});
