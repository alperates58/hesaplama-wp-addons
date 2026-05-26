function hcKriptoPozisyonBuyukluguHesapla() {
    var bakiye = parseFloat(document.getElementById('hc-kpb-bakiye').value) || 0;
    var risk = parseFloat(document.getElementById('hc-kpb-risk').value) || 0;
    var giris = parseFloat(document.getElementById('hc-kpb-giris').value) || 0;
    var stop = parseFloat(document.getElementById('hc-kpb-stop').value) || 0;

    if (bakiye <= 0 || risk <= 0 || giris <= 0 || stop <= 0) {
        alert('Lütfen tüm değerleri geçerli olarak giriniz.');
        return;
    }

    if (stop >= giris) {
        alert('Stop loss fiyatı giriş fiyatından küçük olmalıdır.');
        return;
    }

    var riskTutar = bakiye * (risk / 100);
    var birimRisk = giris - stop;
    var stopYuzde = (birimRisk / giris) * 100;

    var pozAdet = riskTutar / birimRisk;
    var pozTutar = pozAdet * giris;

    document.getElementById('hc-kpb-res-risk-tutar').innerText = riskTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-kpb-res-mesafe').innerText = birimRisk.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 4}) + ' (%' + stopYuzde.toFixed(2) + ')';
    document.getElementById('hc-kpb-res-poz-tutar').innerText = pozTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-kpb-res-poz-adet').innerText = pozAdet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 6});

    document.getElementById('hc-kpb-result').classList.add('visible');
}