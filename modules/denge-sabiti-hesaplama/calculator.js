function hcDengeHesapla() {
    const a = parseFloat(document.getElementById('hc-ds-a').value) || 0;
    const aa = parseFloat(document.getElementById('hc-ds-aa').value) || 1;
    const b = parseFloat(document.getElementById('hc-ds-b').value) || 0;
    const bb = parseFloat(document.getElementById('hc-ds-bb').value) || 1;
    const c = parseFloat(document.getElementById('hc-ds-c').value) || 0;
    const cc = parseFloat(document.getElementById('hc-ds-cc').value) || 1;
    const d = parseFloat(document.getElementById('hc-ds-d').value) || 0;
    const dd = parseFloat(document.getElementById('hc-ds-dd').value) || 1;

    // Kc = (C^cc * D^dd) / (A^aa * B^bb)
    // Only include if concentration > 0
    let numerator = 1;
    if (c > 0) numerator *= Math.pow(c, cc);
    if (d > 0) numerator *= Math.pow(d, dd);

    let denominator = 1;
    if (a > 0) denominator *= Math.pow(a, aa);
    if (b > 0) denominator *= Math.pow(b, bb);

    if (denominator === 0) {
        alert('Girenler derişimi 0 olamaz.');
        return;
    }

    const kc = numerator / denominator;

    document.getElementById('hc-ds-val').innerText = kc.toLocaleString('tr-TR', { maximumFractionDigits: 5 });
    document.getElementById('hc-ds-result').classList.add('visible');
}
