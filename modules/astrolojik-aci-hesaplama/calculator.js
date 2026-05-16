/**
 * Astrolojik Açı Hesaplama
 */

const HC_Astro_Engine = {
    getJulianDate: function(date) {
        return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    },

    rev: function(x) { return x - Math.floor(x / 360.0) * 360.0; },

    getPlanetLon: function(date, planet) {
        const d = this.getJulianDate(date) - 2451545.0;
        
        switch(planet) {
            case 'Sun':
                return this.rev(280.466 + 0.98564736 * d + 1.915 * Math.sin(this.rev(357.528 + 0.9856003 * d) * Math.PI / 180));
            case 'Moon':
                return this.rev(218.316 + 13.176396 * d + 6.289 * Math.sin(this.rev(134.963 + 13.064993 * d) * Math.PI / 180));
            case 'Mercury': return this.rev(252.25 + 4.09233 * d);
            case 'Venus': return this.rev(181.98 + 1.60213 * d);
            case 'Mars': return this.rev(355.45 + 0.52402 * d);
            case 'Jupiter': return this.rev(34.35 + 0.08308 * d);
            case 'Saturn': return this.rev(50.07 + 0.03344 * d);
            default: return 0;
        }
    }
};

function hcAstrolojikAciHesapla() {
    const p1 = document.getElementById('hc-asp-p1').value;
    const p2 = document.getElementById('hc-asp-p2').value;
    const dateStr = document.getElementById('hc-asp-date').value;

    if (!dateStr) {
        alert("Lütfen bir tarih seçin.");
        return;
    }

    const date = new Date(dateStr);
    const lon1 = HC_Astro_Engine.getPlanetLon(date, p1);
    const lon2 = HC_Astro_Engine.getPlanetLon(date, p2);

    let diff = Math.abs(lon1 - lon2);
    if (diff > 180) diff = 360 - diff;

    document.getElementById('hc-asp-value').innerText = diff.toFixed(1) + "°";

    let name = "Minör Açı";
    let meaning = "Özel bir major açı grubu içerisinde değil.";

    const aspects = [
        { angle: 0, orb: 8, name: "Kavuşum (0°)", desc: "Güçlü bir birliktelik, enerjilerin kaynaşması." },
        { angle: 60, orb: 6, name: "Sekstil (60°)", desc: "Destekleyici ve fırsat sunan bir etkileşim." },
        { angle: 90, orb: 8, name: "Kare (90°)", desc: "Zorlayıcı, aksiyon gerektiren dinamik bir gerilim." },
        { angle: 120, orb: 8, name: "Üçgen (120°)", desc: "Doğal akış, şans ve kolaylık getiren uyum." },
        { angle: 180, orb: 8, name: "Karşıt (180°)", desc: "Farkındalık, denge ve projeksiyon gerektiren zıtlık." }
    ];

    for (const asp of aspects) {
        if (Math.abs(diff - asp.angle) < asp.orb) {
            name = asp.name;
            meaning = asp.desc;
            break;
        }
    }

    document.getElementById('hc-asp-info').innerHTML = `
        <div class="hc-asp-name">${name}</div>
        <div class="hc-asp-desc">${meaning}</div>
    `;

    document.getElementById('hc-astrolojik-aci-result').classList.add('visible');
}
