function hcPearsonHesapla() {
    const dataText = document.getElementById('hc-pearson-data').value.trim();
    const resultDiv = document.getElementById('hc-pearson-korelasyon-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri çiftlerini giriniz.');
        return;
    }

    const rows = dataText.split('\n');
    let xValues = [];
    let yValues = [];

    for (let row of rows) {
        const parts = row.split(/[,;\s\t]+/).filter(p => p.trim() !== '');
        if (parts.length >= 2) {
            const x = parseFloat(parts[0]);
            const y = parseFloat(parts[1]);
            if (!isNaN(x) && !isNaN(y)) {
                xValues.push(x);
                yValues.push(y);
            }
        }
    }

    const n = xValues.length;
    if (n < 2) {
        alert('Hesaplama için en az 2 veri çifti gereklidir.');
        return;
    }

    const meanX = xValues.reduce((a, b) => a + b, 0) / n;
    const meanY = yValues.reduce((a, b) => a + b, 0) / n;

    let numerator = 0;
    let sumSqX = 0;
    let sumSqY = 0;

    for (let i = 0; i < n; i++) {
        const diffX = xValues[i] - meanX;
        const diffY = yValues[i] - meanY;
        numerator += diffX * diffY;
        sumSqX += diffX * diffX;
        sumSqY += diffY * diffY;
    }

    const denominator = Math.sqrt(sumSqX * sumSqY);
    if (denominator === 0) {
        alert('Geçersiz veri seti (varyans sıfır).');
        return;
    }

    const r = numerator / denominator;

    document.getElementById('hc-pearson-r-value').innerText = r.toLocaleString('tr-TR', {maximumFractionDigits: 4});

    let interpretation = "";
    const absR = Math.abs(r);
    if (absR >= 0.9) interpretation = "Çok güçlü ";
    else if (absR >= 0.7) interpretation = "Güçlü ";
    else if (absR >= 0.5) interpretation = "Orta düzeyde ";
    else if (absR >= 0.3) interpretation = "Zayıf ";
    else interpretation = "Çok zayıf veya ilişkisiz ";

    interpretation += (r > 0 ? "pozitif ilişki." : (r < 0 ? "negatif ilişki." : "ilişki yok."));
    document.getElementById('hc-pearson-interpretation').innerText = interpretation;

    resultDiv.classList.add('visible');
}
