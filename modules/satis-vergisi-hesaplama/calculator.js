function hcSatisVergisiHesapla() {
    const price = parseFloat(document.getElementById('hc-sv-price').value);
    const rate = parseFloat(document.getElementById('hc-sv-rate').value) / 100;

    if (isNaN(price) || price <= 0 || isNaN(rate)) {
        alert('Lütfen geçerli bir fiyat ve vergi oranı girin.');
        return;
    }

    const tax = price * rate;
    const total = price + tax;

    document.getElementById('hc-sv-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-sv-result').classList.add('visible');
}
