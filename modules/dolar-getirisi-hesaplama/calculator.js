function hcDolarGetirisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-dg-amount').value);
    const buy = parseFloat(document.getElementById('hc-dg-buy').value);
    const sell = parseFloat(document.getElementById('hc-dg-sell').value);

    if (isNaN(amount) || isNaN(buy) || isNaN(sell) || amount <= 0) {
        alert('Lütfen geçerli miktar ve kur değerlerini girin.');
        return;
    }

    const profit = (sell - buy) * amount;
    const ratio = ((sell - buy) / buy) * 100;

    document.getElementById('hc-dg-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-dg-res-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    const profitElem = document.getElementById('hc-dg-res-profit');
    profitElem.style.color = profit >= 0 ? 'green' : 'red';

    document.getElementById('hc-dg-result').classList.add('visible');
}
