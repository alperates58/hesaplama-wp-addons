function hcKarelerToplamiHesapla() {
    const input = document.getElementById('hc-ss-data').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));

    if (data.length < 2) {
        alert('En az 2 veri noktası girmelisiniz.');
        return;
    }

    const n = data.length;
    const mean = data.reduce((a, b) => a + b, 0) / n;
    
    let sumOfSquares = 0;
    for (let i = 0; i < n; i++) {
        sumOfSquares += Math.pow(data[i] - mean, 2);
    }

    const variance = sumOfSquares / (n - 1);
    const stdDev = Math.sqrt(variance);

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-ss-mean').innerText = fmt(mean);
    document.getElementById('hc-res-ss-val').innerText = fmt(sumOfSquares);
    document.getElementById('hc-res-ss-var').innerText = fmt(variance);
    document.getElementById('hc-res-ss-std').innerText = fmt(stdDev);

    document.getElementById('hc-kareler-toplami-result').classList.add('visible');
}
