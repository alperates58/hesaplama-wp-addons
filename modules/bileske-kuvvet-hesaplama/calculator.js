function hcBKHesapla() {
    const f1 = parseFloat(document.getElementById('hc-bk-f1').value);
    const f2 = parseFloat(document.getElementById('hc-bk-f2').value);
    const angleDeg = parseFloat(document.getElementById('hc-bk-angle').value);

    if (isNaN(f1) || isNaN(f2) || isNaN(angleDeg)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    const rTotal = Math.sqrt(Math.pow(f1, 2) + Math.pow(f2, 2) + (2 * f1 * f2 * Math.cos(rad)));

    document.getElementById('hc-bk-val').innerText = rTotal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-bk-result').classList.add('visible');
}
