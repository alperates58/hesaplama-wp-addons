function hcGumrukVergisiHesapla() {
    const value = parseFloat(document.getElementById('hc-gv-value').value);
    const rate = parseFloat(document.getElementById('hc-gv-rate').value) / 100;
    const ekRate = parseFloat(document.getElementById('hc-gv-ek').value) / 100 || 0;

    if (isNaN(value) || value <= 0) {
        alert('Lütfen geçerli bir kıymet girin.');
        return;
    }

    const amount = value * rate;
    const ekAmount = value * ekRate;
    const total = amount + ekAmount;

    document.getElementById('hc-gv-res-amount').innerText = amount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-res-ek').innerText = ekAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gv-result').classList.add('visible');
}
