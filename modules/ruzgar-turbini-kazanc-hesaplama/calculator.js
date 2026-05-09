function hcRuzgarKazancHesapla() {
    const prodMwh = parseFloat(document.getElementById('hc-wk-prod').value);
    const priceKwh = parseFloat(document.getElementById('hc-wk-price').value);

    if (isNaN(prodMwh) || isNaN(priceKwh)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const monthlyTry = prodMwh * 1000 * priceKwh;
    const yearlyTry = monthlyTry * 12;

    document.getElementById('hc-res-wk-monthly').innerText = monthlyTry.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-wk-yearly').innerText = yearlyTry.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-wk-result').classList.add('visible');
}
