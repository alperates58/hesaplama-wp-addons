function hcEtKarHesapla() {
    const sale = parseFloat(document.getElementById('hc-etk-sale').value);
    const cost = parseFloat(document.getElementById('hc-etk-cost').value) || 0;
    const commRate = parseFloat(document.getElementById('hc-etk-comm').value) / 100 || 0;
    const ship = parseFloat(document.getElementById('hc-etk-ship').value) || 0;
    const ad = parseFloat(document.getElementById('hc-etk-ad').value) || 0;

    if (isNaN(sale) || sale <= 0) {
        alert('Lütfen satış fiyatını girin.');
        return;
    }

    const commission = sale * commRate;
    const totalCost = cost + commission + ship + ad;
    const profit = sale - totalCost;
    const roi = totalCost > 0 ? (profit / totalCost) * 100 : 0;

    document.getElementById('hc-etk-res-total-cost').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-etk-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-etk-res-roi').innerText = '%' + roi.toLocaleString('tr-TR', { minimumFractionDigits: 1 });

    const profitElem = document.getElementById('hc-etk-res-profit');
    profitElem.style.color = profit >= 0 ? 'green' : 'red';

    document.getElementById('hc-etk-result').classList.add('visible');
}
