function hcRetroGezegenHesapla() {
    const dateStr = document.getElementById('hc-rp-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getPlanetPos(n) {
        // Sun (for reference in inner planets)
        let Ls = (280.460 + 0.9856474 * n) % 360;
        let gs = (357.528 + 0.9856003 * n) % 360;
        let sunL = Ls + 1.915 * Math.sin(gs * Math.PI / 180);

        return {
            mer: (sunL + ( ( (252.250 + 4.0923344 * n) - sunL + 180) % 360 - 180 ) ) % 360,
            ven: (sunL + ( ( (181.979 + 1.6021302 * n) - sunL + 180) % 360 - 180 ) ) % 360,
            mar: (355.453 + 0.5240248 * n + 10.70 * Math.sin((19.387 + 0.5240208 * n) * Math.PI / 180)) % 360,
            jup: (34.404 + 0.0830853 * n + 5.55 * Math.sin((19.388 + 0.0830853 * n) * Math.PI / 180)) % 360,
            sat: (49.944 + 0.0334597 * n + 6.39 * Math.sin((316.967 + 0.0334442 * n) * Math.PI / 180)) % 360,
            ura: (313.232 + 0.0117258 * n + 0.52 * Math.sin((142.956 + 0.0117258 * n) * Math.PI / 180)) % 360,
            nep: (304.880 + 0.0059735 * n + 0.23 * Math.sin((260.247 + 0.0059735 * n) * Math.PI / 180)) % 360,
            plu: (238.928 + 0.0039755 * n + 0.17 * Math.sin((14.882 + 0.0039755 * n) * Math.PI / 180)) % 360
        };
    }

    const pos1 = getPlanetPos(getJD(date) - 2451545.0);
    const pos2 = getPlanetPos(getJD(dateNext) - 2451545.0);

    const planets = [
        { id: 'mer', name: 'Merkür' },
        { id: 'ven', name: 'Venüs' },
        { id: 'mar', name: 'Mars' },
        { id: 'jup', name: 'Jüpiter' },
        { id: 'sat', name: 'Satürn' },
        { id: 'ura', name: 'Uranüs' },
        { id: 'nep', name: 'Neptün' },
        { id: 'plu', name: 'Plüton' }
    ];

    let html = "";
    planets.forEach(p => {
        let diff = pos2[p.id] - pos1[p.id];
        if (diff < -180) diff += 360;
        if (diff > 180) diff -= 360;
        
        const isRetro = diff < 0;
        html += `<div class="hc-rp-item ${isRetro ? 'retro' : 'direct'}">
            <span class="hc-rp-pname">${p.name}</span>
            <span class="hc-rp-status">${isRetro ? 'Retro (Geri)' : 'İleri (Düz)'}</span>
        </div>`;
    });

    document.getElementById('hc-rp-list').innerHTML = html;
    document.getElementById('hc-retro-planets-result').classList.add('visible');
}
