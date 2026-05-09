function hcSdHesapla() {
    const input = document.getElementById('hc-sd-input').value;
    const type = document.getElementById('hc-sd-type').value;

    const data = input.split(/[,\s]+/)
        .map(n => parseFloat(n.trim()))
        .filter(n => !isNaN(n));

    if (data.length < 2) {
        alert('Lütfen en az iki sayı giriniz.');
        return;
    }

    const n = data.length;
    const mean = data.reduce((a, b) => a + b, 0) / n;
    
    const sumSqDiff = data.reduce((a, b) => a + Math.pow(b - mean, 2), 0);
    const variance = sumSqDiff / (type === 'pop' ? n : n - 1);
    const stdDev = Math.sqrt(variance);

    document.getElementById('hc-res-mean').innerText = mean.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-sd').innerText = stdDev.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-var').innerText = variance.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-count').innerText = n;

    document.getElementById('hc-sd-result').classList.add('visible');
    document.getElementById('hc-sd-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
