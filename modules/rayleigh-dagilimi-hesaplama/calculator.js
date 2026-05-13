function hcRayleighHesapla() {
    const x = parseFloat(document.getElementById('hc-rayleigh-x').value);
    const sigma = parseFloat(document.getElementById('hc-rayleigh-sigma').value);
    const resultDiv = document.getElementById('hc-rayleigh-dagilimi-hesaplama-result');

    if (isNaN(x) || isNaN(sigma) || sigma <= 0) {
        alert('Lütfen geçerli değerler giriniz (σ > 0 olmalıdır).');
        return;
    }

    if (x < 0) {
        const pdf = 0;
        const cdf = 0;
        document.getElementById('hc-rayleigh-pdf').innerHTML = `Olasılık Yoğunluğu (PDF): ${pdf.toLocaleString('tr-TR')}`;
        document.getElementById('hc-rayleigh-cdf').innerHTML = `Birikimli Dağılım (CDF): ${cdf.toLocaleString('tr-TR')}`;
    } else {
        const pdf = (x / (sigma * sigma)) * Math.exp(-(x * x) / (2 * sigma * sigma));
        const cdf = 1 - Math.exp(-(x * x) / (2 * sigma * sigma));
        document.getElementById('hc-rayleigh-pdf').innerHTML = `Olasılık Yoğunluğu (PDF): ${pdf.toLocaleString('tr-TR', {maximumFractionDigits: 6})}`;
        document.getElementById('hc-rayleigh-cdf').innerHTML = `Birikimli Dağılım (CDF): ${cdf.toLocaleString('tr-TR', {maximumFractionDigits: 6})}`;
    }

    const mean = sigma * Math.sqrt(Math.PI / 2);
    document.getElementById('hc-rayleigh-mean').innerHTML = `Dağılım Ortalaması (μ): ${mean.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;

    resultDiv.classList.add('visible');
}
