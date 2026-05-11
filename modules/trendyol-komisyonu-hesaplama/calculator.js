function hcTrendyolKomisyonHesapla() {
    const sale = parseFloat(document.getElementById('hc-tk-sale').value);
    const commRate = parseFloat(document.getElementById('hc-tk-comm').value) / 100;
    const service = parseFloat(document.getElementById('hc-tk-service').value) || 0;
    const ship = parseFloat(document.getElementById('hc-tk-ship').value) || 0;

    if (isNaN(sale) || sale <= 0 || isNaN(commRate)) {
        alert('Lütfen satış fiyatı ve komisyon oranını girin.');
        return;
    }

    const commission = sale * commRate;
    const totalFee = commission + service + ship;
    const net = sale - totalFee;

    document.getElementById('hc-tk-res-comm').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tk-res-total-fee').innerText = totalFee.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tk-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-tk-result').classList.add('visible');
}
