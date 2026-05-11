function hcEuroGetirisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-eg-amount').value);
    const buy = parseFloat(document.getElementById('hc-eg-buy').value);
    const sell = parseFloat(document.getElementById('hc-eg-sell').value);

    if (isNaN(amount) || isNaN(buy) || isNaN(sell) || amount <= 0) {
        alert('Lütfen geçerli miktar ve kur değerlerini girin.');
        return;
    }

    const profit = (sell - buy) * amount;
    const ratio = ((sell - buy) / buy) * 100;

    document.getElementById('hc-eg-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-eg-res-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    const profitElem = document.getElementById('hc-eg-res-profit');
    profitElem.style.color = profit >= 0 ? 'green' : 'red';

    document.getElementById('hc-eg-result').classList.add('visible');
}
