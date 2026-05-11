function hcEnergyBalanceHesapla() {
    const q = parseFloat(document.getElementById('hc-eb-q').value);
    const w = parseFloat(document.getElementById('hc-eb-w').value);

    if (isNaN(q) || isNaN(w)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // Delta U = Q - W
    const deltaU = q - w;

    document.getElementById('hc-eb-res-val').innerText = deltaU.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kJ';
    
    document.getElementById('hc-eb-result').classList.add('visible');
}
