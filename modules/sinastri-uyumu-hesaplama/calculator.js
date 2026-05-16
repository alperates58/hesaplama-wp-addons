/**
 * Sinastri Uyumu Hesaplama
 */

const HC_Astro_Core = {
    getJulianDate: function(date) {
        return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    },

    rev: function(x) { return x - Math.floor(x / 360.0) * 360.0; },

    getPlanets: function(date) {
        const d = this.getJulianDate(date) - 2451545.0;
        
        const planets = {};

        // Sun
        let sun_L = this.rev(280.466 + 0.98564736 * d);
        let sun_g = this.rev(357.528 + 0.9856003 * d);
        planets.Sun = this.rev(sun_L + 1.915 * Math.sin(sun_g * Math.PI / 180));

        // Moon
        let moon_L = this.rev(218.316 + 13.176396 * d);
        let moon_M = this.rev(134.963 + 13.064993 * d);
        planets.Moon = this.rev(moon_L + 6.289 * Math.sin(moon_M * Math.PI / 180));

        // Mercury (Mean)
        planets.Mercury = this.rev(252.25 + 4.09233 * d);
        
        // Venus (Mean)
        planets.Venus = this.rev(181.98 + 1.60213 * d);

        // Mars (Mean)
        planets.Mars = this.rev(355.45 + 0.52402 * d);

        // Jupiter (Mean)
        planets.Jupiter = this.rev(34.35 + 0.08308 * d);

        // Saturn (Mean)
        planets.Saturn = this.rev(50.07 + 0.03344 * d);

        return planets;
    },

    getAspect: function(lon1, lon2) {
        let diff = Math.abs(lon1 - lon2);
        if (diff > 180) diff = 360 - diff;

        if (diff < 8) return { name: "Kavuşum", score: 10, type: "harmony" };
        if (Math.abs(diff - 60) < 6) return { name: "Sekstil", score: 8, type: "harmony" };
        if (Math.abs(diff - 90) < 8) return { name: "Kare", score: -5, type: "tension" };
        if (Math.abs(diff - 120) < 8) return { name: "Üçgen", score: 10, type: "harmony" };
        if (Math.abs(diff - 180) < 8) return { name: "Karşıt", score: -2, type: "tension" };
        
        return null;
    }
};

function hcSinastriUyumuHesapla() {
    const d1Str = document.getElementById('hc-s1-birthdate').value;
    const d2Str = document.getElementById('hc-s2-birthdate').value;

    if (!d1Str || !d2Str) {
        alert("Lütfen tüm alanları doldurun.");
        return;
    }

    const p1 = HC_Astro_Core.getPlanets(new Date(d1Str));
    const p2 = HC_Astro_Core.getPlanets(new Date(d2Str));

    let totalScore = 50; // Başlangıç baz puanı
    let aspectsHtml = "<h4>Önemli Sinastri Açıları</h4>";
    
    const planetLabels = {
        Sun: "Güneş", Moon: "Ay", Mercury: "Merkür", Venus: "Venüs", 
        Mars: "Mars", Jupiter: "Jüpiter", Saturn: "Satürn"
    };

    const pairs = [
        ['Sun', 'Sun'], ['Sun', 'Moon'], ['Moon', 'Moon'],
        ['Venus', 'Mars'], ['Venus', 'Venus'], ['Mars', 'Mars'],
        ['Sun', 'Saturn'], ['Moon', 'Saturn'], ['Jupiter', 'Sun']
    ];

    pairs.forEach(pair => {
        const asp = HC_Astro_Core.getAspect(p1[pair[0]], p2[pair[1]]);
        if (asp) {
            totalScore += asp.score;
            aspectsHtml += `
                <div class="hc-aspect-row ${asp.type}">
                    <strong>${planetLabels[pair[0]]} (1) - ${planetLabels[pair[1]]} (2)</strong>: 
                    ${asp.name} 
                    <span>${asp.score > 0 ? 'Pozitif Enerji' : 'Zorlayıcı Etki'}</span>
                </div>
            `;
        }
    });

    if (totalScore > 100) totalScore = 100;
    if (totalScore < 0) totalScore = 0;

    document.getElementById('hc-sinastri-score').innerText = "%" + totalScore;
    document.getElementById('hc-sinastri-aspects').innerHTML = aspectsHtml;
    document.getElementById('hc-sinastri-uyumu-result').classList.add('visible');
}
