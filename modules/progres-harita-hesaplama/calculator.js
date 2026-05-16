/**
 * Progres Harita Hesaplama
 */

const HC_Astro_Prog_Engine = {
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
    getZodiac: function(lon) {
        const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
        const deg = Math.floor(lon % 30);
        return `${deg}° ${signs[Math.floor(lon / 30)]}`;
    }
};

function hcProgresHaritaHesapla() {
    const bStr = document.getElementById('hc-prog-birth').value;
    const tYear = parseInt(document.getElementById('hc-prog-year').value);

    if (!bStr || !tYear) return;

    const bDate = new Date(bStr);
    const age = tYear - bDate.getFullYear();
    
    if (age < 0) {
        alert("Hedef yıl doğum yılından büyük olmalıdır.");
        return;
    }

    // Secondary Progression: 1 gün = 1 yıl
    let progDate = new Date(bDate);
    progDate.setDate(bDate.getDate() + age);

    const planets = HC_Astro_Prog_Engine.getPlanets(progDate);
    const natalPlanets = HC_Astro_Prog_Engine.getPlanets(bDate);

    document.getElementById('hc-prog-summary').innerHTML = `
        <p><strong>İlerleme Tarihi:</strong> ${progDate.toLocaleDateString('tr-TR')}</p>
        <p>${tYear} yılında (yaklaşık ${age} yaşında) haritanızın ikincil ilerletimi bu konumdadır.</p>
    `;

    let html = "<h4>Progres Gezegen Konumları</h4>";
    Object.keys(planets).forEach(k => {
        const sign = HC_Astro_Prog_Engine.getZodiac(planets[k]);
        const natalSign = HC_Astro_Prog_Engine.getZodiac(natalPlanets[k]);
        const isChanged = Math.floor(planets[k]/30) !== Math.floor(natalPlanets[k]/30);

        html += `
            <div class="hc-prog-item ${isChanged ? 'highlight' : ''}">
                <span class="hc-prog-planet">${k}:</span>
                <span class="hc-prog-pos">${sign}</span>
                ${isChanged ? `<span class="hc-prog-change">(Burç Değişti!)</span>` : ''}
            </div>
        `;
    });

    document.getElementById('hc-prog-planets').innerHTML = html;
    document.getElementById('hc-progres-harita-result').classList.add('visible');
}
