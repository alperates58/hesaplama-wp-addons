/**
 * Solar Arc Haritası Hesaplama
 */

const HC_Astro_SA_Engine = {
    getJulianDate: function(date) {
        return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    },
    rev: function(x) { return x - Math.floor(x / 360.0) * 360.0; },
    getSunLon: function(date) {
        const d = this.getJulianDate(date) - 2451545.0;
        return this.rev(280.466 + 0.98564736 * d + 1.915 * Math.sin(this.rev(357.528 + 0.9856003 * d) * Math.PI / 180));
    },
    getPlanets: function(date) {
        const d = this.getJulianDate(date) - 2451545.0;
        return {
            "Ay": this.rev(218.316 + 13.176396 * d + 6.289 * Math.sin(this.rev(134.963 + 13.064993 * d) * Math.PI / 180)),
            "Merkür": this.rev(252.25 + 4.09233 * d),
            "Venüs": this.rev(181.98 + 1.60213 * d),
            "Mars": this.rev(355.45 + 0.52402 * d),
            "Jüpiter": this.rev(34.35 + 0.08308 * d),
            "Satürn": this.rev(50.07 + 0.03344 * d)
        };
    },
    getZodiac: function(lon) {
        const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
        const deg = Math.floor(lon % 30);
        return `${deg}° ${signs[Math.floor(lon / 30)]}`;
    }
};

function hcSolarArcHesapla() {
    const bStr = document.getElementById('hc-sa-birth').value;
    const tYear = parseInt(document.getElementById('hc-sa-year').value);

    if (!bStr || !tYear) return;

    const bDate = new Date(bStr);
    const age = tYear - bDate.getFullYear();
    
    if (age < 0) {
        alert("Hedef yıl doğum yılından büyük olmalıdır.");
        return;
    }

    // Solar Arc: Güneş'in ilerlediği kadar tüm gezegenler ilerler
    const natalSun = HC_Astro_SA_Engine.getSunLon(bDate);
    
    let progDate = new Date(bDate);
    progDate.setDate(bDate.getDate() + age);
    const progSun = HC_Astro_SA_Engine.getSunLon(progDate);

    let arc = progSun - natalSun;
    if (arc < 0) arc += 360;

    document.getElementById('hc-sa-arc-value').innerHTML = `
        <span class="hc-label">Hesaplanan Güneş Yayı:</span>
        <span class="hc-value">${arc.toFixed(2)}°</span>
    `;

    const natalPlanets = HC_Astro_SA_Engine.getPlanets(bDate);
    let html = "<h4>Yöneltilmiş (Directed) Konumlar</h4>";

    Object.keys(natalPlanets).forEach(k => {
        const directedLon = HC_Astro_SA_Engine.rev(natalPlanets[k] + arc);
        html += `
            <div class="hc-sa-item">
                <strong>${k}:</strong> <span>${HC_Astro_SA_Engine.getZodiac(directedLon)}</span>
            </div>
        `;
    });

    document.getElementById('hc-sa-list').innerHTML = html;
    document.getElementById('hc-solar-arc-result').classList.add('visible');
}
