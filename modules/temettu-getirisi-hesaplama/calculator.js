function hcTemettuGetirisiHesapla() {
    const shares = parseFloat(document.getElementById('hc-tg-shares').value);
    const perShare = parseFloat(document.getElementById('hc-tg-per-share').value);
    const taxRate = 0.10; // Borsa İstanbul temettü stopajı

    if (isNaN(shares) || isNaN(perShare) || shares <= 0) {
        alert('Lütfen geçerli hisse adedi ve temettü tutarı girin.');
        return;
    }

    const grossTotal = shares * perShare;
    const tax = grossTotal * taxRate;
    const netTotal = grossTotal - tax;

    document.getElementById('hc-tg-res-gross').innerText = grossTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tg-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tg-res-net').innerText = netTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-tg-result').classList.add('visible');
}
