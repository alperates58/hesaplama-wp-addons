function hcMseHesapla() {
    const actualText = document.getElementById('hc-mse-actual').value.trim();
    const predictedText = document.getElementById('hc-mse-predicted').value.trim();
    const resultDiv = document.getElementById('hc-ortalama-kare-hata-hesaplama-result');

    if (!actualText || !predictedText) {
        alert('Lütfen her iki veri setini de giriniz.');
        return;
    }

    const actuals = actualText.split(/[,;\s\n\t]+/).map(n => parseFloat(n)).filter(n => !isNaN(n));
    const predicteds = predictedText.split(/[,;\s\n\t]+/).map(n => parseFloat(n)).filter(n => !isNaN(n));

    if (actuals.length !== predicteds.length || actuals.length === 0) {
        alert('Her iki veri seti eşit sayıda eleman içermelidir.');
        return;
    }

    const n = actuals.length;
    let sumSqErr = 0;
    for (let i = 0; i < n; i++) {
        sumSqErr += Math.pow(actuals[i] - predicteds[i], 2);
    }

    const mse = sumSqErr / n;
    const rmse = Math.sqrt(mse);

    document.getElementById('hc-mse-res-value').innerText = mse.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-mse-res-rmse').innerText = `RMSE (Kök Ortalama Kare Hata): ${rmse.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;

    resultDiv.classList.add('visible');
}
