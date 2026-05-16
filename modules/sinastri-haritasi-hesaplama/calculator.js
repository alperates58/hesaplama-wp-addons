/**
 * Sinastri Haritası Hesaplama
 */

const HC_Astro_SH_Engine = {
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
    getAspectSymbol: function(lon1, lon2) {
        let diff = Math.abs(lon1 - lon2);
        if (diff > 180) diff = 360 - diff;
        if (diff < 8) return "☌"; // Kavuşum
        if (Math.abs(diff - 60) < 6) return "✶"; // Sekstil
        if (Math.abs(diff - 90) < 8) return "☐"; // Kare
        if (Math.abs(diff - 120) < 8) return "△"; // Üçgen
        if (Math.abs(diff - 180) < 8) return "☍"; // Karşıt
        return "-";
    }
};

function hcSinastriHaritasiHesapla() {
    const d1 = document.getElementById('hc-sh-d1').value;
    const d2 = document.getElementById('hc-sh-d2').value;

    if (!d1 || !d2) return;

    const p1 = HC_Astro_SH_Engine.getPlanets(new Date(d1));
    const p2 = HC_Astro_SH_Engine.getPlanets(new Date(d2));

    const keys = Object.keys(p1);
    let html = "<thead><tr><th></th>";
    keys.forEach(k => html += `<th>${k} (2)</th>`);
    html += "</tr></thead><tbody>";

    keys.forEach(k1 => {
        html += `<tr><td><strong>${k1} (1)</strong></td>`;
        keys.forEach(k2 => {
            const sym = HC_Astro_SH_Engine.getAspectSymbol(p1[k1], p2[k2]);
            let cls = "";
            if (sym === "☌" || sym === "△" || sym === "✶") cls = "hc-asp-good";
            if (sym === "☐" || sym === "☍") cls = "hc-asp-hard";
            html += `<td class="${cls}">${sym}</td>`;
        });
        html += "</tr>";
    });
    html += "</tbody>";

    document.getElementById('hc-aspect-matrix').innerHTML = html;
    document.getElementById('hc-sinastri-haritasi-result').classList.add('visible');
}
