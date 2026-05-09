function hcIstatistikHesapla() {
    const raw = document.getElementById('hc-st-data').value;
    const data = raw.split(/[,\s\n]+/).map(x => parseFloat(x.replace(',', '.').trim())).filter(x => !isNaN(x));

    if (data.length === 0) {
        alert('Lütfen en az bir sayı girin.');
        return;
    }

    const n = data.length;
    const sum = data.reduce((a, b) => a + b, 0);
    const avg = sum / n;

    // Median
    const sorted = [...data].sort((a, b) => a - b);
    const mid = Math.floor(n / 2);
    const median = n % 2 !== 0 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;

    // Mode
    const counts = {};
    let maxCount = 0;
    data.forEach(x => {
        counts[x] = (counts[x] || 0) + 1;
        if (counts[x] > maxCount) maxCount = counts[x];
    });
    const modes = Object.keys(counts).filter(x => counts[x] === maxCount);
    const modeStr = maxCount > 1 ? modes.join(', ') : 'Yok';

    // Variance & Std Dev
    const variance = data.reduce((a, b) => a + Math.pow(b - avg, 2), 0) / n;
    const stdDev = Math.sqrt(variance);

    // Range
    const range = sorted[n - 1] - sorted[0];

    const fmt = (v) => v.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-st-avg').innerText = fmt(avg);
    document.getElementById('hc-res-st-med').innerText = fmt(median);
    document.getElementById('hc-res-st-mod').innerText = modeStr;
    document.getElementById('hc-res-st-std').innerText = fmt(stdDev);
    document.getElementById('hc-res-st-var').innerText = fmt(variance);
    document.getElementById('hc-res-st-range').innerText = fmt(range);
    document.getElementById('hc-res-st-sum').innerText = fmt(sum);
    document.getElementById('hc-res-st-count').innerText = n;

    document.getElementById('hc-st-result').classList.add('visible');
}
