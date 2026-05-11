function hcBeamRebarHesapla() {
    const md = parseFloat(document.getElementById('hc-br-moment').value);
    const b = parseFloat(document.getElementById('hc-br-b').value);
    const d = parseFloat(document.getElementById('hc-br-d').value);
    const fyk = parseFloat(document.getElementById('hc-br-fyk').value);

    if (isNaN(md) || isNaN(b) || isNaN(d) || md <= 0 || d <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Design yield strength fyd = fyk / 1.15
    const fyd = fyk / 1.15;

    // Approximate formula: As = Md * 10^6 / (0.9 * d * fyd)
    const asReq = (md * 1000000) / (0.9 * d * fyd);

    document.getElementById('hc-br-res-val').innerText = Math.round(asReq).toLocaleString('tr-TR') + ' mm²';
    
    // Suggested bars (phi14 = 154mm2, phi16 = 201mm2)
    const n14 = Math.ceil(asReq / 154);
    const n16 = Math.ceil(asReq / 201);

    document.getElementById('hc-br-res-bars').innerText = 'Öneri: ' + n14 + ' adet Φ14 veya ' + n16 + ' adet Φ16 çubuk.';
    
    document.getElementById('hc-br-result').classList.add('visible');
}
