function hcVaryansHesapla() {
    const dataText = document.getElementById('hc-var-data').value.trim();
    const resultDiv = document.getElementById('hc-populasyon-varyansi-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri setini giriniz.');
        return;
    }

    const numbers = dataText.split(/[,;\s\n\t]+/)
        .map(n => parseFloat(n))
        .filter(n => !isNaN(n));

    const n = numbers.length;
    if (n < 1) {
        alert('Lütfen geçerli sayılar giriniz.');
        return;
    }

    const sum = numbers.reduce((a, b) => a + b, 0);
    const mean = sum / n;

    const squaredDiffs = numbers.map(x => Math.pow(x - mean, 2));
    const variance = squaredDiffs.reduce((a, b) => a + b, 0) / n;
    const stdDev = Math.sqrt(variance);

    document.getElementById('hc-res-variance').innerText = variance.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-res-std-dev').innerText = stdDev.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-res-mean').innerText = mean.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-res-n').innerText = n.toLocaleString('tr-TR');

    resultDiv.classList.add('visible');
}
