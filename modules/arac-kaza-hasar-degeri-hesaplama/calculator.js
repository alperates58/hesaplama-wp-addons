function hcAracHasarDegeriHesapla() {
    var deger = parseFloat(document.getElementById('hc-akh-deger').value) || 0;
    var km = parseFloat(document.getElementById('hc-akh-km').value) || 0;
    var yas = parseInt(document.getElementById('hc-akh-yas').value) || 0;
    var hasar = parseFloat(document.getElementById('hc-akh-hasar').value) || 0.08;
    var gecmis = parseFloat(document.getElementById('hc-akh-gecmis').value) || 1.0;

    if (deger <= 0) {
        alert('Lütfen kaza öncesi araç piyasa değerini giriniz.');
        return;
    }

    // Kilometre katsayısı
    var kmKat = 1.0;
    if (km < 15000) kmKat = 1.0;
    else if (km < 50000) kmKat = 0.85;
    else if (km < 100000) kmKat = 0.70;
    else if (km < 150000) kmKat = 0.50;
    else kmKat = 0.30;

    // Yaş katsayısı
    var yasKat = 1.0;
    if (yas <= 1) yasKat = 1.0;
    else if (yas <= 3) yasKat = 0.85;
    else if (yas <= 5) yasKat = 0.70;
    else if (yas <= 8) yasKat = 0.50;
    else yasKat = 0.25;

    // Değer kaybı formülü
    var kayip = deger * hasar * kmKat * yasKat * gecmis;
    var yeniDeger = deger - kayip;

    document.getElementById('hc-akh-res-km-kat').innerText = kmKat.toFixed(2);
    document.getElementById('hc-akh-res-yas-kat').innerText = yasKat.toFixed(2);
    document.getElementById('hc-akh-res-kayip').innerText = Math.round(kayip).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-akh-res-yeni-deger').innerText = Math.round(yeniDeger).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-akh-result').classList.add('visible');
}