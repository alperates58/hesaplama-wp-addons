function hcSolarEclipseHesapla() {
    const dateStr = document.getElementById('hc-se-date').value;
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

        let F = (93.272 + 483202.017 * T) % 360;
        let lat = 5.13 * Math.sin(F * Math.PI / 180);

        return { elongation: (moonL - sunL + 360) % 360, lat: lat };
    }

    let current = new Date(dateStr + 'T12:00:00');
    let bestDate = null;
    
    for (let m = 0; m < 24; m++) {
        let foundNewMoon = false;
        for (let i = 0; i < 31; i++) {
            let d1 = getLunarDetails(current);
            current.setHours(current.getHours() + 1);
            let d2 = getLunarDetails(current);
            
            // Check for New Moon wrap around
            if ( (d1.elongation > 350 && d2.elongation < 10) || (d1.elongation < d2.elongation && d1.elongation < 1 && d2.elongation >= 0) ) {
                if (Math.abs(d2.lat) < 1.5) {
                    bestDate = new Date(current);
                    foundNewMoon = true;
                    break;
                }
            }
        }
        if (foundNewMoon) break;
    }

    if (!bestDate) {
        document.getElementById('hc-se-val').innerText = "Yakın tarihte bulunamadı";
        return;
    }

    const options = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
    const dateOutput = bestDate.toLocaleDateString('tr-TR', options);

    document.getElementById('hc-se-val').innerText = dateOutput;
    document.getElementById('hc-se-desc').innerText = `Seçtiğiniz tarihten sonraki ilk Güneş Tutulması ${dateOutput} civarında gerçekleşecektir. Güneş tutulmaları, hayatta yeni ve kadersel kapıların açıldığı, büyük değişimlerin başladığı ve irademizi ortaya koyduğumuz çok güçlü başlangıç zamanlarıdır.`;
    document.getElementById('hc-solar-eclipse-result').classList.add('visible');
}
