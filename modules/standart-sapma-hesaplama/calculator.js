function hcStdDevHesapla() {
    const input = document.getElementById('hc-sd-data').value;
    const data = input.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));
    const type = document.getElementById('hc-sd-type').value;

    if (data.length < 2) {
        alert('Lütfen en az 2 sayı girin.');
        return;
    }

    const n = data.length;
    const mean = data.reduce((a, b) => a + b) / n;
    const sqDiffs = data.reduce((a, b) => a + Math.pow(b - mean, 2), 0);
    
    const variance = (type === 'sample') ? sqDiffs / (n - 1) : sqDiffs / n;
    const stdDev = Math.sqrt(variance);

    document.getElementById('hc-res-sd-val').innerText = stdDev.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-sd-mean').innerText = mean.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    document.getElementById('hc-std-dev-result').classList.add('visible');
}
