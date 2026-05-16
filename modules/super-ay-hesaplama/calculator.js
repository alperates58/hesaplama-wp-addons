function hcSuperAyHesapla() {
    const dateStr = document.getElementById('hc-sm-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    function getLunarDetails(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const jd = getJD(d);
        const n = jd - 2451545.0;
        let Ls = (280.460 + 0.9856474 * n) % 360;
        let gs = (357.528 + 0.9856003 * n) % 360;
        let sunL = (Ls + 1.915 * Math.sin(gs * Math.PI / 180) + 360) % 360;
        let Lm = (218.316 + 13.176396 * n) % 360;
        let Mm = (134.963 + 13.064993 * n) % 360;
        let moonL = (Lm + 6.289 * Math.sin(Mm * Math.PI / 180) + 360) % 360;
        
        // Approx distance in km
        let dist = 384400 - 20905 * Math.cos(Mm * Math.PI / 180);
        
        return { elongation: (moonL - sunL + 360) % 360, dist: dist };
    }

    let current = new Date(dateStr + 'T12:00:00');
    let smDate = null;
    let smDist = 0;
    
    // Search up to 1 year
    for (let h = 0; h < 365 * 24; h += 2) {
        let d1 = new Date(current.getTime() + h * 3600000);
        let d2 = new Date(current.getTime() + (h + 2) * 3600000);
        let det1 = getLunarDetails(d1);
        let det2 = getLunarDetails(d2);
        
        if (det1.elongation < 180 && det2.elongation >= 180) {
            // Full Moon found. Check if it's a Supermoon (dist < 361,000 km)
            if (det2.dist < 361885) {
                smDate = new Date(d2);
                smDist = det2.dist;
                break;
            }
        }
    }

    if (!smDate) {
        document.getElementById('hc-sm-status').innerText = "Yakın tarihte bulunamadı";
        return;
    }

    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    document.getElementById('hc-sm-status').innerHTML = "Sıradaki Süper Ay Bulundu!";
    document.getElementById('hc-sm-info').innerHTML = `
        <p><strong>Tarih:</strong> ${smDate.toLocaleDateString('tr-TR', options)}</p>
        <p><strong>Uzaklık:</strong> ${smDist.toLocaleString('tr-TR', {maximumFractionDigits:0})} km</p>
        <p class="hc-note">Süper Ay, Ay'ın Yerberi (Perigee) noktasına en yakın olduğu Dolunay evresidir. Bu dönemde Ay normalden %14 daha büyük ve %30 daha parlak görünür.</p>
    `;

    document.getElementById('hc-super-ay-result').classList.add('visible');
}
