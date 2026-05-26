function hcHisseSeyreltmeHesapla() {
    var mevcut = parseFloat(document.getElementById('hc-khs-mevcut').value) || 0;
    var yatirim = parseFloat(document.getElementById('hc-khs-yatirim').value) || 0;
    var esop = parseFloat(document.getElementById('hc-khs-esop').value) || 0;

    if (mevcut <= 0 || mevcut > 100) {
        alert('Lütfen geçerli kurucu hisse oranı giriniz (0-100).');
        return;
    }

    if (yatirim + esop >= 100) {
        alert('Yatırımcı ve ESOP oranları toplamı %100 veya daha fazla olamaz.');
        return;
    }

    // Seyreltme katsayısı = 1 - (Yatırımcı Payı + ESOP) / 100
    var seyreltmeKatsayisi = 1 - ((yatirim + esop) / 100);
    var yeniKurucuHisse = mevcut * seyreltmeKatsayisi;
    var toplamSeyrelme = mevcut - yeniKurucuHisse;

    document.getElementById('hc-khs-res-yatirimci').innerText = '%' + yatirim.toFixed(2);
    document.getElementById('hc-khs-res-esop').innerText = '%' + esop.toFixed(2);
    document.getElementById('hc-khs-res-kurucu').innerText = '%' + yeniKurucuHisse.toFixed(2);
    document.getElementById('hc-khs-res-seyrelme').innerText = '%' + toplamSeyrelme.toFixed(2);

    document.getElementById('hc-khs-result').classList.add('visible');
}