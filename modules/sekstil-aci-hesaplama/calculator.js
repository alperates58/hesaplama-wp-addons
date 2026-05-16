/**
 * Sekstil Açı Hesaplama
 */

const HC_Astro_Sextile_Engine = {
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

function hcSekstilAcisiHesapla() {
    const dateStr = document.getElementById('hc-sekstil-date').value;
    if (!dateStr) return;

    const planets = HC_Astro_Sextile_Engine.getPlanets(new Date(dateStr));
    const keys = Object.keys(planets);
    let results = [];

    for (let i = 0; i < keys.length; i++) {
        for (let j = i + 1; j < keys.length; j++) {
            let diff = Math.abs(planets[keys[i]] - planets[keys[j]]);
            if (diff > 180) diff = 360 - diff;

            if (Math.abs(diff - 60) < 6) {
                results.push({ p1: keys[i], p2: keys[j], orb: Math.abs(diff - 60).toFixed(1) });
            }
        }
    }

    const meanings = {
        "Güneş-Mars": "Yüksek enerji, girişimcilik ve cesaret.",
        "Venüs-Neptün": "Sanatsal duyarlılık, romantizm ve ilham.",
        "Merkür-Venüs": "Diplomatik konuşma, nezaket ve estetik zevk.",
        "Ay-Jüpiter": "Duygusal cömertlik, iyimserlik ve korunma."
    };

    let html = results.length > 0 ? "<h4>Bulunan Sekstil Açılar:</h4>" : "<h4>Haritanızda belirgin bir sekstil açı bulunamadı.</h4>";
    results.forEach(r => {
        const key = `${r.p1}-${r.p2}`;
        const keyAlt = `${r.p2}-${r.p1}`;
        html += `
            <div class="hc-aspect-item sextile">
                <strong>${r.p1} Sekstil ${r.p2}</strong> (Orb: ${r.orb}°)
                <p>${meanings[key] || meanings[keyAlt] || "Bu destekleyici açı, hayatınızda yeni yetenekler geliştirmenize ve fırsatları değerlendirmenize yardımcı olur."}</p>
            </div>
        `;
    });

    document.getElementById('hc-sekstil-list').innerHTML = html;
    document.getElementById('hc-sekstil-aci-result').classList.add('visible');
}
