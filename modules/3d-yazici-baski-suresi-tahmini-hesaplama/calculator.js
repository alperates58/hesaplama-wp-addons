function hc3dSureTahminEt() {
    var genislik = parseFloat(document.getElementById('hc-3ds-genislik').value) || 0;
    var derinlik = parseFloat(document.getElementById('hc-3ds-derinlik').value) || 0;
    var yukseklik = parseFloat(document.getElementById('hc-3ds-yukseklik').value) || 0;
    var katman = parseFloat(document.getElementById('hc-3ds-katman').value) || 0.2;
    var doluluk = parseFloat(document.getElementById('hc-3ds-doluluk').value) || 20;
    var hiz = parseFloat(document.getElementById('hc-3ds-hiz').value) || 60;

    if (genislik <= 0 || derinlik <= 0 || yukseklik <= 0 || hiz <= 0) {
        alert('Lütfen boyutları ve baskı hızını geçerli değerler olarak giriniz.');
        return;
    }

    var modelHacmi = genislik * derinlik * yukseklik;
    
    // Doluluk oranına göre filament hacmini tahmin etme (Kabuklar dahil)
    var dolulukKatsayisi = 0.15 + (0.85 * (doluluk / 100));
    var baskiHacmiCm = modelHacmi * dolulukKatsayisi;
    var ekstruzyonHacmiMm3 = baskiHacmiCm * 1000;
    
    // 1.75mm çapındaki filamentin 1mm'sinin hacmi = pi * r^2 = 3.14159 * (0.875)^2 ≈ 2.4 mm³
    var filamentKesitAlani = 2.405;
    var gerekenFilamentYoluMm = ekstruzyonHacmiMm3 / filamentKesitAlani;
    
    // Baskı süresi hesabı (Baskı hızına ve katman yüksekliğine bağlı katsayı ile)
    var netSuresiSaniye = gerekenFilamentYoluMm / hiz;
    
    // Katman geçişleri ve ivmelenme payı eklenir (İnce katmanda süre katlanır)
    var toplamSaniye = netSuresiSaniye * (1.3 + (0.2 / katman));

    var toplamDakika = Math.round(toplamSaniye / 60);
    var saat = Math.floor(toplamDakika / 60);
    var dakika = toplamDakika % 60;

    document.getElementById('hc-3ds-res-hacim').innerText = modelHacmi.toFixed(1) + ' cm³';
    document.getElementById('hc-3ds-res-sure').innerText = saat + ' Saat ' + dakika + ' Dakika';

    document.getElementById('hc-3ds-result').classList.add('visible');
}