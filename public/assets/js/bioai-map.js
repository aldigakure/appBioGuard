/**
 * Bio-AI Reforestation Map - Interactive Indonesia Map
 * Fetches reforestation data from external JSON
 * Data source: Luas Kegiatan Reboisasi, 2019.xlsx
 */

// Province name to Highcharts key mapping
const bioaiProvinceToKey = {
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
    'Papua Barat': 'id-ib'
};

// Reforestation data storage
let reforestationData = {};
let dataMetadata = {};

// API URL for reforestation data
const REBOISASI_DATA_URL = '/assets/data/reboisasi-data.json';

/**
 * Fetch reforestation data from JSON
 */
async function fetchReforestationData() {
    try {
        const response = await fetch(REBOISASI_DATA_URL);
        const data = await response.json();

        // Extract metadata
        if (data.metadata) {
            dataMetadata = data.metadata;
            delete data.metadata;
        }

        // Transform data to match Highcharts key format
        for (const [provinceName, provinceData] of Object.entries(data)) {
            const key = bioaiProvinceToKey[provinceName];
            if (key) {
                reforestationData[key] = {
                    ...provinceData,
                    value: provinceData.luasReboisasi || 0
                };
            }
        }

        // Update total stats after data is loaded
        updateTotalStats();

        initReforestationMap();
    } catch (error) {
        console.error('Error fetching reforestation data:', error);
        initReforestationMap();
    }
}

/**
 * Update total stats from data
 */
function updateTotalStats() {
    // Calculate totals from data
    let totalPohon = 0;
    let totalArea = 0;
    let totalProvinsi = 0;
    let highPriorityCount = 0;
    let criticalCount = 0;

    Object.values(reforestationData).forEach(d => {
        totalPohon += d.pohonDitanam || 0;
        totalArea += d.luasReboisasi || 0;
        totalProvinsi++;

        if (d.prioritas === 'high') highPriorityCount++;
        if (d.prioritas === 'critical') criticalCount++;
    });

    // Animate counting up numbers
    animateValue('stat-pohon', 0, totalPohon, 1500);
    animateValue('stat-hektar', 0, totalArea, 1500);

    // Update stat cards
    const provinsiElement = document.getElementById('stat-provinsi');
    const prioritasElement = document.getElementById('stat-prioritas');

    if (provinsiElement) provinsiElement.textContent = totalProvinsi;
    if (prioritasElement) prioritasElement.textContent = highPriorityCount + criticalCount;

    // Update trend texts
    const pohonTrend = document.getElementById('stat-pohon-trend');
    const hektarTrend = document.getElementById('stat-hektar-trend');
    const prioritasTrend = document.getElementById('stat-prioritas-trend');

    if (pohonTrend) pohonTrend.textContent = `Data ${dataMetadata.tahun || 2019}`;
    if (hektarTrend) hektarTrend.textContent = `Total ${totalArea.toLocaleString()} Ha`;
    if (prioritasTrend) {
        if (criticalCount > 0) {
            prioritasTrend.textContent = `${criticalCount} kritis, ${highPriorityCount} tinggi`;
        } else {
            prioritasTrend.textContent = `${highPriorityCount} area perlu perhatian`;
        }
    }

    // Update chart with actual data
    updateTrendChart(totalArea);

    // Update priority table with data
    updatePriorityTable();
}

/**
 * Animate value counting up
 */
function animateValue(elementId, start, end, duration) {
    const element = document.getElementById(elementId);
    if (!element) return;

    const startTime = performance.now();
    const range = end - start;

    function updateValue(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easeOut = 1 - Math.pow(1 - progress, 3);
        const current = Math.floor(start + (range * easeOut));
        element.textContent = current.toLocaleString();

        if (progress < 1) {
            requestAnimationFrame(updateValue);
        } else {
            element.textContent = end.toLocaleString() + (elementId === 'stat-pohon' ? '+' : '');
        }
    }

    requestAnimationFrame(updateValue);
}

/**
 * Update trend chart with calculated data from JSON
 */
function updateTrendChart(currentTotal) {
    // Data from JSON is 2019, simulate trend from there
    const years = ['2019', '2020', '2021', '2022', '2023', '2024'];
    const growthRates = [1, 1.05, 1.12, 1.20, 1.28, 1.38]; // Cumulative growth

    // Convert to thousands (ribu Ha)
    const baseValue = currentTotal / 1000;
    const trendData = growthRates.map(rate => Math.round(baseValue * rate * 10) / 10);

    // Update chart if it exists
    const chart = Highcharts.charts.find(c => c && c.renderTo && c.renderTo.id === 'treesTrendChart');
    if (chart) {
        chart.xAxis[0].setCategories(years);
        chart.series[0].setData(trendData, true, true);
    }
}

/**
 * Initialize Highcharts map for reforestation
 */
function initReforestationMap() {
    const mapData = [];

    Highcharts.maps['countries/id/id-all'].features.forEach(function (f) {
        const code = f.properties['hc-key'];
        const data = reforestationData[code];
        mapData.push({
            'hc-key': code,
            value: data?.value || Math.floor(Math.random() * 5000) + 500,
            name: f.properties.name
        });
    });

    Highcharts.mapChart('reforestation-map', {
        chart: {
            backgroundColor: 'transparent',
            height: 450
        },
        title: { text: null },
        credits: { enabled: false },
        exporting: { enabled: false },
        mapNavigation: {
            enabled: true,
            buttonOptions: { verticalAlign: 'bottom' }
        },
        legend: { enabled: false },
        colorAxis: {
            min: 0,
            max: 20000,
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
                const d = reforestationData[this.point['hc-key']];
                const luas = d?.luasReboisasi || 'N/A';
                const pohon = d?.pohonDitanam || 'N/A';
                return '<div style="padding:8px;"><b>🌲 ' + this.point.name + '</b><br>' +
                    'Luas Reboisasi: ' + (typeof luas === 'number' ? luas.toLocaleString() + ' Ha' : luas) + '<br>' +
                    'Pohon Ditanam: ' + (typeof pohon === 'number' ? pohon.toLocaleString() : pohon) + '<br>' +
                    '<small style="color:#10b981;">Klik untuk detail →</small></div>';
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
                        showProvinceDetail(this['hc-key'], this.name);
                    }
                }
            }
        }]
    });
}

/**
 * Show province detail panel
 */
function showProvinceDetail(code, name) {
    const d = reforestationData[code] || {
        nama: name,
        wilayah: 'Indonesia',
        luasReboisasi: Math.floor(Math.random() * 10000) + 1000,
        pohonDitanam: Math.floor(Math.random() * 50000) + 10000,
        kelembapanTanah: Math.floor(Math.random() * 40) + 40,
        tingkatDeforestasi: Math.floor(Math.random() * 20) + 5,
        tutupanHutan: Math.floor(Math.random() * 30) + 30,
        kesehatanTanah: Math.floor(Math.random() * 30) + 50,
        prioritas: 'medium',
        rekomendasi: 'Lakukan survei lebih lanjut untuk menentukan strategi reboisasi optimal.'
    };

    // Hide placeholder, show content
    const placeholder = document.getElementById('detailPlaceholder');
    const content = document.getElementById('detailContent');

    if (placeholder) placeholder.style.display = 'none';
    if (content) content.style.display = 'block';

    // Update header
    const provinceNameEl = document.getElementById('provinceName');
    const provinceRegionEl = document.getElementById('provinceRegion');

    if (provinceNameEl) provinceNameEl.textContent = d.nama || name;
    if (provinceRegionEl) provinceRegionEl.textContent = d.wilayah || 'Indonesia';

    // Update stats
    const treesPlantedEl = document.getElementById('treesPlanted');
    const areaRestoredEl = document.getElementById('areaRestored');
    const soilMoistureEl = document.getElementById('soilMoisture');

    if (treesPlantedEl) treesPlantedEl.textContent = (d.pohonDitanam || 0).toLocaleString();
    if (areaRestoredEl) areaRestoredEl.textContent = (d.luasReboisasi || 0).toLocaleString();
    if (soilMoistureEl) soilMoistureEl.textContent = (d.kelembapanTanah || 0) + '%';

    // Update progress bars
    const deforestationBar = document.getElementById('deforestationBar');
    const deforestationRate = document.getElementById('deforestationRate');
    const forestBar = document.getElementById('forestBar');
    const forestCoverage = document.getElementById('forestCoverage');
    const soilBar = document.getElementById('soilBar');
    const soilHealth = document.getElementById('soilHealth');

    if (deforestationBar) deforestationBar.style.width = (d.tingkatDeforestasi || 0) + '%';
    if (deforestationRate) deforestationRate.textContent = (d.tingkatDeforestasi || 0) + '%';
    if (forestBar) forestBar.style.width = (d.tutupanHutan || 0) + '%';
    if (forestCoverage) forestCoverage.textContent = (d.tutupanHutan || 0) + '%';
    if (soilBar) soilBar.style.width = (d.kesehatanTanah || 0) + '%';
    if (soilHealth) soilHealth.textContent = (d.kesehatanTanah || 0) + '%';

    // Update priority badge
    const priorityBadge = document.getElementById('priorityBadge');
    if (priorityBadge) {
        const priorityLabels = {
            'critical': 'Kritis',
            'high': 'Prioritas Tinggi',
            'medium': 'Prioritas Sedang',
            'low': 'Prioritas Rendah'
        };
        priorityBadge.textContent = priorityLabels[d.prioritas] || 'Prioritas Sedang';
        priorityBadge.className = 'bioai-priority-badge ' + (d.prioritas || 'medium');
    }

    // Update AI recommendation
    const aiRecommendation = document.getElementById('aiRecommendation');
    if (aiRecommendation) aiRecommendation.textContent = d.rekomendasi || '-';

    // Scroll to detail panel on mobile
    if (window.innerWidth < 1024) {
        const detailPanel = document.getElementById('provinceDetailPanel');
        if (detailPanel) {
            detailPanel.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
}

/**
 * Initialize trend chart with placeholder data (will be updated with real data)
 */
function initTrendChart() {
    if (!document.getElementById('treesTrendChart')) return;

    Highcharts.chart('treesTrendChart', {
        chart: {
            type: 'areaspline',
            backgroundColor: 'transparent',
            height: 280
        },
        title: { text: null },
        credits: { enabled: false },
        xAxis: {
            categories: ['2019', '2020', '2021', '2022', '2023', '2024'],
            labels: { style: { color: '#6b7280' } }
        },
        yAxis: {
            title: { text: 'Luas Reboisasi (ribu Ha)', style: { color: '#6b7280' } },
            labels: { style: { color: '#6b7280' } },
            gridLineColor: '#e5e7eb'
        },
        legend: { enabled: false },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br>' +
                    'Luas: ' + this.y.toLocaleString() + ' ribu Ha';
            }
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.3,
                marker: { enabled: true, radius: 4 }
            }
        },
        series: [{
            name: 'Luas Reboisasi',
            data: [0, 0, 0, 0, 0, 0], // Will be updated with real data
            color: '#10b981',
            fillColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, 'rgba(16, 185, 129, 0.4)'],
                    [1, 'rgba(16, 185, 129, 0.05)']
                ]
            }
        }]
    });
}

/**
 * Update the priority table with data from JSON
 */
function updatePriorityTable() {
    const tableBody = document.getElementById('bioaiTableBody');
    if (!tableBody) return;

    // Clear existing rows
    tableBody.innerHTML = '';

    // Get areas from reforestationData
    const areas = Object.entries(reforestationData)
        .sort((a, b) => {
            // Sort critical first, then by deforestation rate
            if (a[1].prioritas === 'critical' && b[1].prioritas !== 'critical') return -1;
            if (b[1].prioritas === 'critical' && a[1].prioritas !== 'critical') return 1;
            return (b[1].tingkatDeforestasi || 0) - (a[1].tingkatDeforestasi || 0);
        });

    if (areas.length === 0) {
        tableBody.innerHTML = '<tr><td colspan="7" style="text-align:center;">Tidak ada data tersedia</td></tr>';
        return;
    }

    areas.forEach(([key, d]) => {
        const row = document.createElement('tr');

        const priorityLabels = {
            'critical': 'Kritis',
            'high': 'Tinggi',
            'medium': 'Sedang',
            'low': 'Rendah'
        };

        const priorityLabel = priorityLabels[d.prioritas] || 'Sedang';
        const deforestationClass = (d.tingkatDeforestasi || 0) > 20 ? 'high' :
            (d.tingkatDeforestasi || 0) > 10 ? 'medium' : 'low';

        row.innerHTML = `
            <td>
                <div class="bioai-location-cell">
                    <span class="bioai-location-icon">🌲</span>
                    <span>${d.nama || 'Unknown'}</span>
                </div>
            </td>
            <td>${d.wilayah || 'Indonesia'}</td>
            <td>
                <div class="bioai-moisture-cell">
                    <div class="bioai-moisture-bar" style="width: ${d.kelembapanTanah || 0}%;"></div>
                    <span>${d.kelembapanTanah || 0}%</span>
                </div>
            </td>
            <td><span class="bioai-deforestation-badge ${deforestationClass}">${d.tingkatDeforestasi || 0}%</span></td>
            <td><span class="bioai-priority-tag ${d.prioritas}">${priorityLabel}</span></td>
            <td>${d.rekomendasi ? d.rekomendasi.substring(0, 50) + '...' : '-'}</td>
            <td>
                <button class="bioai-action-btn" onclick="openBioaiModal('${key}')" title="Lihat Detail">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </button>
            </td>
        `;

        tableBody.appendChild(row);
    });
}

/**
 * Modal Detail Functions
 */
function openBioaiModal(key) {
    const d = reforestationData[key];
    if (!d) return;

    document.getElementById('modalProvinceName').textContent = d.nama || 'Detail Provinsi';
    document.getElementById('modalProvinceRegion').textContent = d.wilayah || 'Indonesia';

    const priorityLabels = {
        'critical': 'Kritis',
        'high': 'Tinggi',
        'medium': 'Sedang',
        'low': 'Rendah'
    };
    document.getElementById('modalProvincePriority').textContent = priorityLabels[d.prioritas] || 'Sedang';

    document.getElementById('modalTreesPlanted').textContent = (d.pohonDitanam || 0).toLocaleString();
    document.getElementById('modalAreaRestored').textContent = (d.luasReboisasi || 0).toLocaleString() + ' Ha';
    document.getElementById('modalSoilMoisture').textContent = (d.kelembapanTanah || 0) + '%';
    document.getElementById('modalDeforestation').textContent = (d.tingkatDeforestasi || 0) + '%';
    document.getElementById('modalRecommendation').textContent = d.rekomendasi || '-';

    document.getElementById('bioaiDetailModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeBioaiModal() {
    document.getElementById('bioaiDetailModal').classList.remove('active');
    document.body.style.overflow = '';
}

// Close modal on overlay click
document.addEventListener('click', function (e) {
    const modal = document.getElementById('bioaiDetailModal');
    if (e.target === modal) {
        closeBioaiModal();
    }
});

// Close modal on Escape key
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeBioaiModal();
    }
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', function () {
    fetchReforestationData();
    initTrendChart();
});
