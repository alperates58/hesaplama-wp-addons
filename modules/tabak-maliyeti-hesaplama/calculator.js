function hcPlateCostHesapla() {
    const matCost = parseFloat(document.getElementById('hc-pc-total-mat').value);
    const waste = parseFloat(document.getElementById('hc-pc-waste').value);
    const targetPct = parseFloat(document.getElementById('hc-pc-markup').value);

    if (isNaN(matCost) || matCost <= 0) {
        alert('Lütfen malzeme giderini giriniz.');
        return;
    }

    const netCost = matCost * (1 + waste / 100);
    const salesPrice = (netCost / targetPct) * 100;

    document.getElementById('hc-pc-val').innerText = salesPrice.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-pc-info').innerText = `Net Maliyet (Fire Dahil): ${netCost.toLocaleString('tr-TR', {maximumFractionDigits:2})} ₺.`;
    
    document.getElementById('hc-plate-cost-result').classList.add('visible');
}
