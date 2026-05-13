function hcRegresyonTahminiHesapla() {
    const dataText = document.getElementById('hc-reg-data').value.trim();
    const predictX = parseFloat(document.getElementById('hc-reg-predict-x').value);
    const resultDiv = document.getElementById('hc-regresyon-tahmini-hesaplama-result');
    const formulaDisplay = document.getElementById('hc-reg-formula-display');
    const predictionDisplay = document.getElementById('hc-reg-prediction-value');

    if (!dataText || isNaN(predictX)) {
        alert('Lütfen veri setini ve tahmin edilecek X değerini doğru formatta giriniz.');
        return;
    }

    const rows = dataText.split('\n');
    let n = 0;
    let sumX = 0;
    let sumY = 0;
    let sumXY = 0;
    let sumX2 = 0;

    for (let row of rows) {
        const parts = row.split(/[,;\s\t]+/).filter(p => p.trim() !== '');
        if (parts.length >= 2) {
            const x = parseFloat(parts[0]);
            const y = parseFloat(parts[1]);
            if (!isNaN(x) && !isNaN(y)) {
                n++;
                sumX += x;
                sumY += y;
                sumXY += x * y;
                sumX2 += x * x;
            }
        }
    }

    if (n < 2) {
        alert('En az 2 veri çifti girilmelidir.');
        return;
    }

    const denominator = (n * sumX2 - sumX * sumX);
    if (denominator === 0) {
        alert('Geçersiz veri seti (tüm X değerleri aynı olamaz).');
        return;
    }

    const b = (n * sumXY - sumX * sumY) / denominator;
    const a = (sumY - b * sumX) / n;

    const predictedY = a + b * predictX;

    formulaDisplay.innerHTML = `<strong>Regresyon Denklemi:</strong> ŷ = ${a.toLocaleString('tr-TR', {maximumFractionDigits: 4})} + ${b.toLocaleString('tr-TR', {maximumFractionDigits: 4})}x`;
    predictionDisplay.innerHTML = `Tahmin Edilen Y: ${predictedY.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;

    resultDiv.classList.add('visible');
}
