function hcDEHesapla() {
    const fs = parseFloat(document.getElementById('hc-de-fs').value);
    const v = parseFloat(document.getElementById('hc-de-v').value);
    const vo = parseFloat(document.getElementById('hc-de-vo').value);
    const vs = parseFloat(document.getElementById('hc-de-vs').value);

    if (isNaN(fs) || isNaN(v) || isNaN(vo) || isNaN(vs) || (v - vs) === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const fObs = fs * (v + vo) / (v - vs);

    document.getElementById('hc-de-val').innerText = Math.round(fObs).toLocaleString('tr-TR') + ' Hz';
    document.getElementById('hc-de-result').classList.add('visible');
}
