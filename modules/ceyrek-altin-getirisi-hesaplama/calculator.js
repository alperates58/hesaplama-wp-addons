function hcCeyrekAltinGetirisiHesapla() {
    const count = parseFloat(document.getElementById('hc-ca-count').value);
    const buy = parseFloat(document.getElementById('hc-ca-buy').value);
    const sell = parseFloat(document.getElementById('hc-ca-sell').value);

    if (isNaN(count) || isNaN(buy) || isNaN(sell) || count <= 0) {
        alert('Lütfen geçerli adet ve fiyatları girin.');
        return;
    }

    const profit = (sell - buy) * count;
    const ratio = ((sell - buy) / buy) * 100;

    document.getElementById('hc-ca-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ca-res-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    const profitElem = document.getElementById('hc-ca-res-profit');
    profitElem.style.color = profit >= 0 ? 'green' : 'red';

    document.getElementById('hc-ca-result').classList.add('visible');
}
