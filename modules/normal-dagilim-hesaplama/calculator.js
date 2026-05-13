function hcNormalDagilimHesapla() {
    const mu = parseFloat(document.getElementById('hc-nd-mu').value);
    const sigma = parseFloat(document.getElementById('hc-nd-sigma').value);
    const x = parseFloat(document.getElementById('hc-nd-x').value);
    const resultDiv = document.getElementById('hc-normal-dagilim-hesaplama-result');

    if (isNaN(mu) || isNaN(sigma) || isNaN(x) || sigma <= 0) {
        alert('Lütfen geçerli değerler giriniz (σ > 0 olmalıdır).');
        return;
    }

    const z = (x - mu) / sigma;

    function normalPDF(val, m, s) {
        return (1 / (s * Math.sqrt(2 * Math.PI))) * Math.exp(-Math.pow(val - m, 2) / (2 * s * s));
    }

    function standardNormalCDF(val) {
        const t = 1 / (1 + 0.2316419 * Math.abs(val));
        const d = 0.3989423 * Math.exp(-val * val / 2);
        const res = d * t * (0.3193815 + t * (-0.3565638 + t * (1.781478 + t * (-1.821256 + t * 1.330274))));
        return val > 0 ? 1 - res : res;
    }

    const pdf = normalPDF(x, mu, sigma);
    const cdf = standardNormalCDF(z);

    document.getElementById('hc-nd-res-z').innerHTML = `Z-Skoru: <strong>${z.toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;
    document.getElementById('hc-nd-res-pdf').innerHTML = `Olasılık Yoğunluğu (PDF): <strong>${pdf.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</strong>`;
    document.getElementById('hc-nd-res-cdf').innerHTML = `P(X ≤ ${x}) Olasılığı (CDF): <strong>%${(cdf * 100).toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;

    resultDiv.classList.add('visible');
}
