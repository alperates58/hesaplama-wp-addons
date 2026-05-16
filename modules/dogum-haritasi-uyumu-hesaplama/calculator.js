/**
 * Doğum Haritası Uyumu Hesaplama
 */

// Basit Astronomik Çekirdek
const HC_Astro = {
    // J2000 epoch'tan itibaren gün sayısı
    getJulianDate: function(date) {
        return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    },

    // Gezegenlerin ortalama boylamlarını hesaplar (Basitleştirilmiş Keplerian)
    // d: J2000'den itibaren gün
    getPositions: function(date) {
        const d = this.getJulianDate(date) - 2451545.0;
        
        const rev = (x) => { return x - Math.floor(x / 360.0) * 360.0; };

        // Güneş (Dünya)
        let sun_L = rev(280.466 + 0.98564736 * d);
        let sun_g = rev(357.528 + 0.9856003 * d);
        let sun_lon = rev(sun_L + 1.915 * Math.sin(sun_g * Math.PI / 180) + 0.02 * Math.sin(2 * sun_g * Math.PI / 180));

        // Ay (Basitleştirilmiş)
        let moon_L = rev(218.316 + 13.176396 * d);
        let moon_M = rev(134.963 + 13.064993 * d);
        let moon_F = rev(93.272 + 13.229350 * d);
        let moon_lon = rev(moon_L + 6.289 * Math.sin(moon_M * Math.PI / 180));

        // Venüs
        let ven_L = rev(181.979 + 1.602130 * d);
        let ven_lon = rev(ven_L + 0.001 * d); // çok kaba yaklaşım

        // Mars
        let mar_L = rev(355.453 + 0.524021 * d);
        let mar_lon = rev(mar_L + 0.001 * d);

        return { sun: sun_lon, moon: moon_lon, venus: ven_lon, mars: mar_lon };
    },

    getZodiacSign: function(lon) {
        const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
        return signs[Math.floor(lon / 30)];
    }
};

function hcDogumHaritasiUyumuHesapla() {
    const d1Str = document.getElementById('hc-p1-birthdate').value;
    const d2Str = document.getElementById('hc-p2-birthdate').value;

    if (!d1Str || !d2Str) {
        alert("Lütfen her iki doğum tarihini de seçin.");
        return;
    }

    const d1 = new Date(d1Str);
    const d2 = new Date(d2Str);

    const pos1 = HC_Astro.getPositions(d1);
    const pos2 = HC_Astro.getPositions(d2);

    let totalScore = 0;
    let detailsHtml = "";

    // Karşılaştırma Fonksiyonu
    const compare = (lon1, lon2, weight, label) => {
        let diff = Math.abs(lon1 - lon2);
        if (diff > 180) diff = 360 - diff;
        
        let score = 0;
        let comment = "";

        // Temel açılar
        if (diff < 8) { score = 100; comment = "Kavuşum (Mükemmel)"; }
        else if (Math.abs(diff - 60) < 6) { score = 80; comment = "Sekstil (Çok İyi)"; }
        else if (Math.abs(diff - 90) < 8) { score = 20; comment = "Kare (Zorlayıcı)"; }
        else if (Math.abs(diff - 120) < 8) { score = 90; comment = "Üçgen (Harika)"; }
        else if (Math.abs(diff - 180) < 8) { score = 40; comment = "Karşıt (Dengeleyici)"; }
        else { score = 50; comment = "Nötr"; }

        totalScore += (score * weight);

        return `
            <div class="hc-harmony-item">
                <strong>${label}:</strong> ${HC_Astro.getZodiacSign(lon1)} - ${HC_Astro.getZodiacSign(lon2)} 
                <span>(${comment})</span>
            </div>
        `;
    };

    detailsHtml += "<h4>Gezegen Yerleşimleri ve Etkileşimler</h4>";
    detailsHtml += compare(pos1.sun, pos2.sun, 0.3, "Güneş - Güneş (Karakter Uyumu)");
    detailsHtml += compare(pos1.moon, pos2.moon, 0.3, "Ay - Ay (Duygusal Uyum)");
    detailsHtml += compare(pos1.venus, pos2.venus, 0.2, "Venüs - Venüs (Aşk Dili)");
    detailsHtml += compare(pos1.mars, pos2.mars, 0.2, "Mars - Mars (Enerji ve Tutku)");

    const finalScore = Math.round(totalScore);
    document.getElementById('hc-harmony-score').innerText = "%" + finalScore.toLocaleString('tr-TR');
    
    let resultText = "";
    if (finalScore > 80) resultText = "Ruh eşi potansiyeli çok yüksek! Harika bir uyum.";
    else if (finalScore > 60) resultText = "Oldukça uyumlu bir birliktelik, ufak tefek pürüzler aşılabilir.";
    else if (finalScore > 40) resultText = "Orta seviye uyum. Çaba ve anlayış gerektiren bir ilişki.";
    else resultText = "Zorlayıcı etkiler baskın. Farklılıkları kabul etmek ilişkinin anahtarı.";

    detailsHtml += `<div class="hc-harmony-summary">${resultText}</div>`;

    document.getElementById('hc-harmony-details').innerHTML = detailsHtml;
    document.getElementById('hc-dogum-haritasi-uyumu-result').classList.add('visible');
}
