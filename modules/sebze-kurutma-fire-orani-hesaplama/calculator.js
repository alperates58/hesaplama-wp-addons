function hcVegDryHesapla() {
    const ratio = parseFloat(document.getElementById('hc-vd-type').value);
    const amount = parseFloat(document.getElementById('hc-vd-amount').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen taze sebze miktarını giriniz.');
        return;
    }

    const dryAmount = amount / ratio;
    const firePct = ((amount - dryAmount) / amount) * 100;

    document.getElementById('hc-vd-val').innerText = dryAmount.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-vd-info').innerText = `Fire Oranı: %${firePct.toFixed(1)}. Yaklaşık ${ratio} kg taze üründen 1 kg kuru ürün elde edilmektedir.`;
    
    document.getElementById('hc-veg-dry-result').classList.add('visible');
}
