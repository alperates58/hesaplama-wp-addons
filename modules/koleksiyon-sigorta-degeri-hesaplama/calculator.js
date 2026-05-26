function hcSigortaHesapla() {
    var toplam = parseFloat(document.getElementById('hc-ksd-toplam').value) || 0;
    var temelOran = parseFloat(document.getElementById('hc-ksd-tur').value) || 0.01;
    var saklama = parseFloat(document.getElementById('hc-ksd-saklama').value) || 1.0;
    var konum = parseFloat(document.getElementById('hc-ksd-konum').value) || 1.0;

    if (toplam <= 0) {
        alert('Lütfen toplam koleksiyon piyasa değerini giriniz.');
        return;
    }

    // Önerilen Teminat Değeri = Piyasa değerinin %110'u (Enflasyon ve hasar korumalı yedekleme maliyeti dahil)
    var teminat = toplam * 1.10;

    // Yıllık Prim = Teminat * TemelOran * SaklamaÇarpanı * KonumÇarpanı
    var yillikPrim = teminat * temelOran * saklama * konum;

    // Minimum prim sınırı 500 para birimi
    if (yillikPrim < 500) yillikPrim = 500;

    var aylikPrim = yillikPrim / 12;

    document.getElementById('hc-ksd-res-teminat').innerText = teminat.toLocaleString('tr-TR', {minimumFractionDigits: 2});
    document.getElementById('hc-ksd-res-prim').innerText = yillikPrim.toLocaleString('tr-TR', {minimumFractionDigits: 2});
    document.getElementById('hc-ksd-res-aylik').innerText = aylikPrim.toLocaleString('tr-TR', {minimumFractionDigits: 2});

    document.getElementById('hc-ksd-result').classList.add('visible');
}