function hcStockTurnoverHesapla() {
    const cogs = parseFloat(document.getElementById('hc-st-cogs').value);
    const avgStock = parseFloat(document.getElementById('hc-st-avg').value);

    if (isNaN(cogs) || isNaN(avgStock) || avgStock <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const turnover = cogs / avgStock;
    const days = 365 / turnover;

    document.getElementById('hc-st-val').innerText = turnover.toFixed(2) + ' Kez / Yıl';
    document.getElementById('hc-st-info').innerText = `Stoklarınız ortalama ${Math.round(days)} günde bir tamamen yenileniyor.`;
    
    document.getElementById('hc-stock-turnover-result').classList.add('visible');
}
