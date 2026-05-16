/**
 * Doğum Haritası Nitelik Dağılımı Hesaplama
 */

const HC_Astro_Nit_Engine = {
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
    getModality: function(lon) {
        const idx = Math.floor(lon / 30);
        const mods = ["Cardinal", "Fixed", "Mutable", "Cardinal", "Fixed", "Mutable", "Cardinal", "Fixed", "Mutable", "Cardinal", "Fixed", "Mutable"];
        return mods[idx];
    }
};

function hcNitelikDagilimiHesapla() {
    const dateStr = document.getElementById('hc-nit-date').value;
    if (!dateStr) return;

    const planets = HC_Astro_Nit_Engine.getPlanets(new Date(dateStr));
    let scores = { Cardinal: 0, Fixed: 0, Mutable: 0 };
    let totalWeight = 0;

    Object.keys(planets).forEach(k => {
        const p = planets[k];
        const mod = HC_Astro_Nit_Engine.getModality(p.lon);
        scores[mod] += p.weight;
        totalWeight += p.weight;
    });

    const labels = { Cardinal: "Öncü", Fixed: "Sabit", Mutable: "Değişken" };
    const colors = { Cardinal: "#ff4757", Fixed: "#70a1ff", Mutable: "#2ed573" };

    let html = "";
    Object.keys(scores).forEach(mod => {
        const pct = Math.round((scores[mod] / totalWeight) * 100);
        html += `
            <div class="hc-nit-row">
                <div class="hc-nit-label">${labels[mod]} (%${pct})</div>
                <div class="hc-nit-bar-bg">
                    <div class="hc-nit-bar-fill" style="width: ${pct}%; background: ${colors[mod]};"></div>
                </div>
            </div>
        `;
    });

    document.getElementById('hc-nit-bars').innerHTML = html;

    const dominant = Object.keys(scores).reduce((a, b) => scores[a] > scores[b] ? a : b);
    const interpretations = {
        Cardinal: "Öncü niteliğiniz baskın. Başlatma enerjiniz yüksek, lider ruhlu ve eyleme geçmeye hazırsınız.",
        Fixed: "Sabit niteliğiniz baskın. Kararlı, dayanıklı, odaklı ve başladığı işi bitiren bir yapıdasınız.",
        Mutable: "Değişken niteliğiniz baskın. Esnek, uyumlu, çok yönlü ve değişimlere kolayca ayak uydurabilen birisiniz."
    };

    document.getElementById('hc-nit-desc').innerHTML = `
        <h4>Baskın Nitelik: ${labels[dominant]}</h4>
        <p>${interpretations[dominant]}</p>
    `;

    document.getElementById('hc-nitelik-dagilimi-result').classList.add('visible');
}
