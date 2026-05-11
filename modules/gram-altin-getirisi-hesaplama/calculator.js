function hcGramAltinGetirisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-ga-amount').value);
    const buy = parseFloat(document.getElementById('hc-ga-buy').value);
    const sell = parseFloat(document.getElementById('hc-ga-sell').value);

    if (isNaN(amount) || isNaN(buy) || isNaN(sell) || amount <= 0) {
        alert('Lütfen geçerli miktar ve fiyatları girin.');
        return;
    }

    const profit = (sell - buy) * amount;
    const ratio = ((sell - buy) / buy) * 100;

    document.getElementById('hc-ga-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ga-res-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    const profitElem = document.getElementById('hc-ga-res-profit');
    profitElem.style.color = profit >= 0 ? 'green' : 'red';

    document.getElementById('hc-ga-result').classList.add('visible');
}
