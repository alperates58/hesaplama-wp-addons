function hcHedefKaraGoreSatisHesapla() {
    const target = parseFloat(document.getElementById('hc-hks-target').value);
    const fixed = parseFloat(document.getElementById('hc-hks-fixed').value);
    const price = parseFloat(document.getElementById('hc-hks-price').value);
    const variable = parseFloat(document.getElementById('hc-hks-variable').value);

    if (isNaN(target) || isNaN(fixed) || isNaN(price) || isNaN(variable) || price <= variable) {
        alert('Lütfen geçerli değerler girin. Satış fiyatı değişken maliyetten büyük olmalıdır.');
        return;
    }

    // Required Units = (Fixed + Target Profit) / (Price - Variable)
    const units = (fixed + target) / (price - variable);
    const revenue = units * price;

    document.getElementById('hc-hks-units').innerText = Math.ceil(units).toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-hks-revenue').innerText = revenue.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-hks-result').classList.add('visible');
}
