function hcLunarEclipseHesapla() {
    const dateStr = document.getElementById('hc-le-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

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

        // Argument of Latitude F
        let F = (93.272 + 483202.017 * T) % 360;
        let lat = 5.13 * Math.sin(F * Math.PI / 180);

        return { elongation: (moonL - sunL + 360) % 360, lat: lat };
    }

    let current = new Date(dateStr + 'T12:00:00');
    let bestDate = null;
    
    // Search up to 2 years (24 months)
    for (let m = 0; m < 24; m++) {
        // Find next Full Moon approx
        let foundFullMoon = false;
        for (let i = 0; i < 31; i++) {
            let d1 = getLunarDetails(current);
            current.setHours(current.getHours() + 1);
            let d2 = getLunarDetails(current);
            
            if (d1.elongation < 180 && d2.elongation >= 180) {
                // Check if latitude is small enough for eclipse (~1.5 deg for penumbral, ~0.9 for partial/total)
                if (Math.abs(d2.lat) < 1.5) {
                    bestDate = new Date(current);
                    foundFullMoon = true;
                    break;
                }
            }
        }
        if (foundFullMoon) break;
        // If not found this month, continue
    }

    if (!bestDate) {
        document.getElementById('hc-le-val').innerText = "Yakın tarihte bulunamadı";
        return;
    }

    const options = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
    const dateOutput = bestDate.toLocaleDateString('tr-TR', options);

    document.getElementById('hc-le-val').innerText = dateOutput;
    document.getElementById('hc-le-desc').innerText = `Seçtiğiniz tarihten sonraki ilk Ay Tutulması ${dateOutput} civarında gerçekleşecektir. Ay tutulmaları, duygusal bitişler, kadersel tamamlanmalar ve büyük farkındalıklar getiren güçlü enerji kapılarıdır.`;
    document.getElementById('hc-lunar-eclipse-result').classList.add('visible');
}
