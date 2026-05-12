function hcYemekMaliyetiHesapla() {
    const totalCost = parseFloat(document.getElementById('hc-dc-total').value);
    const portions = parseFloat(document.getElementById('hc-dc-portions').value);
    const overhead = parseFloat(document.getElementById('hc-dc-overhead').value);

    if (!totalCost || !portions) return;

    const netCostPerPortion = totalCost / portions;
    const finalCostPerPortion = netCostPerPortion * (1 + overhead / 100);
    const suggestedPrice = finalCostPerPortion * 1.3; // 30% margin

    document.getElementById('hc-dc-res-val').innerText = finalCostPerPortion.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-dc-sell-val').innerText = suggestedPrice.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-dish-cost-result').classList.add('visible');
}
