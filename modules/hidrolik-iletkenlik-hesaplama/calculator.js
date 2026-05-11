function hcHydCondHesapla() {
    const q = parseFloat(document.getElementById('hc-hc-q').value);
    const l = parseFloat(document.getElementById('hc-hc-l').value);
    const a = parseFloat(document.getElementById('hc-hc-a').value);
    const h = parseFloat(document.getElementById('hc-hc-h').value);

    if (isNaN(q) || isNaN(l) || isNaN(a) || isNaN(h) || a <= 0 || h <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // K = (Q * L) / (A * h)
    const k = (q * l) / (a * h);

    document.getElementById('hc-hc-res-val').innerText = k.toExponential(4) + ' m/s';
    
    document.getElementById('hc-hc-result').classList.add('visible');
}
