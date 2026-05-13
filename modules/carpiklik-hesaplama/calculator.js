function hcSkewnessHesapla() {
    const input = document.getElementById('hc-skew-data').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));

    if (data.length < 3) {
        alert('Çarpıklık hesabı için en az 3 veri noktası gereklidir.');
        return;
    }

    const n = data.length;
    const mean = data.reduce((a, b) => a + b, 0) / n;
    
    let sum2 = 0;
    let sum3 = 0;
    
    data.forEach(x => {
        const diff = x - mean;
        sum2 += diff * diff;
        sum3 += diff * diff * diff;
    });

    const variance = sum2 / (n - 1);
    const stdDev = Math.sqrt(variance);

    // Adjusted Fisher-Pearson standardized moment coefficient
    // skew = [n / ((n-1)(n-2))] * sum((x-mean)/stdDev)^3
    const skewness = (n * sum3) / ((n - 1) * (n - 2) * Math.pow(stdDev, 3));

    document.getElementById('hc-res-skew-val').innerText = skewness.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    
    let desc = "";
    if (Math.abs(skewness) < 0.5) desc = "Veri seti simetriğe yakın.";
    else if (skewness > 0) desc = "Pozitif Çarpık (Sağa Kuyruklu).";
    else desc = "Negatif Çarpık (Sola Kuyruklu).";

    document.getElementById('hc-skew-desc').innerText = desc;
    document.getElementById('hc-carpiklik-hesaplama-result').classList.add('visible');
}
