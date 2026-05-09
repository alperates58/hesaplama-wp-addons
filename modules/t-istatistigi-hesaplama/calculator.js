function hcTStatHesapla() {
    const x = parseFloat(document.getElementById('hc-ts-mean').value) || 0;
    const mu = parseFloat(document.getElementById('hc-ts-mu').value) || 0;
    const s = parseFloat(document.getElementById('hc-ts-std').value) || 1;
    const n = parseInt(document.getElementById('hc-ts-n').value) || 2;

    if (n < 2) return;

    const t = (x - mu) / (s / Math.sqrt(n));
    const df = n - 1;

    document.getElementById('hc-res-ts-val').innerText = t.toFixed(4);
    document.getElementById('hc-res-ts-df').innerText = df;
    
    document.getElementById('hc-t-stat-result').classList.add('visible');
}
