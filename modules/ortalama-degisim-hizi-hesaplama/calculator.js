function hcAvgRateHesapla() {
    const x1 = parseFloat(document.getElementById('hc-ar-x1').value);
    const y1 = parseFloat(document.getElementById('hc-ar-y1').value);
    const x2 = parseFloat(document.getElementById('hc-ar-x2').value);
    const y2 = parseFloat(document.getElementById('hc-ar-y2').value);

    if (isNaN(x1) || isNaN(y1) || isNaN(x2) || isNaN(y2)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    if (x1 === x2) {
        alert('x1 ve x2 değerleri aynı olamaz (payda sıfır hatası).');
        return;
    }

    const rate = (y2 - y1) / (x2 - x1);

    document.getElementById('hc-ar-res-val').innerText = rate.toLocaleString('tr-TR');
    document.getElementById('hc-avg-rate-result').classList.add('visible');
}
