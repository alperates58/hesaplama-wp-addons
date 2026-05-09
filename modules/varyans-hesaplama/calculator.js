function hcVarianceHesapla() {
    const input = document.getElementById('hc-va-data').value;
    const data = input.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));
    const type = document.getElementById('hc-va-type').value;

    if (data.length < 2) {
        alert('Lütfen en az 2 sayı girin.');
        return;
    }

    const n = data.length;
    const mean = data.reduce((a, b) => a + b) / n;
    const sqDiffs = data.reduce((a, b) => a + Math.pow(b - mean, 2), 0);
    
    const variance = (type === 'sample') ? sqDiffs / (n - 1) : sqDiffs / n;

    document.getElementById('hc-res-va-val').innerText = variance.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-va-mean').innerText = mean.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    document.getElementById('hc-variance-result').classList.add('visible');
}
