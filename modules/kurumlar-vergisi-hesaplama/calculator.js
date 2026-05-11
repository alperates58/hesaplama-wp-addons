function hcKurumlarVergisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-kv-amount').value);
    const rate = parseFloat(document.getElementById('hc-kv-rate').value) / 100;

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir matrah tutarı girin.');
        return;
    }

    const tax = amount * rate;
    const net = amount - tax;

    document.getElementById('hc-kv-res-total').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kv-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kv-result').classList.add('visible');
}
