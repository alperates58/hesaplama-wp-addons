function hcKdvHesapla() {
    const amount = parseFloat(document.getElementById('hc-kdv-amount').value);
    const rate = parseFloat(document.getElementById('hc-kdv-rate').value) / 100;

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    const tax = amount * rate;
    const total = amount + tax;

    document.getElementById('hc-kdv-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kdv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kdv-result').classList.add('visible');
}
