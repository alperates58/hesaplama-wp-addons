function hcStakingBilesikGetiriHesapla() {
    var miktar = parseFloat(document.getElementById('hc-sbg-miktar').value) || 0;
    var oran = parseFloat(document.getElementById('hc-sbg-oran').value) || 0;
    var siklik = parseInt(document.getElementById('hc-sbg-donem').value) || 365;
    var yil = parseFloat(document.getElementById('hc-sbg-yil').value) || 0;

    if (miktar <= 0 || oran <= 0 || yil <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    var r = oran / 100;
    var n = siklik;
    var t = yil;

    // A = P * (1 + r/n)^(n*t)
    var toplam = miktar * Math.pow((1 + (r / n)), (n * t));
    var netOdul = toplam - miktar;
    var roi = (netOdul / miktar) * 100;

    document.getElementById('hc-sbg-res-anapara').innerText = miktar.toLocaleString('tr-TR', {maximumFractionDigits: 8});
    document.getElementById('hc-sbg-res-odul').innerText = '+' + netOdul.toLocaleString('tr-TR', {maximumFractionDigits: 8});
    document.getElementById('hc-sbg-res-toplam').innerText = toplam.toLocaleString('tr-TR', {maximumFractionDigits: 8});
    document.getElementById('hc-sbg-res-roi').innerText = '%' + roi.toFixed(2);

    document.getElementById('hc-sbg-result').classList.add('visible');
}