function hcThermalExpHesapla() {
    const matVal = document.getElementById('hc-tx-mat').value;
    let alpha = parseFloat(matVal);
    
    if (matVal === 'custom') {
        alpha = parseFloat(document.getElementById('hc-tx-alpha').value);
    }

    const l0 = parseFloat(document.getElementById('hc-tx-l0').value);
    const dt = parseFloat(document.getElementById('hc-tx-dt').value);

    if (isNaN(alpha) || isNaN(l0) || isNaN(dt) || l0 < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // DeltaL = alpha * L0 * DeltaT
    const deltaL = alpha * l0 * dt; // in meters
    const deltaLMm = deltaL * 1000;

    document.getElementById('hc-tx-res-val').innerText = deltaLMm.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' mm';
    
    document.getElementById('hc-tx-result').classList.add('visible');
}
