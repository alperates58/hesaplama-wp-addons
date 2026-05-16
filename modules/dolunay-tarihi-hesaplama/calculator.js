function hcFullMoonDateHesapla() {
    const dateStr = document.getElementById('hc-fm-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    let current = new Date(dateStr + 'T12:00:00');
    
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

    let foundDate = null;
    let prevElong = getElongation(current);
    
    // Search up to 31 days
    for (let i = 1; i <= 31; i++) {
        current.setDate(current.getDate() + 1);
        let currElong = getElongation(current);
        
        // If we cross 180 (Full Moon)
        if (prevElong < 180 && currElong >= 180) {
            foundDate = new Date(current);
            break;
        }
        // Handle wrap around 360/0 if starting just before Full Moon
        if (prevElong > 300 && currElong < 180 && currElong > 100) {
             // this logic is a bit flawed for 180, let's simplify
        }
        
        prevElong = currElong;
    }

    // A more robust way: find minimum distance to 180
    current = new Date(dateStr + 'T12:00:00');
    let minDiff = 360;
    let bestDate = null;
    for (let i = 0; i <= 31; i++) {
        let e = getElongation(current);
        let diff = Math.abs(e - 180);
        if (diff < minDiff) {
            minDiff = diff;
            bestDate = new Date(current);
        }
        current.setDate(current.getDate() + 1);
    }

    const options = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
    const dateOutput = bestDate.toLocaleDateString('tr-TR', options);

    document.getElementById('hc-fm-val').innerText = dateOutput;
    document.getElementById('hc-fm-desc').innerText = `Seçtiğiniz tarihten sonraki en yakın Dolunay ${dateOutput} günü gerçekleşecektir. Dolunay zamanları, duyguların zirve yaptığı, netleşmelerin ve tamamlanmaların yaşandığı güçlü enerji dönemleridir.`;
    document.getElementById('hc-full-moon-result').classList.add('visible');
}
