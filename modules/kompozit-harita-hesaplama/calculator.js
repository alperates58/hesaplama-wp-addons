/**
 * Kompozit Harita Hesaplama
 */

const HC_Astro_Comp_Engine = {
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
    },
    getMidpoint: function(l1, l2) {
        let diff = Math.abs(l1 - l2);
        let mid = (l1 + l2) / 2;
        if (diff > 180) mid = this.rev(mid + 180);
        return mid;
    },
    getZodiac: function(lon) {
        const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
        const deg = Math.floor(lon % 30);
        return `${deg}° ${signs[Math.floor(lon / 30)]}`;
    }
};

function hcKompozitHaritaHesapla() {
    const d1 = document.getElementById('hc-comp-d1').value;
    const d2 = document.getElementById('hc-comp-d2').value;

    if (!d1 || !d2) return;

    const p1 = HC_Astro_Comp_Engine.getPlanets(new Date(d1));
    const p2 = HC_Astro_Comp_Engine.getPlanets(new Date(d2));

    let html = "<h4>Kompozit Gezegen Yerleşimleri</h4>";
    Object.keys(p1).forEach(k => {
        const mid = HC_Astro_Comp_Engine.getMidpoint(p1[k], p2[k]);
        html += `
            <div class="hc-comp-item">
                <strong>${k}</strong>: <span>${HC_Astro_Comp_Engine.getZodiac(mid)}</span>
            </div>
        `;
    });

    document.getElementById('hc-comp-list').innerHTML = html;
    document.getElementById('hc-kompozit-harita-result').classList.add('visible');
}
