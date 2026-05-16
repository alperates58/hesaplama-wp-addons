function hcAyBurcuTakvimiHesapla() {
    const month = parseInt(document.getElementById('hc-asc-month').value);
    const year = parseInt(document.getElementById('hc-asc-year').value);

    function getMoonSign(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const n = getJD(d) - 2451545.0;
        let Lm = (218.316 + 13.176396 * n) % 360;
        let Mm = (134.963 + 13.064993 * n) % 360;
        let moonL = (Lm + 6.289 * Math.sin(Mm * Math.PI / 180) + 360) % 360;
        const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
        return signs[Math.floor(moonL / 30)];
    }

    let daysInMonth = new Date(year, month, 0).getDate();
    let html = "";
    
    for (let d = 1; d <= daysInMonth; d++) {
        let date = new Date(year, month - 1, d, 12, 0, 0);
        let sign = getMoonSign(date);
        
        html += `<div class="hc-asc-day">
            <span class="hc-asc-day-num">${d}</span>
            <span class="hc-asc-sign">${sign}</span>
        </div>`;
    }

    document.getElementById('hc-asc-grid').innerHTML = html;
    document.getElementById('hc-moon-sign-calendar-result').classList.add('visible');
}
