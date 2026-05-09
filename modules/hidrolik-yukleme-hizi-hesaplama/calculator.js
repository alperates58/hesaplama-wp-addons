function hcHLRHesapla() {
    const q = parseFloat(document.getElementById('hc-hlr-q').value);
    const area = parseFloat(document.getElementById('hc-hlr-area').value);

    if (isNaN(q) || isNaN(area) || q <= 0 || area <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const hlr = q / area;

    document.getElementById('hc-hlr-val').innerText = hlr.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³/m²·gün';
    document.getElementById('hc-hlr-result').classList.add('visible');
}
