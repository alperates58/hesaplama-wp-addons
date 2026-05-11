function hcPowerLossHesapla() {
    const i = parseFloat(document.getElementById('hc-gl-i').value);
    const r = parseFloat(document.getElementById('hc-gl-r').value);
    const type = parseInt(document.getElementById('hc-gl-type').value);

    if (isNaN(i) || isNaN(r) || i < 0 || r < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Ploss = n * I^2 * R
    // For 3-phase, total loss across 3 conductors is 3 * I^2 * R
    const loss = type * Math.pow(i, 2) * r;

    document.getElementById('hc-gl-res-val').innerText = loss.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Watt';
    
    document.getElementById('hc-gl-result').classList.add('visible');
}
