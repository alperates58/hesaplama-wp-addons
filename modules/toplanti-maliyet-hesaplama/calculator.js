function hcToplantiMaliyetHesapla() {
    var kisi = parseInt(document.getElementById('hc-tmh-kisi').value) || 0;
    var sure = parseFloat(document.getElementById('hc-tmh-sure').value) || 0;
    var ucret = parseFloat(document.getElementById('hc-tmh-ucret').value) || 0;
    var hazirlik = parseFloat(document.getElementById('hc-tmh-hazirlik').value) || 0;

    if (kisi <= 0 || sure <= 0) {
        alert('Lütfen katılımcı sayısı ve süre giriniz.');
        return;
    }

    var saatlikHiz = kisi * ucret;
    var toplantiMasraf = saatlikHiz * (sure / 60);
    var hazirlikMasraf = ucret * (hazirlik / 60);

    var toplam = toplantiMasraf + hazirlikMasraf;

    document.getElementById('hc-tmh-res-hiz').innerText = saatlikHiz.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-tmh-res-hazirlik').innerText = hazirlikMasraf.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-tmh-res-toplam').innerText = toplam.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-tmh-result').classList.add('visible');
}