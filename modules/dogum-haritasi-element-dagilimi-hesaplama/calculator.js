/**
 * Doğum Haritası Element Dağılımı Hesaplama
 */

const HC_Astro_Elem_Engine = {
    getJulianDate: function(date) {
        return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    },
    rev: function(x) { return x - Math.floor(x / 360.0) * 360.0; },
    getPlanets: function(date) {
        const d = this.getJulianDate(date) - 2451545.0;
        return {
            "Güneş": { lon: this.rev(280.466 + 0.98564736 * d + 1.915 * Math.sin(this.rev(357.528 + 0.9856003 * d) * Math.PI / 180)), weight: 3 },
            "Ay": { lon: this.rev(218.316 + 13.176396 * d + 6.289 * Math.sin(this.rev(134.963 + 13.064993 * d) * Math.PI / 180)), weight: 3 },
            "Merkür": { lon: this.rev(252.25 + 4.09233 * d), weight: 1 },
            "Venüs": { lon: this.rev(181.98 + 1.60213 * d), weight: 1 },
            "Mars": { lon: this.rev(355.45 + 0.52402 * d), weight: 1 },
            "Jüpiter": { lon: this.rev(34.35 + 0.08308 * d), weight: 1 },
            "Satürn": { lon: this.rev(50.07 + 0.03344 * d), weight: 1 }
        };
    },
    getElement: function(lon) {
        const idx = Math.floor(lon / 30);
        const elements = ["Fire", "Earth", "Air", "Water", "Fire", "Earth", "Air", "Water", "Fire", "Earth", "Air", "Water"];
        return elements[idx];
    }
};

function hcElementDagilimiHesapla() {
    const dateStr = document.getElementById('hc-elem-date').value;
    if (!dateStr) return;

    const planets = HC_Astro_Elem_Engine.getPlanets(new Date(dateStr));
    let scores = { Fire: 0, Earth: 0, Air: 0, Water: 0 };
    let totalWeight = 0;

    Object.keys(planets).forEach(k => {
        const p = planets[k];
        const elem = HC_Astro_Elem_Engine.getElement(p.lon);
        scores[elem] += p.weight;
        totalWeight += p.weight;
    });

    const labels = { Fire: "Ateş", Earth: "Toprak", Air: "Hava", Water: "Su" };
    const colors = { Fire: "#ff4757", Earth: "#ffa502", Air: "#70a1ff", Water: "#2ed573" };

    let html = "";
    Object.keys(scores).forEach(elem => {
        const pct = Math.round((scores[elem] / totalWeight) * 100);
        html += `
            <div class="hc-elem-row">
                <div class="hc-elem-label">${labels[elem]} (%${pct})</div>
                <div class="hc-elem-bar-bg">
                    <div class="hc-elem-bar-fill" style="width: ${pct}%; background: ${colors[elem]};"></div>
                </div>
            </div>
        `;
    });

    document.getElementById('hc-element-bars').innerHTML = html;

    const dominant = Object.keys(scores).reduce((a, b) => scores[a] > scores[b] ? a : b);
    const interpretations = {
        Fire: "Ateş elementiniz baskın. Enerjik, insiyatif alan ve tutkulu bir yapıya sahipsiniz.",
        Earth: "Toprak elementiniz baskın. Pratik, güvenilir ve ayakları yere sağlam basan birisiniz.",
        Air: "Hava elementiniz baskın. İletişimci, entelektüel ve sosyal yönünüz kuvvetli.",
        Water: "Su elementiniz baskın. Sezgisel, empatik ve duygusal derinliği olan bir yapıdasınız."
    };

    document.getElementById('hc-element-desc').innerHTML = `
        <h4>Baskın Element: ${labels[dominant]}</h4>
        <p>${interpretations[dominant]}</p>
    `;

    document.getElementById('hc-element-dagilimi-result').classList.add('visible');
}
