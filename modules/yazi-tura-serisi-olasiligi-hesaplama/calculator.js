function hcCoinSeriesHesapla() {
    const n = parseInt(document.getElementById('hc-cs-count').value) || 0;

    if (n <= 0) return;

    const prob = (1 / Math.pow(2, n)) * 100;

    document.getElementById('hc-res-cs-val').innerText = '%' + prob.toLocaleString('tr-TR', { maximumFractionDigits: 10 });
    document.getElementById('hc-coin-series-result').classList.add('visible');
}
