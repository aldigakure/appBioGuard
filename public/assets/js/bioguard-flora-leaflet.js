/**
 * BioGuard Flora Map - Leaflet.js Interactive Map
 * Clean administrative/atlas style with CartoDB Voyager tiles
 * Mobile-friendly with scroll wheel zoom disabled
 */

// SVG Icons for consistent styling
const SVG_ICONS = {
    leaf: (size = 24, color = 'currentColor') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>`,
    flower: (size = 24, color = '#ec4899') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="1.5"><path d="M12 7.5a4.5 4.5 0 1 1 4.5 4.5M12 7.5A4.5 4.5 0 1 0 7.5 12M12 7.5V9m-4.5 3a4.5 4.5 0 1 0 4.5 4.5M7.5 12H9m7.5 0a4.5 4.5 0 1 1-4.5 4.5m4.5-4.5H15m-3 4.5V15"/><circle cx="12" cy="12" r="3"/></svg>`,
    trophy: (size = 24, color = '#f59e0b') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>`,
    seedling: (size = 24, color = '#10b981') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg>`,
    palette: (size = 18, color = '#8b5cf6') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5" fill="${color}"/><circle cx="17.5" cy="10.5" r=".5" fill="${color}"/><circle cx="8.5" cy="7.5" r=".5" fill="${color}"/><circle cx="6.5" cy="12.5" r=".5" fill="${color}"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.555C21.965 6.012 17.461 2 12 2z"/></svg>`,
    ruler: (size = 18, color = '#06b6d4') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z"/><path d="m14.5 12.5 2-2"/><path d="m11.5 9.5 2-2"/><path d="m8.5 6.5 2-2"/><path d="m17.5 15.5 2-2"/></svg>`,
    mountain: (size = 18, color = '#059669') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/><path d="M4.14 15.08c2.62-1.57 5.24-1.43 7.86.42 2.74 1.94 5.49 2 8.23.19"/></svg>`,
    sparkles: (size = 18, color = '#eab308') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>`,
    lightbulb: (size = 18, color = '#f59e0b') => `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${color}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>`
};

// Flora data storage
let floraData = {};
let map = null;
let markers = [];

// API URL
const FLORA_API_URL = 'https://smartonesda.github.io/bioexplore-nusantara/assets/data/provinsi.json';

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
function initFloraMap() {
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
    map = L.map('flora-map', {
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

    // Add Indonesia GeoJSON overlay with GREEN color for Flora
    fetch('https://raw.githubusercontent.com/superpikar/indonesia-geojson/master/indonesia.geojson')
        .then(response => response.json())
        .then(data => {
            L.geoJSON(data, {
                style: {
                    fillColor: '#86efac',
                    fillOpacity: 0.85,
                    color: '#22c55e',
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

    // Fetch flora data
    fetchFloraData();

    // Handle window resize
    window.addEventListener('resize', function () {
        if (map) {
            map.invalidateSize();
        }
    });
}


/**
 * Fetch flora data from API
 */
async function fetchFloraData() {
    try {
        const response = await fetch(FLORA_API_URL);
        const data = await response.json();

        // Transform data
        for (const [provinceName, provinceData] of Object.entries(data)) {
            if (provinceData.flora) {
                const flora = provinceData.flora;
                const otherSpecies = flora.lainnya || [];

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

                floraData[provinceName] = {
                    name: provinceName,
                    mainFlora: flora,
                    species: species
                };
            }
        }

        // Add markers
        addFloraMarkers();

    } catch (error) {
        console.error('Error fetching flora data:', error);
    }
}

/**
 * Create custom marker icon
 */
function createFloraMarkerIcon() {
    return L.divIcon({
        className: 'custom-marker',
        html: `
            <div class="marker-pin">
                <span class="marker-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg></span>
            </div>
        `,
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    });
}

/**
 * Add flora markers to map
 */
function addFloraMarkers() {
    markers.forEach(marker => map.removeLayer(marker));
    markers = [];

    for (const [provinceName, data] of Object.entries(floraData)) {
        const coords = provinceCoordinates[provinceName];
        if (!coords) continue;

        const mainFlora = data.mainFlora;
        const speciesCount = data.species.length;

        // Create marker
        const marker = L.marker([coords.lat, coords.lng], {
            icon: createFloraMarkerIcon(),
            title: provinceName
        }).addTo(map);

        // Popup content with image placeholder and species info
        const popupContent = `
            <div class="map-popup">
                <div class="map-popup-image"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="1.5"><path d="M12 7.5a4.5 4.5 0 1 1 4.5 4.5M12 7.5A4.5 4.5 0 1 0 7.5 12M12 7.5V9m-4.5 3a4.5 4.5 0 1 0 4.5 4.5M7.5 12H9m7.5 0a4.5 4.5 0 1 1-4.5 4.5m4.5-4.5H15m-3 4.5V15"/><circle cx="12" cy="12" r="3"/></svg></div>
                <div class="map-popup-content">
                    <h3 class="map-popup-title">${mainFlora?.nama || provinceName}</h3>
                    <p class="map-popup-subtitle">${provinceName} • ${speciesCount} spesies</p>
                    <button class="map-popup-btn" onclick="showFloraDetail('${provinceName}')">
                        Lihat Detail
                    </button>
                </div>
            </div>
        `;

        marker.bindPopup(popupContent, {
            maxWidth: 280,
            minWidth: 220,
            closeButton: true,
            className: 'flora-popup'
        });

        markers.push(marker);
    }
}

/**
 * Show flora detail panel
 */
function showFloraDetail(provinceName) {
    const d = floraData[provinceName];

    // Close popup
    map.closePopup();

    // Zoom to province
    const coords = provinceCoordinates[provinceName];
    if (coords && map) {
        map.setView([coords.lat, coords.lng], 7, { animate: true });
    }

    if (!d) {
        document.getElementById('floraHabitatList').innerHTML = `
            <div class="bioguard-habitat-placeholder">
                <div class="bioguard-habitat-placeholder-icon"><svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="1.5"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg></div>
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

    const mainDescription = mainFlora?.budaya ?
        `${mainFlora.nama} adalah ${mainFlora.identitas || 'flora khas'} ${d.name}. ${mainFlora.budaya ? 'Dalam budaya lokal, ' + mainFlora.nama.toLowerCase() + ' digunakan sebagai ' + mainFlora.budaya.toLowerCase() + '.' : ''}` :
        `${mainFlora?.nama || 'Flora ini'} merupakan flora identitas provinsi ${d.name}.`;

    // Render detail panel
    document.getElementById('floraHabitatList').innerHTML = `
        <div class="peta-detail-content-wrapper">
            <div class="peta-detail-header">
                <div class="peta-detail-icon">${SVG_ICONS.leaf(32, '#10b981')}</div>
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
                <h4 class="peta-species-title">${SVG_ICONS.trophy(20)} Flora Identitas</h4>
                <div class="peta-flora-identity-card">
                    <div class="peta-flora-identity-header">
                        <div class="peta-flora-identity-icon">${SVG_ICONS.flower(40)}</div>
                        <div class="peta-flora-identity-info">
                            <h5 class="peta-flora-identity-name">${mainFlora?.nama || '-'}</h5>
                            ${mainFlora?.namaLain ? `<p class="peta-flora-identity-alias">${mainFlora.namaLain}</p>` : ''}
                            <p class="peta-flora-identity-latin"><em>${mainFlora?.latin || '-'}</em></p>
                            <span class="peta-flora-identity-status ${statusClass}">${mainStatus}</span>
                        </div>
                    </div>
                    <div class="peta-flora-identity-desc">
                        <p>${mainDescription}</p>
                    </div>
                    <div class="peta-flora-identity-details">
                        ${mainFlora?.warna ? `<div class="peta-flora-detail-item"><span class="peta-flora-detail-icon">${SVG_ICONS.palette()}</span><span class="peta-flora-detail-label">Warna:</span> ${mainFlora.warna}</div>` : ''}
                        ${mainFlora?.tinggi ? `<div class="peta-flora-detail-item"><span class="peta-flora-detail-icon">${SVG_ICONS.ruler()}</span><span class="peta-flora-detail-label">Tinggi:</span> ${mainFlora.tinggi}</div>` : ''}
                        ${mainFlora?.habitat ? `<div class="peta-flora-detail-item"><span class="peta-flora-detail-icon">${SVG_ICONS.mountain()}</span><span class="peta-flora-detail-label">Habitat:</span> ${mainFlora.habitat}</div>` : ''}
                        ${mainFlora?.manfaat ? `<div class="peta-flora-detail-item"><span class="peta-flora-detail-icon">${SVG_ICONS.sparkles()}</span><span class="peta-flora-detail-label">Manfaat:</span> ${mainFlora.manfaat}</div>` : ''}
                        ${mainFlora?.tips ? `<div class="peta-flora-detail-item peta-flora-tips"><span class="peta-flora-detail-icon">${SVG_ICONS.lightbulb()}</span><span class="peta-flora-detail-label">Tips:</span> ${mainFlora.tips}</div>` : ''}
                    </div>
                </div>
            </div>
        </div>
    `;

    // Render other species
    const otherSpecies = d.species.filter(s => !s.isMain);
    const bottomContainer = document.getElementById('floraLainnyaContainer');

    if (otherSpecies.length > 0) {
        let otherHtml = `
            <div class="peta-species-section bottom-section">
                <h4 class="peta-species-title">${SVG_ICONS.seedling(20)} Flora Lainnya di ${d.name}</h4>
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
                        <p class="peta-flora-latin"><em>${s.latin || '-'}</em></p>
                        <span class="peta-flora-status ${sStatusClass}">${s.status || 'Umum'}</span>
                        ${s.deskripsi ? `<p class="peta-flora-desc">${s.deskripsi}</p>` : ''}
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
        document.getElementById('floraHabitatList').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

/**
 * Reset map view
 */
function resetFloraMapView() {
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
    if (document.getElementById('flora-map')) {
        initFloraMap();
    }
});

// Global functions
window.showFloraDetail = showFloraDetail;
window.resetFloraMapView = resetFloraMapView;
