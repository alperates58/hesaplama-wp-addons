function hcCarbonEmiHesapla() {
    const amount = parseFloat(document.getElementById('hc-ce-amount').value);
    const factor = parseFloat(document.getElementById('hc-ce-type').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir kullanım miktarı girin.');
        return;
    }

    const co2kg = amount * factor;
    
    // Average mature tree absorbs about 20-25kg CO2 per year.
    const trees = co2kg / 20;

    document.getElementById('hc-ce-res-val').innerText = co2kg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg CO2e';
    document.getElementById('hc-ce-res-tree').innerHTML = 'Bu emisyonu dengelemek için yıllık yaklaşık <strong>' + Math.ceil(trees).toLocaleString('tr-TR') + '</strong> adet yetişkin ağaç gereklidir.';
    
    document.getElementById('hc-ce-result').classList.add('visible');
}
