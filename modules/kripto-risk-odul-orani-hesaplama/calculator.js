function hcKriptoRiskOdulOraniHesapla() {
    var giris = parseFloat(document.getElementById('hc-roo-giris').value) || 0;
    var hedef = parseFloat(document.getElementById('hc-roo-hedef').value) || 0;
    var stop = parseFloat(document.getElementById('hc-roo-stop').value) || 0;

    if (giris <= 0 || hedef <= 0 || stop <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (hedef > giris && stop < giris) {
        var odul = hedef - giris;
        var risk = giris - stop;
    } else if (hedef < giris && stop > giris) {
        var odul = giris - hedef;
        var risk = stop - giris;
    } else {
        alert('Lütfen fiyatları giriş fiyatına göre kar ve stop yönleri tutarlı olacak şekilde giriniz.');
        return;
    }

    var odulYuzde = (odul / giris) * 100;
    var riskYuzde = (risk / giris) * 100;
    var ratio = odul / risk;

    document.getElementById('hc-roo-res-odul').innerText = odul.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' (%' + odulYuzde.toFixed(2) + ')';
    document.getElementById('hc-roo-res-risk').innerText = risk.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' (%' + riskYuzde.toFixed(2) + ')';
    document.getElementById('hc-roo-res-ratio').innerText = '1 : ' + ratio.toFixed(2);

    document.getElementById('hc-roo-result').classList.add('visible');
}