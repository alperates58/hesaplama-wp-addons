function hcHisseBetaHesapla() {
    const stockInputs = document.querySelectorAll('.hc-hb-stock');
    const marketInputs = document.querySelectorAll('.hc-hb-market');
    
    let stocks = [];
    let markets = [];

    for (let i = 0; i < stockInputs.length; i++) {
        const s = parseFloat(stockInputs[i].value);
        const m = parseFloat(marketInputs[i].value);
        if (!isNaN(s) && !isNaN(m)) {
            stocks.push(s);
            markets.push(m);
        }
    }

    if (stocks.length < 2) {
        alert('Lütfen en az 2 dönem verisi girin.');
        return;
    }

    const meanX = markets.reduce((a, b) => a + b) / markets.length;
    const meanY = stocks.reduce((a, b) => a + b) / stocks.length;

    let numerator = 0; // Covariance proxy
    let denominator = 0; // Variance proxy

    for (let i = 0; i < stocks.length; i++) {
        numerator += (markets[i] - meanX) * (stocks[i] - meanY);
        denominator += Math.pow(markets[i] - meanX, 2);
    }

    if (denominator === 0) {
        alert('Pazar verilerinde değişim olmalıdır.');
        return;
    }

    const beta = numerator / denominator;

    document.getElementById('hc-h-beta-res-total').innerText = beta.toLocaleString('tr-TR', { minimumFractionDigits: 4 });
    document.getElementById('hc-h-beta-result').classList.add('visible');
}
