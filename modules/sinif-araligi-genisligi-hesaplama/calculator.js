function hcClassWidthHesapla() {
    const max = parseFloat(document.getElementById('hc-cw-max').value) || 0;
    const min = parseFloat(document.getElementById('hc-cw-min').value) || 0;
    const k = parseInt(document.getElementById('hc-cw-k').value) || 1;

    if (max <= min || k <= 0) return;

    const width = (max - min) / k;

    document.getElementById('hc-res-cw-val').innerText = width.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-class-width-result').classList.add('visible');
}
