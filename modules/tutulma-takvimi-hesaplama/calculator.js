function hcTutulmaTakvimiHesapla() {
    const year = parseInt(document.getElementById('hc-ec-year').value);
    if (!year) return;

    function getLunarDetails(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const jd = getJD(d);
        const n = jd - 2451545.0;
        const T = n / 36525;
        let Ls = (280.460 + 0.9856474 * n) % 360;
        let gs = (357.528 + 0.9856003 * n) % 360;
        let sunL = (Ls + 1.915 * Math.sin(gs * Math.PI / 180) + 360) % 360;
        let Lm = (218.316 + 13.176396 * n) % 360;
        let Mm = (134.963 + 13.064993 * n) % 360;
        let moonL = (Lm + 6.289 * Math.sin(Mm * Math.PI / 180) + 360) % 360;
        let F = (93.272 + 483202.017 * T) % 360;
        let lat = 5.13 * Math.sin(F * Math.PI / 180);
        return { elongation: (moonL - sunL + 360) % 360, lat: lat };
    }

    let start = new Date(year, 0, 1, 0, 0, 0);
    let eclipses = [];
    
    // Check every 6 hours for 365 days
    for (let h = 0; h < 365 * 24; h += 6) {
        let d1 = new Date(start.getTime() + h * 3600000);
        let d2 = new Date(start.getTime() + (h + 6) * 3600000);
        let det1 = getLunarDetails(d1);
        let det2 = getLunarDetails(d2);
        
        // Solar Eclipse (New Moon)
        if ( (det1.elongation > 350 && det2.elongation < 10 && det2.elongation < det1.elongation) ) {
            if (Math.abs(det2.lat) < 1.5) {
                eclipses.push({ date: new Date(d2), type: "Güneş Tutulması" });
            }
        }
        // Lunar Eclipse (Full Moon)
        if (det1.elongation < 180 && det2.elongation >= 180) {
            if (Math.abs(det2.lat) < 1.5) {
                eclipses.push({ date: new Date(d2), type: "Ay Tutulması" });
            }
        }
    }

    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    let html = "";
    eclipses.forEach(e => {
        html += `<div class="hc-ec-item">
            <span class="hc-ec-date">${e.date.toLocaleDateString('tr-TR', options)}</span>
            <span class="hc-ec-type ${e.type === 'Ay Tutulması' ? 'lunar' : 'solar'}">${e.type}</span>
        </div>`;
    });

    document.getElementById('hc-ec-list').innerHTML = html || "<p>Bu yıl için tutulma bulunamadı.</p>";
    document.getElementById('hc-tutulma-takvimi-result').classList.add('visible');
}
