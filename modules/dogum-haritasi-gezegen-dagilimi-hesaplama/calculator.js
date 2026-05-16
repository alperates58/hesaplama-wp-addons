/**
 * Doğum Haritası Gezegen Dağılımı Hesaplama
 */

const HC_Astro_Dist_Engine = {
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
    }
};

function hcGezegenDagilimiHesapla() {
    const dateStr = document.getElementById('hc-gez-date').value;
    if (!dateStr) return;

    const planets = HC_Astro_Dist_Engine.getPlanets(new Date(dateStr));
    let personalScore = 0;
    let socialScore = 0;
    let total = 0;

    Object.keys(planets).forEach(k => {
        const p = planets[k];
        if (p.lon < 180) personalScore += p.weight;
        else socialScore += p.weight;
        total += p.weight;
    });

    const pPct = Math.round((personalScore / total) * 100);
    const sPct = 100 - pPct;

    document.getElementById('hc-dist-chart').innerHTML = `
        <div class="hc-dist-bars">
            <div class="hc-dist-bar personal" style="width: ${pPct}%;">Bireysel (%${pPct})</div>
            <div class="hc-dist-bar social" style="width: ${sPct}%;">Sosyal (%${sPct})</div>
        </div>
    `;

    let desc = "";
    if (pPct > 60) {
        desc = "Gezegenlerinizin çoğu zodyakın ilk yarısında (Koç-Başak) toplanmış. Bu, odağınızın daha çok kişisel gelişim, bireysel ihtiyaçlar ve yakın çevre üzerinde olduğunu gösterir.";
    } else if (sPct > 60) {
        desc = "Gezegenlerinizin çoğu zodyakın ikinci yarısında (Terazi-Balık) toplanmış. Bu, odağınızın daha çok ilişkiler, toplumsal roller ve evrensel temalar üzerinde olduğunu gösterir.";
    } else {
        desc = "Bireysel ve sosyal odaklarınız arasında dengeli bir dağılım var. Hem kendi ihtiyaçlarınıza hem de dış dünyaya eşit önem veriyorsunuz.";
    }

    document.getElementById('hc-dist-desc').innerHTML = `
        <h4>Dağılım Analizi</h4>
        <p>${desc}</p>
    `;

    document.getElementById('hc-gezegen-dagilimi-result').classList.add('visible');
}
