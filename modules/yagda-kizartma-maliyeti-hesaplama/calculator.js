function hcFryingCostHesapla() {
    const litres = parseFloat(document.getElementById('hc-fyc-litres').value);
    const price = parseFloat(document.getElementById('hc-fyc-price').value);
    const usage = parseFloat(document.getElementById('hc-fyc-usage').value);

    if (isNaN(litres) || isNaN(price) || isNaN(usage) || usage <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const totalCost = litres * price;
    const perUsageCost = totalCost / usage;

    document.getElementById('hc-fyc-val').innerText = perUsageCost.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-frying-cost-result').classList.add('visible');
}
