function hcBasabasNoktasıHesapla() {
    const fixed = parseFloat(document.getElementById('hc-bep-fixed').value);
    const price = parseFloat(document.getElementById('hc-bep-price').value);
    const variable = parseFloat(document.getElementById('hc-bep-variable').value);

    if (isNaN(fixed) || isNaN(price) || isNaN(variable) || price <= variable) {
        alert('Lütfen geçerli değerler girin. Satış fiyatı değişken maliyetten büyük olmalıdır.');
        return;
    }

    // BEP (Birim) = Sabit Maliyet / (Fiyat - Değişken Maliyet)
    const units = fixed / (price - variable);
    const revenue = units * price;

    document.getElementById('hc-bep-units').innerText = Math.ceil(units).toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-bep-revenue').innerText = revenue.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-bep-result').classList.add('visible');
}
