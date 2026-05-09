function hcTrendyolHesapla() {
    const price = parseFloat(document.getElementById('hc-tr-price').value) || 0;
    const rate = parseFloat(document.getElementById('hc-tr-rate').value) || 0;
    const shipping = parseFloat(document.getElementById('hc-tr-shipping').value) || 0;
    const ads = parseFloat(document.getElementById('hc-tr-ads').value) || 0;

    if (price <= 0) {
        alert('Lütfen satış fiyatını giriniz.');
        return;
    }

    const commission = (price * rate) / 100;
    const serviceFee = 2.50; // Estimated 2026 fixed fee per item
    
    const totalExpenses = commission + serviceFee + shipping + ads;
    const netEarnings = price - totalExpenses;

    document.getElementById('hc-tr-res-kom').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tr-res-service').innerText = serviceFee.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tr-res-total-exp').innerText = totalExpenses.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tr-res-net').innerText = netEarnings.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-trendyol-result').classList.add('visible');
}
