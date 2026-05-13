function hcPDeğeriHesapla() {
    const z = parseFloat(document.getElementById('hc-p-z').value);
    const tail = document.getElementById('hc-p-tail').value;
    const resultDiv = document.getElementById('hc-p-degeri-hesaplama-result');

    if (isNaN(z)) {
        alert('Lütfen bir Z-skoru giriniz.');
        return;
    }

    // Standard Normal CDF approximation (Abramowitz and Stegun)
    function normalCDF(x) {
        const t = 1 / (1 + 0.2316419 * Math.abs(x));
        const d = 0.3989423 * Math.exp(-x * x / 2);
        const p = d * t * (0.3193815 + t * (-0.3565638 + t * (1.781478 + t * (-1.821256 + t * 1.330274))));
        return x > 0 ? 1 - p : p;
    }

    let pValue;
    const cdf = normalCDF(z);

    if (tail === 'left') {
        pValue = cdf;
    } else if (tail === 'right') {
        pValue = 1 - cdf;
    } else { // two-tailed
        pValue = 2 * (1 - normalCDF(Math.abs(z)));
    }

    document.getElementById('hc-p-res-value').innerText = pValue.toLocaleString('tr-TR', {maximumFractionDigits: 6});
    
    let sigText = "";
    if (pValue < 0.01) sigText = "Sonuç istatistiksel olarak çok anlamlı (p < 0.01).";
    else if (pValue < 0.05) sigText = "Sonuç istatistiksel olarak anlamlı (p < 0.05).";
    else if (pValue < 0.1) sigText = "Sonuç zayıf anlamlı veya eğilim gösteriyor (p < 0.10).";
    else sigText = "Sonuç istatistiksel olarak anlamlı değil (p >= 0.05).";
    
    document.getElementById('hc-p-significance').innerText = sigText;

    resultDiv.classList.add('visible');
}
