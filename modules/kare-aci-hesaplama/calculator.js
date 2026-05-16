/**
 * Kare Açı Hesaplama
 */

const HC_Astro_Square_Engine = {
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

function hcKareAcisiHesapla() {
    const dateStr = document.getElementById('hc-kare-date').value;
    if (!dateStr) return;

    const planets = HC_Astro_Square_Engine.getPlanets(new Date(dateStr));
    const keys = Object.keys(planets);
    let results = [];

    for (let i = 0; i < keys.length; i++) {
        for (let j = i + 1; j < keys.length; j++) {
            let diff = Math.abs(planets[keys[i]] - planets[keys[j]]);
            if (diff > 180) diff = 360 - diff;

            if (Math.abs(diff - 90) < 8) {
                results.push({ p1: keys[i], p2: keys[j], orb: Math.abs(diff - 90).toFixed(1) });
            }
        }
    }

    const meanings = {
        "Güneş-Ay": "İç dünyanız ve dış benliğiniz arasında çatışma. Karar vermekte zorlanma.",
        "Mars-Satürn": "Engellenmiş enerji, sabır ve disiplin sınavları.",
        "Venüs-Satürn": "İlişkilerde ciddiyet, soğukluk veya mesafe hissi.",
        "Merkür-Jüpiter": "Düşüncelerde aşırılık, büyük konuşma veya dikkatsizlik."
    };

    let html = results.length > 0 ? "<h4>Bulunan Kare Açılar:</h4>" : "<h4>Haritanızda belirgin bir kare açı bulunamadı.</h4>";
    results.forEach(r => {
        const key = `${r.p1}-${r.p2}`;
        const keyAlt = `${r.p2}-${r.p1}`;
        html += `
            <div class="hc-aspect-item square">
                <strong>${r.p1} Kare ${r.p2}</strong> (Orb: ${r.orb}°)
                <p>${meanings[key] || meanings[keyAlt] || "Bu dinamik gerilim hayatınızda önemli bir gelişim ve mücadele alanı yaratıyor."}</p>
            </div>
        `;
    });

    document.getElementById('hc-kare-list').innerHTML = html;
    document.getElementById('hc-kare-aci-result').classList.add('visible');
}
