function hcAltcoinTlDegeriHesapla() {
    var miktar = parseFloat(document.getElementById('hc-atd-miktar').value) || 0;
    var fiyat = parseFloat(document.getElementById('hc-atd-fiyat').value) || 0;
    var kur = parseFloat(document.getElementById('hc-atd-kur').value) || 0;

    if (miktar <= 0 || fiyat <= 0 || kur <= 0) {
        alert('Lütfen tüm değerleri geçerli olarak giriniz.');
        return;
    }

    var birimTl = fiyat * kur;
    var toplamUsd = miktar * fiyat;
    var toplamTl = toplamUsd * kur;

    document.getElementById('hc-atd-res-birim-tl').innerText = birimTl.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 4}) + ' ₺';
    document.getElementById('hc-atd-res-toplam-usd').innerText = toplamUsd.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' $';
    document.getElementById('hc-atd-res-toplam-tl').innerText = toplamTl.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-atd-result').classList.add('visible');
}