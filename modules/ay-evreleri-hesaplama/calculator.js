function hcAyEvreleriHesapla() {
    const month = parseInt(document.getElementById('hc-ap-month').value);
    const year = parseInt(document.getElementById('hc-ap-year').value);

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
    let phases = [];
    
    // Check every hour to be more precise
    let start = new Date(year, month - 1, 1, 0, 0, 0);
    let prevE = getElongation(start);
    
    for (let h = 1; h <= daysInMonth * 24; h++) {
        let curr = new Date(start.getTime() + h * 3600000);
        let currE = getElongation(curr);
        
        let type = "";
        if (prevE > 350 && currE < 10 && currE < prevE) type = "Yeni Ay";
        else if (prevE < 90 && currE >= 90) type = "İlk Dördün";
        else if (prevE < 180 && currE >= 180) type = "Dolunay";
        else if (prevE < 270 && currE >= 270) type = "Son Dördün";

        if (type) {
            phases.push({ date: new Date(curr), type: type });
            prevE = currE;
            h += 24; // Skip next 24h to avoid duplicates
        } else {
            prevE = currE;
        }
    }

    const options = { day: 'numeric', month: 'long', weekday: 'short' };
    let html = "";
    phases.forEach(p => {
        html += `<div class="hc-ap-item">
            <span class="hc-ap-date">${p.date.toLocaleDateString('tr-TR', options)}</span>
            <span class="hc-ap-type">${p.type}</span>
        </div>`;
    });

    document.getElementById('hc-ap-list').innerHTML = html || "<p>Bu ay için evre bulunamadı.</p>";
    document.getElementById('hc-moon-phases-result').classList.add('visible');
}
