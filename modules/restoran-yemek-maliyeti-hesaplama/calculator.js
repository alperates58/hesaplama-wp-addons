function hcYemekMaliyetiHesapla() {
    const cost = parseFloat(document.getElementById('hc-ry-cost').value);
    const wastePercent = parseFloat(document.getElementById('hc-ry-waste').value);
    const waste = wastePercent / 100;
    const yieldCount = parseInt(document.getElementById('hc-ry-yield').value);

    if (!cost || !yieldCount) return;

    if (waste >= 1) {
        alert('Zayiat oranı %100 veya daha fazla olamaz.');
        return;
    }

    const netTotalCost = cost / (1 - waste);
    const perPortion = netTotalCost / yieldCount;

    const resultDiv = document.getElementById('hc-rest-food-cost-result');
    document.getElementById('hc-ry-res-val').innerText = perPortion.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    
    resultDiv.classList.add('visible');
}
