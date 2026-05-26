function hc3dSatisFiyatiHesapla() {
    var maliyet = parseFloat(document.getElementById('hc-3dp-maliyet').value) || 0;
    var karOrani = parseFloat(document.getElementById('hc-3dp-kar').value) || 0;
    var kargo = parseFloat(document.getElementById('hc-3dp-kargo').value) || 0;
    var komisyon = parseFloat(document.getElementById('hc-3dp-komisyon').value) || 0;
    var kdv = parseFloat(document.getElementById('hc-3dp-kdv').value) || 0;

    if (maliyet <= 0) {
        alert('Lütfen toplam üretim maliyetini giriniz.');
        return;
    }

    // Hedef fiyat (Vergisiz ve komisyonsuz) = Maliyet * (1 + kar) + Kargo
    var hedefFiyat = maliyet * (1 + (karOrani / 100)) + kargo;

    // Platform Komisyonunu hesaba katma (Ters oran hesabı: Net Fiyat / (1 - komisyon/100))
    var komisyonluFiyat = hedefFiyat / (1 - (komisyon / 100));

    // Vergili / KDV'li Fiyat
    var vergiDahilFiyat = komisyonluFiyat * (1 + (kdv / 100));

    var komisyonTutar = komisyonluFiyat - hedefFiyat;
    var kdvTutar = vergiDahilFiyat - komisyonluFiyat;

    // Net Kâr = (Satış Fiyatı - KDV) - Komisyon - Maliyet - Kargo
    var netKar = (vergiDahilFiyat - kdvTutar) - komisyonTutar - maliyet - kargo;

    document.getElementById('hc-3dp-res-temel').innerText = hedefFiyat.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-3dp-res-komisyon-payi').innerText = komisyonTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-3dp-res-kdv-tutar').innerText = kdvTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-3dp-res-satis').innerText = vergiDahilFiyat.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-3dp-res-net-kar').innerText = netKar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-3dp-result').classList.add('visible');
}