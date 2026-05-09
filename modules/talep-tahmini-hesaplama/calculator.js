function hcDemandForecastHesapla() {
    const input = document.getElementById('hc-df-data').value;
    const data = input.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));
    const n = parseInt(document.getElementById('hc-df-period').value) || 3;

    if (data.length < n) {
        alert(`Yeterli veri yok. En az ${n} adet geçmiş veri girmelisiniz.`);
        return;
    }

    // SMA calculation: Average of last n periods
    const lastN = data.slice(-n);
    const forecast = lastN.reduce((a, b) => a + b) / n;

    document.getElementById('hc-res-df-val').innerText = forecast.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-demand-forecast-result').classList.add('visible');
}
