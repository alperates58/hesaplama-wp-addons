function hcKriptoDonusturucuHesapla() {
    var miktar = parseFloat(document.getElementById('hc-kpd-miktar-inp').value) || 0;
    var birimFiyat = parseFloat(document.getElementById('hc-kpd-birim-fiyat').value) || 0;
    var usdTl = parseFloat(document.getElementById('hc-kpd-usd-tl').value) || 33.50;
    var eurUsd = parseFloat(document.getElementById('hc-kpd-usd-eur').value) || 1.08;

    if (miktar <= 0 || birimFiyat <= 0) {
        alert('Lütfen geçerli miktar ve birim fiyatı giriniz.');
        return;
    }

    var usdDeger = miktar * birimFiyat;
    var tryDeger = usdDeger * usdTl;
    var eurDeger = usdDeger / eurUsd;

    document.getElementById('hc-kpd-res-usd').innerText = usdDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' $';
    document.getElementById('hc-kpd-res-try').innerText = tryDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-kpd-res-eur').innerText = eurDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' €';

    document.getElementById('hc-kpd-res-div').classList.add('visible');
}