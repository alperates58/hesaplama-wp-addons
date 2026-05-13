function hcGeometrikHesapla() {
    const p = parseFloat(document.getElementById('hc-geom-p').value);
    const k = parseInt(document.getElementById('hc-geom-k').value);

    if (isNaN(p) || isNaN(k) || p <= 0 || p > 1 || k < 1) {
        alert('Lütfen geçerli değerler girin (0 < p ≤ 1 ve k ≥ 1 olmalıdır).');
        return;
    }

    const probK = Math.pow(1 - p, k - 1) * p;
    const probCum = 1 - Math.pow(1 - p, k);
    const mean = 1 / p;
    const variance = (1 - p) / (p * p);

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-geom-p').innerText = fmt(probK);
    document.getElementById('hc-res-geom-cum').innerText = fmt(probCum);
    document.getElementById('hc-res-geom-mean').innerText = fmt(mean);
    document.getElementById('hc-res-geom-var').innerText = fmt(variance);

    document.getElementById('hc-geometrik-dagilim-result').classList.add('visible');
}
