/**
 * Solar Return Haritası Hesaplama
 */

const HC_Astro_SR_Engine = {
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
        return signs[Math.floor(lon / 30)];
    }
};

function hcSolarReturnHesapla() {
    const bStr = document.getElementById('hc-sr-birth').value;
    const targetYear = parseInt(document.getElementById('hc-sr-year').value);

    if (!bStr || !targetYear) return;

    const bDate = new Date(bStr);
    const natalSun = HC_Astro_SR_Engine.getSunLon(bDate);

    // Dönüş tarihini yaklaşık olarak bul
    let returnDate = new Date(targetYear, bDate.getMonth(), bDate.getDate());
    
    // Küçük bir arama ile en yakın günü bul (basitleştirilmiş)
    let bestDate = returnDate;
    let minDiff = 360;
    
    for (let i = -2; i <= 2; i++) {
        let testDate = new Date(returnDate);
        testDate.setDate(returnDate.getDate() + i);
        let diff = Math.abs(HC_Astro_SR_Engine.getSunLon(testDate) - natalSun);
        if (diff < minDiff) {
            minDiff = diff;
            bestDate = testDate;
        }
    }

    const planets = HC_Astro_SR_Engine.getPlanets(bestDate);
    const srMoonSign = HC_Astro_SR_Engine.getZodiac(planets.Ay);
    
    document.getElementById('hc-sr-theme').innerText = HC_Astro_SR_Engine.getZodiac(natalSun) + " Dönemi";
    
    let html = `
        <div class="hc-sr-info">
            <p><strong>Dönüş Tarihi (Yaklaşık):</strong> ${bestDate.toLocaleDateString('tr-TR')}</p>
            <p>Güneş'iniz ${targetYear} yılında öz burcuna geri dönerek yeni bir yıllık döngü başlatıyor.</p>
        </div>
        <div class="hc-sr-planets">
            <div class="hc-sr-planet"><strong>Dönüş Ay Burcu:</strong> ${srMoonSign} (Bu yılki duygusal odak)</div>
            <div class="hc-sr-planet"><strong>Dönüş Venüs:</strong> ${HC_Astro_SR_Engine.getZodiac(planets.Venüs)} (İlişkiler ve değerler)</div>
            <div class="hc-sr-planet"><strong>Dönüş Jüpiter:</strong> ${HC_Astro_SR_Engine.getZodiac(planets.Jüpiter)} (Fırsatlar ve büyüme)</div>
        </div>
        <div class="hc-sr-summary">
            Bu yıl <strong>${srMoonSign}</strong> burcunun özellikleri duygusal dünyanızda baskın olacak. 
            <strong>${HC_Astro_SR_Engine.getZodiac(planets.Mars)}</strong> konumundaki Mars ise yıl boyu ana mücadele ve enerji alanınızı belirleyecek.
        </div>
    `;

    document.getElementById('hc-sr-details').innerHTML = html;
    document.getElementById('hc-solar-return-result').classList.add('visible');
}
