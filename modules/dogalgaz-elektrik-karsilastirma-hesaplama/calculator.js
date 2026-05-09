function hcGazElekKarsilastir() {
    const energyNeeded = parseFloat(document.getElementById('hc-ge-energy').value);
    const gasPrice = parseFloat(document.getElementById('hc-ge-gas-price').value);
    const elecPrice = parseFloat(document.getElementById('hc-ge-elec-price').value);

    if (isNaN(energyNeeded) || isNaN(gasPrice) || isNaN(elecPrice)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Assumptions:
    // 1 m3 gas = ~10.6 kWh
    // Efficiency: Gas heater ~90%, Electric heater ~100%
    const gasKwhEquivalent = 10.6;
    const gasEfficiency = 0.90;
    
    const gasCost = (energyNeeded / (gasKwhEquivalent * gasEfficiency)) * gasPrice;
    const elecCost = energyNeeded * elecPrice;

    document.getElementById('hc-res-ge-gas').innerText = gasCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-ge-elec').innerText = elecCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    const ratio = Math.max(gasCost, elecCost) / Math.min(gasCost, elecCost);
    const cheaper = gasCost < elecCost ? 'Doğalgaz' : 'Elektrik';
    
    document.getElementById('hc-res-ge-note').innerText = cheaper + ' kullanımı yaklaşık ' + ratio.toFixed(1) + ' kat daha ekonomiktir.';

    document.getElementById('hc-ge-result').classList.add('visible');
}
