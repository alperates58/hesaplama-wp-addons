function hcCacHesapla() {
    const marketing = parseFloat(document.getElementById('hc-cac-marketing').value) || 0;
    const sales = parseFloat(document.getElementById('hc-cac-sales').value) || 0;
    const customers = parseFloat(document.getElementById('hc-cac-customers').value);

    if (isNaN(customers) || customers <= 0) {
        alert('Lütfen yeni kazanılan müşteri sayısını girin.');
        return;
    }

    const cac = (marketing + sales) / customers;

    document.getElementById('hc-cac-value').innerText = cac.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-cac-result').classList.add('visible');
}
