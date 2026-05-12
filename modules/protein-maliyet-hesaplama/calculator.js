function hcProteinMaliyetHesapla() {
    const price = parseFloat(document.getElementById('hc-pr-price').value);
    const weight = parseFloat(document.getElementById('hc-pr-weight').value);
    const proteinPercent = parseFloat(document.getElementById('hc-pr-type').value);

    if (!price || !weight) return;

    const totalProtein = (weight * proteinPercent) / 100;
    const costPerGram = price / totalProtein;

    const resultDiv = document.getElementById('hc-protein-cost-result');
    document.getElementById('hc-pr-res-val').innerText = costPerGram.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    
    resultDiv.classList.add('visible');
}
