function hcHepsiburadaKomisyonHesapla() {
    const sale = parseFloat(document.getElementById('hc-hk-sale').value);
    const commRate = parseFloat(document.getElementById('hc-hk-comm').value) / 100;
    const ship = parseFloat(document.getElementById('hc-hk-ship').value) || 0;

    if (isNaN(sale) || sale <= 0 || isNaN(commRate)) {
        alert('Lütfen satış fiyatı ve komisyon oranını girin.');
        return;
    }

    const commission = sale * commRate;
    const net = sale - commission - ship;

    document.getElementById('hc-hk-res-comm').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-hk-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-hk-result').classList.add('visible');
}
