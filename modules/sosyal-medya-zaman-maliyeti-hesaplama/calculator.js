function hcSocialTimeHesapla() {
    const daily = parseFloat(document.getElementById('hc-social-daily').value) || 0;

    const yearlyMinutes = daily * 365;
    const yearlyDays = (yearlyMinutes / 1440).toFixed(1);
    
    // Kitap: Ortalama 300 sayfa, 1 sayfa ~2dk -> 600 dk/kitap
    const books = Math.floor(yearlyMinutes / 600);
    // Film: Ortalama 100 dk
    const movies = Math.floor(yearlyMinutes / 100);
    // Dil: Temel seviye B1 için ~400 saat (24000 dk)
    const langPercent = Math.min(100, (yearlyMinutes / 24000) * 100).toFixed(0);

    document.getElementById('hc-res-social-days').innerText = yearlyDays + ' Gün';
    document.getElementById('hc-res-social-books').innerText = `${books} adet 300 sayfalık kitap okuyabilirdiniz.`;
    document.getElementById('hc-res-social-movies').innerText = `${movies} adet film izleyebilirdiniz.`;
    document.getElementById('hc-res-social-lang').innerText = `Yeni bir dilde orta seviyeye (B1) ulaşmanın %${langPercent}'ini tamamlayabilirdiniz.`;
    
    document.getElementById('hc-social-time-result').classList.add('visible');
}
