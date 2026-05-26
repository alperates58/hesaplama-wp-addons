function hcBitcoinSatinAlmaMaliyetiHesapla() {
    var miktar = parseFloat(document.getElementById('hc-bsm-miktar').value) || 0;
    var fiyat = parseFloat(document.getElementById('hc-bsm-fiyat').value) || 0;
    var komisyon = parseFloat(document.getElementById('hc-bsm-komisyon').value) || 0;

    if (miktar <= 0 || fiyat <= 0) {
        alert('Lütfen geçerli miktar ve fiyat giriniz.');
        return;
    }

    var brutTutar = miktar * fiyat;
    var komisyonTutar = brutTutar * (komisyon / 100);
    var netTutar = brutTutar + komisyonTutar;
    var ortalamaFiyat = netTutar / miktar;

    document.getElementById('hc-bsm-res-brut').innerText = brutTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-bsm-res-komisyon').innerText = komisyonTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-bsm-res-net').innerText = netTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-bsm-res-ortalama').innerText = ortalamaFiyat.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-bsm-result').classList.add('visible');
}