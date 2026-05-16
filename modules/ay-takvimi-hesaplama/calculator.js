function hcAyTakvimiHesapla() {
    const month = parseInt(document.getElementById('hc-ac-month').value);
    const year = parseInt(document.getElementById('hc-ac-year').value);

    function getIllumination(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const n = getJD(d) - 2451545.0;
        let Ls = (280.460 + 0.9856474 * n) % 360;
        let gs = (357.528 + 0.9856003 * n) % 360;
        let sunL = (Ls + 1.915 * Math.sin(gs * Math.PI / 180) + 360) % 360;
        let Lm = (218.316 + 13.176396 * n) % 360;
        let Mm = (134.963 + 13.064993 * n) % 360;
        let moonL = (Lm + 6.289 * Math.sin(Mm * Math.PI / 180) + 360) % 360;
        let elongation = (moonL - sunL + 360) % 360;
        return 50 * (1 - Math.cos(elongation * Math.PI / 180));
    }

    let daysInMonth = new Date(year, month, 0).getDate();
    let html = "";
    
    for (let d = 1; d <= daysInMonth; d++) {
        let date = new Date(year, month - 1, d, 12, 0, 0);
        let illum = getIllumination(date).toFixed(0);
        
        html += `<div class="hc-ac-day">
            <span class="hc-ac-day-num">${d}</span>
            <div class="hc-ac-moon-icon" style="opacity: ${Math.max(0.2, illum/100)}">🌑</div>
            <span class="hc-ac-illum">%${illum}</span>
        </div>`;
    }

    document.getElementById('hc-ac-grid').innerHTML = html;
    document.getElementById('hc-moon-calendar-result').classList.add('visible');
}
