/**
 * Lunar Return Haritası Hesaplama
 */

const HC_Astro_LR_Engine = {
    getJulianDate: function(date) {
        return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    },
    rev: function(x) { return x - Math.floor(x / 360.0) * 360.0; },
    getMoonLon: function(date) {
        const d = this.getJulianDate(date) - 2451545.0;
        return this.rev(218.316 + 13.176396 * d + 6.289 * Math.sin(this.rev(134.963 + 13.064993 * d) * Math.PI / 180));
    },
    getZodiac: function(lon) {
        const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
        return signs[Math.floor(lon / 30)];
    }
};

function hcLunarReturnHesapla() {
    const bStr = document.getElementById('hc-lr-birth').value;
    const targetMonthStr = document.getElementById('hc-lr-month').value; // YYYY-MM

    if (!bStr || !targetMonthStr) return;

    const bDate = new Date(bStr);
    const natalMoon = HC_Astro_LR_Engine.getMoonLon(bDate);

    const [tYear, tMonth] = targetMonthStr.split('-').map(Number);
    let startDate = new Date(tYear, tMonth - 1, 1);
    
    let bestDate = startDate;
    let minDiff = 360;

    // Ayın o aydaki hareketini tara (yaklaşık 28-31 gün)
    for (let i = 0; i < 31; i++) {
        let testDate = new Date(startDate);
        testDate.setDate(startDate.getDate() + i);
        if (testDate.getMonth() !== tMonth - 1) break;

        let diff = Math.abs(HC_Astro_LR_Engine.getMoonLon(testDate) - natalMoon);
        if (diff > 180) diff = 360 - diff;
        
        if (diff < minDiff) {
            minDiff = diff;
            bestDate = testDate;
        }
    }

    const moonSign = HC_Astro_LR_Engine.getZodiac(natalMoon);
    document.getElementById('hc-lr-focus').innerText = moonSign + " Temalı Ay";
    
    let html = `
        <div class="hc-lr-box">
            <p><strong>Ay Dönüşü Tarihi (Yaklaşık):</strong> ${bestDate.toLocaleDateString('tr-TR')}</p>
            <p>Bu tarihten itibaren yaklaşık 28 gün boyunca haritanızdaki <strong>${moonSign}</strong> enerjisi duygusal hayatınızda tetiklenecek.</p>
        </div>
        <div class="hc-lr-interpretation">
            <h4>Bu Ayın Getirdikleri:</h4>
            <p>Ay'ın kendi konumuna dönmesi, duygusal bir 'reset' anıdır. Bu ay boyunca natal Ay'ınızın vaat ettiği temalar daha görünür olacaktır.</p>
            <p><strong>Duygusal İhtiyaçlar:</strong> ${moonSign} burcunun doğasına göre beslenme, güvenlik ve aidiyet konuları ön plana çıkabilir.</p>
        </div>
    `;

    document.getElementById('hc-lr-details').innerHTML = html;
    document.getElementById('hc-lunar-return-result').classList.add('visible');
}
