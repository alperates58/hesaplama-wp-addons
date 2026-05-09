function hcDispersionHesapla() {
    const input = document.getElementById('hc-do-data').value;
    const data = input.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));

    if (data.length < 2) {
        alert('Lütfen en az 2 sayı girin.');
        return;
    }

    const n = data.length;
    const min = Math.min(...data);
    const max = Math.max(...data);
    const range = max - min;

    const mean = data.reduce((a, b) => a + b) / n;
    const variance = data.reduce((a, b) => a + Math.pow(b - mean, 2), 0) / (n - 1);
    const stdDev = Math.sqrt(variance);
    const cv = (stdDev / mean) * 100;

    document.getElementById('hc-res-do-range').innerText = range.toLocaleString('tr-TR');
    document.getElementById('hc-res-do-var').innerText = variance.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-do-std').innerText = stdDev.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-do-cv').innerText = '%' + cv.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-dispersion-result').classList.add('visible');
}
