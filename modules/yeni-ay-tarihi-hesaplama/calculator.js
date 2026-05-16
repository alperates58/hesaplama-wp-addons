function hcNewMoonDateHesapla() {
    const dateStr = document.getElementById('hc-nm-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    function getElongation(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const n = getJD(d) - 2451545.0;
        let Ls = (280.460 + 0.9856474 * n) % 360;
        let gs = (357.528 + 0.9856003 * n) % 360;
        let sunL = (Ls + 1.915 * Math.sin(gs * Math.PI / 180) + 360) % 360;
        let Lm = (218.316 + 13.176396 * n) % 360;
        let Mm = (134.963 + 13.064993 * n) % 360;
        let moonL = (Lm + 6.289 * Math.sin(Mm * Math.PI / 180) + 360) % 360;
        return (moonL - sunL + 360) % 360;
    }

    let current = new Date(dateStr + 'T12:00:00');
    let minDiff = 360;
    let bestDate = null;
    
    for (let i = 0; i <= 31; i++) {
        let e = getElongation(current);
        // Distance to 0 or 360
        let diff = Math.min(e, 360 - e);
        if (diff < minDiff) {
            minDiff = diff;
            bestDate = new Date(current);
        }
        current.setDate(current.getDate() + 1);
    }

    const options = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
    const dateOutput = bestDate.toLocaleDateString('tr-TR', options);

    document.getElementById('hc-nm-val').innerText = dateOutput;
    document.getElementById('hc-nm-desc').innerText = `Seçtiğiniz tarihten sonraki en yakın Yeni Ay ${dateOutput} günü gerçekleşecektir. Yeni Ay zamanları, yeni niyetler belirlemek, tohum ekmek ve hayata taze bir başlangıç yapmak için en verimli dönemlerdir.`;
    document.getElementById('hc-new-moon-result').classList.add('visible');
}
