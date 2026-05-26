function hcTripCompareHesapla() {
    var yol = parseFloat(document.getElementById('hc-ysm-yol').value) || 0;
    var kisi = parseInt(document.getElementById('hc-ysm-kisi').value) || 1;
    var yakit = parseFloat(document.getElementById('hc-ysm-yakit').value) || 40;
    var tuketim = parseFloat(document.getElementById('hc-ysm-tuketim').value) || 7.0;
    var otobusBilet = parseFloat(document.getElementById('hc-ysm-otobus').value) || 0;
    var ucakBilet = parseFloat(document.getElementById('hc-ysm-ucak').value) || 0;

    if (yol <= 0) {
        alert('Lütfen geçerli bir yol mesafesi giriniz.');
        return;
    }

    // 1. Özel araç hesabı
    // Otoban/köprü geçişleri tahmini ortalama: 300 TL
    var otoMaliyet = ((yol / 100) * tuketim * yakit) + 300;
    var otoSure = (yol / 85) + 0.5; // Ortalama 85 km/h + 30 dk dinlenme

    // 2. Otobüs hesabı
    var busMaliyet = otobusBilet * kisi;
    var busSure = (yol / 65) + 1.0; // Ortalama 65 km/h + mola

    // 3. Uçak hesabı
    // Havalimanı transfer ek masrafı 2 yön toplam: 800 TL
    var airMaliyet = (ucakBilet * kisi) + 800;
    // Ortalama uçuş süresi + 2 saat havalimanı bekleme + transfer
    var airSure = 1.0 + 2.5;

    document.getElementById('hc-ysm-res-oto-sure').innerText = otoSure.toFixed(1) + ' Saat';
    document.getElementById('hc-ysm-res-oto-maliyet').innerText = otoMaliyet.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    
    document.getElementById('hc-ysm-res-bus-sure').innerText = busSure.toFixed(1) + ' Saat';
    document.getElementById('hc-ysm-res-bus-maliyet').innerText = busMaliyet.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    
    document.getElementById('hc-ysm-res-air-sure').innerText = airSure.toFixed(1) + ' Saat';
    document.getElementById('hc-ysm-res-air-maliyet').innerText = airMaliyet.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';

    document.getElementById('hc-ysm-result').classList.add('visible');
}