function hcDMHesapla() {
    const v = parseFloat(document.getElementById('hc-dm-v').value);
    const a = parseFloat(document.getElementById('hc-dm-a').value);

    if (isNaN(v) || isNaN(a) || a <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const d = Math.pow(v, 2) / (2 * a);

    document.getElementById('hc-dm-val').innerText = d.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-dm-result').classList.add('visible');
}
