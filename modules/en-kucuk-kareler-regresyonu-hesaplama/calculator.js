function hcRegressionHesapla() {
    const raw = document.getElementById('hc-rg-data').value;
    const pairs = raw.split(';').map(p => p.trim()).filter(p => p.includes(','));
    
    if (pairs.length < 2) {
        alert('Lütfen en az 2 veri noktası giriniz (x,y formatında).');
        return;
    }

    let sumX = 0, sumY = 0, sumXY = 0, sumX2 = 0, sumY2 = 0;
    const n = pairs.length;
    const points = [];

    for (let p of pairs) {
        const coords = p.split(',').map(c => parseFloat(c.trim()));
        if (coords.length === 2 && !isNaN(coords[0]) && !isNaN(coords[1])) {
            const x = coords[0];
            const y = coords[1];
            points.push({x, y});
            sumX += x;
            sumY += y;
            sumXY += (x * y);
            sumX2 += (x * x);
            sumY2 += (y * y);
        }
    }

    if (points.length < 2) {
        alert('Hatalı veri girişi.');
        return;
    }

    const N = points.length;
    const slope = (N * sumXY - sumX * sumY) / (N * sumX2 - sumX * sumX);
    const intercept = (sumY - slope * sumX) / N;

    // R2 calculation
    const rNum = (N * sumXY - sumX * sumY);
    const rDen = Math.sqrt((N * sumX2 - sumX * sumX) * (N * sumY2 - sumY * sumY));
    const r = rDen === 0 ? 0 : rNum / rDen;
    const r2 = r * r;

    const resVal = document.getElementById('hc-rg-res-val');
    const sStr = slope >= 0 ? `+ ${slope.toFixed(2)}` : `- ${Math.abs(slope).toFixed(2)}`;
    const iStr = intercept >= 0 ? `+ ${intercept.toFixed(2)}` : `- ${Math.abs(intercept).toFixed(2)}`;
    
    resVal.innerText = `y = ${slope.toFixed(3)}x ${intercept >= 0 ? '+' : '-'} ${Math.abs(intercept).toFixed(3)}`;
    document.getElementById('hc-rg-res-r2').innerText = `Korelasyon Katsayısı (R²): ${r2.toFixed(4)}`;

    document.getElementById('hc-regression-result').classList.add('visible');
}
