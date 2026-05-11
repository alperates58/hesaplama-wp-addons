function hcDamgaVergisi2026Hesapla() {
    const amount = parseFloat(document.getElementById('hc-dv-amount').value);
    const rate = parseFloat(document.getElementById('hc-dv-type').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    const tax = amount * rate;

    document.getElementById('hc-dv-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-dv-result').classList.add('visible');
}
