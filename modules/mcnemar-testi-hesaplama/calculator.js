function hcMcNemarHesapla() {
    const b = parseFloat(document.getElementById('hc-mc-b').value) || 0;
    const c = parseFloat(document.getElementById('hc-mc-c').value) || 0;
    const resultDiv = document.getElementById('hc-mcnemar-testi-hesaplama-result');

    if (b + c === 0) {
        alert('Değişim gösteren (b ve c) hücrelerinin toplamı sıfır olamaz.');
        return;
    }

    // Chi-square with Yates' continuity correction
    const chiSq = Math.pow(Math.abs(b - c) - 1, 2) / (b + c);

    // Approximate p-value for df=1
    function chiSqPValue(x) {
        if (x <= 0) return 1;
        const k = 1; // df
        // Basic approximation for p-value
        const t = 1 / (1 + 0.2316419 * Math.sqrt(x));
        const d = 0.3989423 * Math.exp(-x / 2) / Math.sqrt(x);
        const p = d * t * (0.3193815 + t * (-0.3565638 + t * (1.781478 + t * (-1.821256 + t * 1.330274))));
        return p;
    }

    const pVal = chiSqPValue(chiSq);

    document.getElementById('hc-mc-res-chi').innerHTML = `Chi-Kare Değeri: <strong>${chiSq.toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;
    document.getElementById('hc-mc-res-p').innerHTML = `P-Değeri: <strong>${pVal.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</strong>`;
    
    let desc = pVal < 0.05 ? "Değişim istatistiksel olarak anlamlıdır (p < 0.05)." : "Değişim istatistiksel olarak anlamlı değildir (p ≥ 0.05).";
    document.getElementById('hc-mc-res-desc').innerText = desc;

    resultDiv.classList.add('visible');
}
