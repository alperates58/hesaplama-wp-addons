function hcExpExpHesapla() {
    const a = parseFloat(document.getElementById('hc-ee-a').value);
    const x = parseFloat(document.getElementById('hc-ee-x').value);
    const y = parseFloat(document.getElementById('hc-ee-y').value);

    if (isNaN(a) || isNaN(x) || isNaN(y)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    const finalExp = x * y;
    const resVal = Math.pow(a, finalExp);

    document.getElementById('hc-ee-res-val').innerText = `${a}^${finalExp}`;
    document.getElementById('hc-ee-desc').innerText = `Değeri: ${isFinite(resVal) ? resVal.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) : 'Sayı Çok Büyük'}`;
    document.getElementById('hc-ussun-ussu-result').classList.add('visible');
}
