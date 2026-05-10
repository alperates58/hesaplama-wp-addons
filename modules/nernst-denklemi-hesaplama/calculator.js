function hcNernstDenklemiHesapla() {
    const e0 = parseFloat(document.getElementById('hc-ne-e0').value);
    const n = parseFloat(document.getElementById('hc-ne-n').value);
    const q = parseFloat(document.getElementById('hc-ne-q').value);
    const tempC = parseFloat(document.getElementById('hc-ne-temp').value);

    if (isNaN(e0) || !n || !q) return;

    // E = E0 - (RT / nF) * ln(Q)
    // At 25C (298.15K): E = E0 - (0.0592 / n) * log10(Q)
    
    const tempK = tempC + 273.15;
    const r = 8.314;
    const f = 96485;
    
    let e = 0;
    if (tempC === 25) {
        e = e0 - (0.0592 / n) * Math.log10(q);
    } else {
        e = e0 - ( (r * tempK) / (n * f) ) * Math.log(q) * 0.4343; // Simplified log10 conversion
    }

    document.getElementById('hc-ne-val').innerText = e.toFixed(4) + ' V';
    document.getElementById('hc-ne-result').classList.add('visible');
}
