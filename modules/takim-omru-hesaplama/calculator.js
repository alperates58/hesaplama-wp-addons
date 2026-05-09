function hcToolLifeHesapla() {
    const v = parseFloat(document.getElementById('hc-tl-v').value) || 1;
    const n = parseFloat(document.getElementById('hc-tl-n').value) || 0.1;
    const c = parseFloat(document.getElementById('hc-tl-c').value) || 1;

    // T = (C / V)^(1/n)
    const t = Math.pow(c / v, 1 / n);

    document.getElementById('hc-res-tl-val').innerText = Math.round(t).toLocaleString('tr-TR') + ' dakika';
    document.getElementById('hc-tool-life-result').classList.add('visible');
}
