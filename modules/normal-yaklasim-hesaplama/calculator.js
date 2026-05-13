function hcNormalYaklasimHesapla() {
    const n = parseInt(document.getElementById('hc-ny-n').value);
    const p = parseFloat(document.getElementById('hc-ny-p').value);
    const x = parseFloat(document.getElementById('hc-ny-x').value);
    const resultDiv = document.getElementById('hc-normal-yaklasim-hesaplama-result');

    if (isNaN(n) || isNaN(p) || isNaN(x) || n <= 0 || p < 0 || p > 1 || x < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const mu = n * p;
    const sigma = Math.sqrt(n * p * (1 - p));

    if (sigma === 0) {
        alert('Varyans sıfır. Hesaplama yapılamaz.');
        return;
    }

    // Continuity correction for P(X <= x)
    const xCorrected = x + 0.5;
    const z = (xCorrected - mu) / sigma;

    function normalCDF(val) {
        const t = 1 / (1 + 0.2316419 * Math.abs(val));
        const d = 0.3989423 * Math.exp(-val * val / 2);
        const res = d * t * (0.3193815 + t * (-0.3565638 + t * (1.781478 + t * (-1.821256 + t * 1.330274))));
        return val > 0 ? 1 - res : res;
    }

    const prob = normalCDF(z);

    document.getElementById('hc-ny-params').innerHTML = `Ortalama (μ): ${mu.toLocaleString('tr-TR', {maximumFractionDigits: 2})} | Std. Sapma (σ): ${sigma.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;
    document.getElementById('hc-ny-res-prob').innerHTML = `P(X ≤ ${x}) Olasılığı: <strong>%${(prob * 100).toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;
    
    let condition = (n * p >= 5 && n * (1 - p) >= 5) ? "Yaklaşım koşulları (np ≥ 5, nq ≥ 5) sağlanmaktadır." : "Dikkat: Örneklem büyüklüğü normal yaklaşım için yetersiz olabilir.";
    document.getElementById('hc-ny-res-desc').innerText = condition;

    resultDiv.classList.add('visible');
}
