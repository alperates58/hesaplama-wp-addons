function hcPazaryeriKomisyonHesapla() {
    const sale = parseFloat(document.getElementById('hc-pk-sale').value);
    const cost = parseFloat(document.getElementById('hc-pk-cost').value) || 0;
    const commRate = parseFloat(document.getElementById('hc-pk-comm').value) / 100;
    const shipping = parseFloat(document.getElementById('hc-pk-ship').value) || 0;

    if (isNaN(sale) || sale <= 0 || isNaN(commRate)) {
        alert('Lütfen satış fiyatı ve komisyon oranını girin.');
        return;
    }

    const commission = sale * commRate;
    const netProfit = sale - commission - shipping - cost;
    const margin = (netProfit / sale) * 100;

    document.getElementById('hc-pk-res-fee').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-pk-res-profit').innerText = netProfit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-pk-res-margin').innerText = '%' + margin.toLocaleString('tr-TR', { minimumFractionDigits: 1 });

    const profitElem = document.getElementById('hc-pk-res-profit');
    profitElem.style.color = netProfit >= 0 ? 'green' : 'red';

    document.getElementById('hc-pk-result').classList.add('visible');
}
