function hcAMHesapla() {
    const i = parseFloat(document.getElementById('hc-am-i').value);
    const w = parseFloat(document.getElementById('hc-am-w').value);

    if (isNaN(i) || isNaN(w)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const l = i * w;

    document.getElementById('hc-am-val').innerText = l.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' kg·m²/s';
    document.getElementById('hc-am-result').classList.add('visible');
}
