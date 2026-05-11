function hcBistGetirisiHesapla() {
    const shares = parseFloat(document.getElementById('hc-bg-shares').value);
    const buy = parseFloat(document.getElementById('hc-bg-buy').value);
    const sell = parseFloat(document.getElementById('hc-bg-sell').value);
    const commRate = parseFloat(document.getElementById('hc-bg-comm').value) / 10000;

    if (isNaN(shares) || isNaN(buy) || isNaN(sell) || shares <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const buyTotal = shares * buy;
    const sellTotal = shares * sell;
    
    const buyComm = buyTotal * commRate;
    const sellComm = sellTotal * commRate;
    const totalComm = buyComm + sellComm;

    const netProfit = (sellTotal - sellComm) - (buyTotal + buyComm);
    const netRatio = (netProfit / (buyTotal + buyComm)) * 100;

    document.getElementById('hc-bg-res-comm').innerText = totalComm.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-bg-res-profit').innerText = netProfit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-bg-res-ratio').innerText = '%' + netRatio.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    const profitElem = document.getElementById('hc-bg-res-profit');
    profitElem.style.color = netProfit >= 0 ? 'green' : 'red';

    document.getElementById('hc-bg-result').classList.add('visible');
}
