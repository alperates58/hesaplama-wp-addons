function hcLineerRegHesapla() {
    const xText = document.getElementById('hc-lin-x').value.trim();
    const yText = document.getElementById('hc-lin-y').value.trim();
    const resultDiv = document.getElementById('hc-lineer-regresyon-hesaplama-result');

    if (!xText || !yText) {
        alert('Lütfen X ve Y veri setlerini giriniz.');
        return;
    }

    const xVals = xText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n));
    const yVals = yText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n));

    if (xVals.length !== yVals.length || xVals.length < 2) {
        alert('X ve Y veri setleri eşit sayıda eleman içermeli ve en az 2 eleman olmalıdır.');
        return;
    }

    const n = xVals.length;
    let sumX = 0, sumY = 0, sumXY = 0, sumX2 = 0, sumY2 = 0;

    for (let i = 0; i < n; i++) {
        sumX += xVals[i];
        sumY += yVals[i];
        sumXY += xVals[i] * yVals[i];
        sumX2 += xVals[i] * xVals[i];
        sumY2 += yVals[i] * yVals[i];
    }

    const slope = (n * sumXY - sumX * sumY) / (n * sumX2 - sumX * sumX);
    const intercept = (sumY - slope * sumX) / n;

    // R-squared
    const num = (n * sumXY - sumX * sumY);
    const den = Math.sqrt((n * sumX2 - sumX * sumX) * (n * sumY2 - sumY * sumY));
    const r = den === 0 ? 0 : num / den;
    const r2 = r * r;

    const b = slope;
    const a = intercept;
    const sign = b >= 0 ? "+" : "-";

    document.getElementById('hc-lin-res-eq').innerText = `y = ${a.toLocaleString('tr-TR', {maximumFractionDigits: 4})} ${sign} ${Math.abs(b).toLocaleString('tr-TR', {maximumFractionDigits: 4})}x`;
    document.getElementById('hc-lin-res-params').innerHTML = `Sabit (a): ${a.toLocaleString('tr-TR', {maximumFractionDigits: 4})} <br> Eğim (b): ${b.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;
    document.getElementById('hc-lin-res-r2').innerText = `R² (Belirleme Katsayısı): ${r2.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;

    resultDiv.classList.add('visible');
}
