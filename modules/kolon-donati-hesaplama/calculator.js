function hcColumnRebarHesapla() {
    const nd = parseFloat(document.getElementById('hc-cr-load').value);
    const b = parseFloat(document.getElementById('hc-cr-b').value);
    const h = parseFloat(document.getElementById('hc-cr-h').value);
    const fck = parseFloat(document.getElementById('hc-cr-fck').value);

    if (isNaN(nd) || isNaN(b) || isNaN(h) || b <= 0 || h <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const ac = b * h;
    const fcd = fck / 1.5;
    const fyd = 420 / 1.15; // S420 standard

    // Nd (kN) * 1000 = 0.85 * fcd * (Ac - As) + fyd * As
    // Nd * 1000 = 0.85 * fcd * Ac - 0.85 * fcd * As + fyd * As
    // As * (fyd - 0.85 * fcd) = Nd * 1000 - 0.85 * fcd * Ac
    
    let asReq = (nd * 1000 - 0.85 * fcd * ac) / (fyd - 0.85 * fcd);
    
    // Minimum reinforcement ratio rule (0.01 * Ac)
    const asMin = 0.01 * ac;
    if (asReq < asMin) asReq = asMin;

    const ratio = (asReq / ac) * 100;

    document.getElementById('hc-cr-res-val').innerText = Math.round(asReq).toLocaleString('tr-TR') + ' mm²';
    document.getElementById('hc-cr-res-ratio').innerText = 'Donatı Oranı: %' + ratio.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-cr-result').classList.add('visible');
}
