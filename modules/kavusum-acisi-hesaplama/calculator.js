/**
 * Kavuşum Açısı Hesaplama
 */

const HC_Astro_Aspect_Base = {
    getJulianDate: function(date) {
        return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    },
    rev: function(x) { return x - Math.floor(x / 360.0) * 360.0; },
    getPlanets: function(date) {
        const d = this.getJulianDate(date) - 2451545.0;
        return {
            "Güneş": this.rev(280.466 + 0.98564736 * d + 1.915 * Math.sin(this.rev(357.528 + 0.9856003 * d) * Math.PI / 180)),
            "Ay": this.rev(218.316 + 13.176396 * d + 6.289 * Math.sin(this.rev(134.963 + 13.064993 * d) * Math.PI / 180)),
            "Merkür": this.rev(252.25 + 4.09233 * d),
            "Venüs": this.rev(181.98 + 1.60213 * d),
            "Mars": this.rev(355.45 + 0.52402 * d),
            "Jüpiter": this.rev(34.35 + 0.08308 * d),
            "Satürn": this.rev(50.07 + 0.03344 * d)
        };
    }
};

function hcKavusumAcisiHesapla() {
    const dateStr = document.getElementById('hc-kav-date').value;
    if (!dateStr) return;

    const planets = HC_Astro_Aspect_Base.getPlanets(new Date(dateStr));
    const keys = Object.keys(planets);
    let results = [];

    for (let i = 0; i < keys.length; i++) {
        for (let j = i + 1; j < keys.length; j++) {
            let diff = Math.abs(planets[keys[i]] - planets[keys[j]]);
            if (diff > 180) diff = 360 - diff;

            if (diff < 8) {
                results.push({ p1: keys[i], p2: keys[j], orb: diff.toFixed(1) });
            }
        }
    }

    const meanings = {
        "Güneş-Ay": "Ruh ve benlik uyumu. Güçlü bir odak noktası.",
        "Güneş-Merkür": "Zihinsel yetenek ve kendini ifade gücü.",
        "Venüs-Mars": "Yüksek tutku ve cazibe enerjisi.",
        "Jüpiter-Güneş": "Büyük şans ve iyimserlik potansiyeli.",
        "Satürn-Güneş": "Ciddiyet, sorumluluk ve dayanıklılık."
    };

    let html = results.length > 0 ? "<h4>Bulunan Kavuşumlar:</h4>" : "<h4>Haritanızda belirgin bir kavuşum açısı bulunamadı.</h4>";
    results.forEach(r => {
        const key = `${r.p1}-${r.p2}`;
        html += `
            <div class="hc-aspect-item">
                <strong>${r.p1} Kavuşum ${r.p2}</strong> (Orb: ${r.orb}°)
                <p>${meanings[key] || "Bu iki enerjinin birleşimi haritanızda çok güçlü bir vurgu yaratıyor."}</p>
            </div>
        `;
    });

    document.getElementById('hc-kav-list').innerHTML = html;
    document.getElementById('hc-kavusum-acisi-result').classList.add('visible');
}
