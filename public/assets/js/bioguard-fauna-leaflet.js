/**
 * BioGuard Fauna Map - Leaflet.js Interactive Map
 * Clean administrative/atlas style with CartoDB Voyager tiles
 * Mobile-friendly with scroll wheel zoom disabled
 */

// SVG Icons for consistent styling
const SVG_ICONS = {
    paw: (size = 24, color = 'currentColor') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="4" r="2"/><circle cx="18" cy="8" r="2"/><circle cx="20" cy="16" r="2"/><path d="M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z"/></svg>`,
    butterfly: (size = 24, color = '#f59e0b') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 21h8"/><path d="M12 17a5 5 0 0 0 5-5c0-4-5-9-5-9s-5 5-5 9a5 5 0 0 0 5 5Z"/><path d="m9.5 14.5 5-5"/></svg>`,
    trophy: (size = 24, color = '#f59e0b') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>`,
    ruler: (size = 18, color = '#06b6d4') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z"/><path d="m14.5 12.5 2-2"/><path d="m11.5 9.5 2-2"/><path d="m8.5 6.5 2-2"/><path d="m17.5 15.5 2-2"/></svg>`,
    scale: (size = 18, color = '#8b5cf6') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>`,
    mountain: (size = 18, color = '#059669') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/><path d="M4.14 15.08c2.62-1.57 5.24-1.43 7.86.42 2.74 1.94 5.49 2 8.23.19"/></svg>`,
    utensils: (size = 18, color = '#22c55e') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>`,
    search: (size = 18, color = '#6366f1') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>`,
    lightbulb: (size = 18, color = '#f59e0b') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>`,
    animal: (size = 24, color = '#f59e0b') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 16V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v10"/><path d="M12 14h8a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-8"/><path d="M4 10h4"/><path d="M4 6h4"/><path d="m11 19-2.5 2.5L6 19"/><circle cx="8" cy="12" r="6"/></svg>`
};

// Fauna data storage
let faunaData = {};
let map = null;
let markers = [];

// API URL
const FAUNA_API_URL = 'https://smartonesda.github.io/bioexplore-nusantara/assets/data/provinsi.json';

// Province coordinates for Indonesia
const provinceCoordinates = {
    'Aceh': { lat: 4.695135, lng: 96.749397 },
    'Sumatera Utara': { lat: 2.115355, lng: 99.545097 },
    'Sumatera Barat': { lat: -0.739940, lng: 100.800003 },
    'Riau': { lat: 0.507068, lng: 101.447777 },
    'Jambi': { lat: -1.610910, lng: 103.613131 },
    'Sumatera Selatan': { lat: -3.319437, lng: 103.914399 },
    'Bengkulu': { lat: -3.792577, lng: 102.260760 },
    'Lampung': { lat: -4.558585, lng: 105.406789 },
    'Kepulauan Bangka Belitung': { lat: -2.741051, lng: 106.440585 },
    'Kepulauan Riau': { lat: 3.945638, lng: 108.142868 },
    'DKI Jakarta': { lat: -6.211544, lng: 106.845172 },
    'Jawa Barat': { lat: -6.902430, lng: 107.618810 },
    'Jawa Tengah': { lat: -7.150975, lng: 110.140259 },
    'DI Yogyakarta': { lat: -7.797068, lng: 110.370529 },
    'Jawa Timur': { lat: -7.536064, lng: 112.238402 },
    'Banten': { lat: -6.405817, lng: 106.064019 },
    'Bali': { lat: -8.340934, lng: 115.091995 },
    'Nusa Tenggara Barat': { lat: -8.650979, lng: 117.361649 },
    'Nusa Tenggara Timur': { lat: -8.657381, lng: 121.079370 },
    'Kalimantan Barat': { lat: -0.278788, lng: 111.475290 },
    'Kalimantan Tengah': { lat: -1.681488, lng: 113.382355 },
    'Kalimantan Selatan': { lat: -3.092640, lng: 115.283467 },
    'Kalimantan Timur': { lat: 1.693770, lng: 116.419389 },
    'Kalimantan Utara': { lat: 3.073020, lng: 116.041190 },
    'Sulawesi Utara': { lat: 0.624016, lng: 123.975017 },
    'Sulawesi Tengah': { lat: -1.430420, lng: 121.445632 },
    'Sulawesi Selatan': { lat: -3.668709, lng: 119.974442 },
    'Sulawesi Tenggara': { lat: -4.144910, lng: 122.174605 },
    'Gorontalo': { lat: 0.696340, lng: 122.447525 },
    'Sulawesi Barat': { lat: -2.844370, lng: 119.232005 },
    'Maluku': { lat: -3.238460, lng: 130.145270 },
    'Maluku Utara': { lat: 1.570850, lng: 127.808754 },
    'Papua Barat': { lat: -1.336020, lng: 133.174166 },
    'Papua': { lat: -4.269928, lng: 138.080353 },
    'Papua Barat Daya': { lat: -1.850000, lng: 132.250000 },
    'Papua Tengah': { lat: -3.900000, lng: 136.500000 },
    'Papua Pegunungan': { lat: -4.100000, lng: 138.900000 },
    'Papua Selatan': { lat: -6.500000, lng: 139.500000 }
};

// Fauna icons mapping
const faunaIcons = {
    'gajah': '🐘',
    'harimau': '🐅',
    'orangutan': '🦧',
    'komodo': '🦎',
    'badak': '🦏',
    'burung': '🦅',
    'elang': '🦅',
    'cendrawasih': '🐦',
    'merak': '🦚',
    'jalak': '🐦',
    'ikan': '🐟',
    'penyu': '🐢',
    'kura': '🐢',
    'rusa': '🦌',
    'banteng': '🐂',
    'anoa': '🐃',
    'beruang': '🐻',
    'monyet': '🐒',
    'kuskus': '🐨',
    'kasuari': '🦃',
    'default': '🦋'
};

/**
 * Get fauna icon based on name
 */
function getFaunaIcon(name) {
    if (!name) return faunaIcons.default;
    const lowerName = name.toLowerCase();
    for (const [key, icon] of Object.entries(faunaIcons)) {
        if (lowerName.includes(key)) return icon;
    }
    return faunaIcons.default;
}

/**
 * Parse conservation status
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
 * Initialize Leaflet Map
 */
function initFaunaMap() {
    // Indonesia center
    const indonesiaCenter = [-2.5, 118.0];

    // Responsive zoom based on screen width
    let initialZoom = 5;
    if (window.innerWidth <= 480) {
        initialZoom = 4;
    } else if (window.innerWidth <= 768) {
        initialZoom = 4;
    } else if (window.innerWidth <= 1024) {
        initialZoom = 4.5;
    }

    // Create map with mobile-friendly options and infinite scroll (world wrapping)
    map = L.map('fauna-map', {
        center: indonesiaCenter,
        zoom: initialZoom,
        minZoom: 3,
        maxZoom: 10,
        scrollWheelZoom: false,
        zoomControl: true,
        attributionControl: false,
        // Enable world wrapping (looping) - when user drags beyond map edge, it wraps around
        worldCopyJump: true,
        // No bounds restriction - allow infinite panning
        maxBoundsViscosity: 0
    });

    // Simple tile layer with minimal detail (loads fast)
    // noWrap: false allows tiles to repeat horizontally for seamless infinite scroll
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png', {
        subdomains: 'abcd',
        maxZoom: 10,
        noWrap: false  // Allow tile wrapping for infinite horizontal scroll
    }).addTo(map);

    // Add Indonesia GeoJSON overlay with YELLOW color for Fauna
    fetch('https://raw.githubusercontent.com/superpikar/indonesia-geojson/master/indonesia.geojson')
        .then(response => response.json())
        .then(data => {
            L.geoJSON(data, {
                style: {
                    fillColor: '#fde047',
                    fillOpacity: 0.85,
                    color: '#eab308',
                    weight: 2,
                    opacity: 1
                }
            }).addTo(map);
        })
        .catch(error => {
            console.log('GeoJSON not loaded');
        });

    // Move zoom control to bottom right
    map.zoomControl.setPosition('bottomright');

    // Fetch fauna data
    fetchFaunaData();

    // Handle window resize
    window.addEventListener('resize', function () {
        if (map) {
            map.invalidateSize();
        }
    });
}


/**
 * Fetch fauna data from API
 */
async function fetchFaunaData() {
    try {
        const response = await fetch(FAUNA_API_URL);
        const data = await response.json();

        // Transform data
        for (const [provinceName, provinceData] of Object.entries(data)) {
            if (provinceData.fauna) {
                const fauna = provinceData.fauna;
                const otherSpecies = fauna.lainnya || [];

                const species = [{
                    name: fauna.nama,
                    latin: fauna.latin,
                    namaLain: fauna.namaLain,
                    status: parseStatus(fauna.status),
                    habitat: fauna.habitat,
                    perilaku: fauna.perilaku,
                    makanan: fauna.makanan,
                    tips: fauna.tips,
                    ukuran: fauna.ukuran,
                    berat: fauna.berat,
                    budaya: fauna.budaya,
                    simbol: fauna.simbol,
                    identitas: fauna.identitas,
                    isMain: true
                }];

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

                faunaData[provinceName] = {
                    name: provinceName,
                    mainFauna: fauna,
                    species: species
                };
            }
        }

        // Add markers
        addFaunaMarkers();

    } catch (error) {
        console.error('Error fetching fauna data:', error);
    }
}

/**
 * Create custom marker icon for fauna
 */
function createFaunaMarkerIcon() {
    return L.divIcon({
        className: 'custom-marker',
        html: `
            <div class="marker-pin fauna">
                <span class="marker-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M8 21h8"/><path d="M12 17a5 5 0 0 0 5-5c0-4-5-9-5-9s-5 5-5 9a5 5 0 0 0 5 5Z"/><path d="m9.5 14.5 5-5"/></svg></span>
            </div>
        `,
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    });
}

/**
 * Add fauna markers to map
 */
function addFaunaMarkers() {
    markers.forEach(marker => map.removeLayer(marker));
    markers = [];

    for (const [provinceName, data] of Object.entries(faunaData)) {
        const coords = provinceCoordinates[provinceName];
        if (!coords) continue;

        const mainFauna = data.mainFauna;
        const speciesCount = data.species.length;
        const faunaIcon = getFaunaIcon(mainFauna?.nama);

        // Create marker
        const marker = L.marker([coords.lat, coords.lng], {
            icon: createFaunaMarkerIcon(),
            title: provinceName
        }).addTo(map);

        // Popup content
        const popupContent = `
            <div class="map-popup">
                <div class="map-popup-image" style="background: linear-gradient(135deg, #fef3c7, #fde68a);">${SVG_ICONS.animal(48)}</div>
                <div class="map-popup-content">
                    <h3 class="map-popup-title">${mainFauna?.nama || provinceName}</h3>
                    <p class="map-popup-subtitle">${provinceName} • ${speciesCount} spesies</p>
                    <button class="map-popup-btn fauna" onclick="showFaunaDetail('${provinceName}')">
                        Lihat Detail
                    </button>
                </div>
            </div>
        `;

        marker.bindPopup(popupContent, {
            maxWidth: 280,
            minWidth: 220,
            closeButton: true,
            className: 'fauna-popup'
        });

        markers.push(marker);
    }
}

/**
 * Show fauna detail panel
 */
function showFaunaDetail(provinceName) {
    const d = faunaData[provinceName];

    // Close popup
    map.closePopup();

    // Zoom to province
    const coords = provinceCoordinates[provinceName];
    if (coords && map) {
        map.setView([coords.lat, coords.lng], 7, { animate: true });
    }

    if (!d) {
        document.getElementById('faunaHabitatList').innerHTML = `
            <div class="bioguard-habitat-placeholder">
                <div class="bioguard-habitat-placeholder-icon">${SVG_ICONS.butterfly(64)}</div>
                <p>Data fauna untuk ${provinceName} belum tersedia</p>
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
    const faunaIcon = getFaunaIcon(mainFauna?.nama);

    const mainDescription = mainFauna?.budaya ?
        `${mainFauna.nama} adalah ${mainFauna.identitas || 'fauna khas'} ${d.name}. ${mainFauna.budaya}` :
        `${mainFauna?.nama || 'Fauna ini'} merupakan fauna identitas provinsi ${d.name}.`;

    // Render detail panel
    document.getElementById('faunaHabitatList').innerHTML = `
        <div class="peta-detail-content-wrapper">
            <div class="peta-detail-header fauna">
                <div class="peta-detail-icon">${SVG_ICONS.butterfly(32)}</div>
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
                <h4 class="peta-species-title fauna">${SVG_ICONS.trophy(20)} Fauna Identitas</h4>
                <div class="peta-fauna-identity-card">
                    <div class="peta-fauna-identity-header">
                        <div class="peta-fauna-identity-icon">${SVG_ICONS.animal(40)}</div>
                        <div class="peta-fauna-identity-info">
                            <h5 class="peta-fauna-identity-name">${mainFauna?.nama || '-'}</h5>
                            ${mainFauna?.namaLain ? `<p class="peta-fauna-identity-alias">${mainFauna.namaLain}</p>` : ''}
                            <p class="peta-fauna-identity-latin"><em>${mainFauna?.latin || '-'}</em></p>
                            <span class="peta-fauna-identity-status ${statusClass}">${mainStatus}</span>
                        </div>
                    </div>
                    <div class="peta-fauna-identity-desc">
                        <p>${mainDescription}</p>
                    </div>
                    <div class="peta-fauna-identity-details">
                        ${mainFauna?.ukuran ? `<div class="peta-fauna-detail-item"><span class="peta-fauna-detail-icon">${SVG_ICONS.ruler()}</span><span class="peta-fauna-detail-label">Ukuran:</span> ${mainFauna.ukuran}</div>` : ''}
                        ${mainFauna?.berat ? `<div class="peta-fauna-detail-item"><span class="peta-fauna-detail-icon">${SVG_ICONS.scale()}</span><span class="peta-fauna-detail-label">Berat:</span> ${mainFauna.berat}</div>` : ''}
                        ${mainFauna?.habitat ? `<div class="peta-fauna-detail-item"><span class="peta-fauna-detail-icon">${SVG_ICONS.mountain()}</span><span class="peta-fauna-detail-label">Habitat:</span> ${mainFauna.habitat}</div>` : ''}
                        ${mainFauna?.makanan ? `<div class="peta-fauna-detail-item"><span class="peta-fauna-detail-icon">${SVG_ICONS.utensils()}</span><span class="peta-fauna-detail-label">Makanan:</span> ${mainFauna.makanan}</div>` : ''}
                        ${mainFauna?.perilaku ? `<div class="peta-fauna-detail-item"><span class="peta-fauna-detail-icon">${SVG_ICONS.search()}</span><span class="peta-fauna-detail-label">Perilaku:</span> ${mainFauna.perilaku}</div>` : ''}
                        ${mainFauna?.tips ? `<div class="peta-fauna-detail-item peta-fauna-tips"><span class="peta-fauna-detail-icon">${SVG_ICONS.lightbulb()}</span><span class="peta-fauna-detail-label">Tips:</span> ${mainFauna.tips}</div>` : ''}
                    </div>
                </div>
            </div>
        </div>
    `;

    // Render other species
    const otherSpecies = d.species.filter(s => !s.isMain);
    const bottomContainer = document.getElementById('faunaLainnyaContainer');

    if (otherSpecies.length > 0) {
        let otherHtml = `
            <div class="peta-species-section bottom-section">
                <h4 class="peta-species-title fauna">${SVG_ICONS.paw(20)} Fauna Lainnya di ${d.name}</h4>
                <div class="peta-fauna-grid">
        `;

        otherSpecies.forEach(function (s, index) {
            const sStatusClass = s.status === 'Kritis' ? 'status-critical' :
                (s.status === 'Langka' ? 'status-vulnerable' :
                    (s.status === 'Rentan' ? 'status-vulnerable' : 'status-safe'));
            const sIcon = getFaunaIcon(s.name);

            otherHtml += `
                <div class="peta-fauna-card">
                    <div class="peta-fauna-number">${index + 1}</div>
                    <div class="peta-fauna-info">
                        <h5 class="peta-fauna-name">${s.name}</h5>
                        <p class="peta-fauna-latin"><em>${s.latin || '-'}</em></p>
                        <span class="peta-fauna-status ${sStatusClass}">${s.status || 'Umum'}</span>
                        ${s.deskripsi ? `<p class="peta-fauna-desc">${s.deskripsi}</p>` : ''}
                    </div>
                </div>
            `;
        });

        otherHtml += '</div></div>';
        bottomContainer.innerHTML = otherHtml;
        bottomContainer.style.display = 'block';
    } else {
        bottomContainer.innerHTML = '';
        bottomContainer.style.display = 'none';
    }

    // Scroll to detail on mobile
    if (window.innerWidth < 1024) {
        document.getElementById('faunaHabitatList').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

/**
 * Reset map view
 */
function resetFaunaMapView() {
    if (map) {
        let resetZoom = 5;
        if (window.innerWidth <= 768) {
            resetZoom = 4;
        }
        map.setView([-2.5, 118.0], resetZoom, { animate: true });
    }
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('fauna-map')) {
        initFaunaMap();
    }
});

// Global functions
window.showFaunaDetail = showFaunaDetail;
window.resetFaunaMapView = resetFaunaMapView;
