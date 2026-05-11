function hcHisseGetirisiHesapla() {
    const buy = parseFloat(document.getElementById('hc-hg-buy').value);
    const sell = parseFloat(document.getElementById('hc-hg-sell').value);
    const div = parseFloat(document.getElementById('hc-hg-dividend').value) || 0;

    if (isNaN(buy) || isNaN(sell) || buy <= 0) {
        alert('Lütfen geçerli alış ve satış fiyatlarını girin.');
        return;
    }

    const profit = (sell - buy) + div;
    const ratio = (profit / buy) * 100;

    document.getElementById('hc-hg-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-hg-res-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    const profitElem = document.getElementById('hc-hg-res-profit');
    profitElem.style.color = profit >= 0 ? 'green' : 'red';

    document.getElementById('hc-hg-result').classList.add('visible');
}
