function hcMaviAyHesapla() {
    const month = parseInt(document.getElementById('hc-bm-month').value);
    const year = parseInt(document.getElementById('hc-bm-year').value);

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

    let daysInMonth = new Date(year, month, 0).getDate();
    let fullMoons = [];
    let start = new Date(year, month - 1, 1, 0, 0, 0);
    
    for (let h = 0; h < daysInMonth * 24; h += 1) {
        let d1 = new Date(start.getTime() + h * 3600000);
        let d2 = new Date(start.getTime() + (h + 1) * 3600000);
        if (getElongation(d1) < 180 && getElongation(d2) >= 180) {
            fullMoons.push(new Date(d2));
            h += 24; // Skip next day
        }
    }

    const statusEl = document.getElementById('hc-bm-status');
    const infoEl = document.getElementById('hc-bm-info');

    if (fullMoons.length >= 2) {
        const options = { day: 'numeric', month: 'long', year: 'numeric' };
        statusEl.innerHTML = "🌟 Mavi Ay Tespit Edildi!";
        statusEl.className = "hc-bm-status blue";
        infoEl.innerHTML = `
            <p>Bu ay iki kez Dolunay gerçekleşiyor. İkinci Dolunay (Mavi Ay) tarihi: <strong>${fullMoons[1].toLocaleDateString('tr-TR', options)}</strong></p>
            <p class="hc-note">Mavi Ay, nadir gerçekleşen bir olaydır (yaklaşık 2.5 yılda bir). 'Bir kez mavi ayda' deyimi bu nadirlikten gelir.</p>
        `;
    } else {
        statusEl.innerHTML = "Normal Ay Döngüsü";
        statusEl.className = "hc-bm-status normal";
        infoEl.innerHTML = `<p>Bu ayda yalnızca bir Dolunay gerçekleşiyor. Mavi Ay durumu mevcut değil.</p>`;
    }

    document.getElementById('hc-mavi-ay-result').classList.add('visible');
}
