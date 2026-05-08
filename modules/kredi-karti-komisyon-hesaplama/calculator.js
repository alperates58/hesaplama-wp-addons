function hcKKHesapla() {
    const price = parseFloat(document.getElementById('hc-kk-price').value) || 0;
    const inst = parseInt(document.getElementById('hc-kk-inst').value) || 1;
    const rate = parseFloat(document.getElementById('hc-kk-rate').value) || 0;

    if (price <= 0) {
        alert('Lütfen tutar giriniz.');
        return;
    }

    const commission = (price * rate) / 100;
    const total = price + commission;
    const monthly = total / inst;

    document.getElementById('hc-kk-res-kom').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kk-res-monthly').innerText = inst + ' x ' + monthly.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kk-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kk-result').classList.add('visible');
}
