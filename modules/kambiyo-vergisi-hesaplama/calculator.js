function hcKambiyoVergisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-kv-amount').value);
    const rate = parseFloat(document.getElementById('hc-kv-rate').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir alım tutarı girin.');
        return;
    }

    const tax = amount * rate;
    const total = amount + tax;

    document.getElementById('hc-kv-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kv-result').classList.add('visible');
}
