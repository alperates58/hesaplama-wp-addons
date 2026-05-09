function hcTransistorBiasHesapla() {
    const vcc = parseFloat(document.getElementById('hc-tb-vcc').value) || 0;
    const r1 = parseFloat(document.getElementById('hc-tb-r1').value) || 1;
    const r2 = parseFloat(document.getElementById('hc-tb-r2').value) || 0;
    const re = parseFloat(document.getElementById('hc-tb-re').value) || 1;

    // VB = Vcc * (R2 / (R1 + R2))
    const vb = vcc * (r2 / (r1 + r2));
    
    // VE = VB - 0.7
    const ve = vb - 0.7;
    
    // IC approx IE = VE / RE
    let ic = 0;
    if (ve > 0) {
        ic = ve / re;
    }

    const icMa = ic * 1000;

    document.getElementById('hc-res-tb-vb').innerText = vb.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' V';
    document.getElementById('hc-res-tb-ic').innerText = icMa.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mA';
    
    document.getElementById('hc-transistor-bias-result').classList.add('visible');
}
