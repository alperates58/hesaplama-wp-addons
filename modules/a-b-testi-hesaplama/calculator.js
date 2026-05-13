function hcABTestHesapla() {
    const visA = parseFloat(document.getElementById('hc-ab-vis-a').value);
    const convA = parseFloat(document.getElementById('hc-ab-conv-a').value);
    const visB = parseFloat(document.getElementById('hc-ab-vis-b').value);
    const convB = parseFloat(document.getElementById('hc-ab-conv-b').value);

    if (isNaN(visA) || isNaN(convA) || isNaN(visB) || isNaN(convB) || visA <= 0 || visB <= 0) {
        alert('Lütfen geçerli ziyaretçi ve dönüşüm sayıları girin.');
        return;
    }

    const crA = convA / visA;
    const crB = convB / visB;
    const lift = (crB - crA) / crA;

    const pCombined = (convA + convB) / (visA + visB);
    const se = Math.sqrt(pCombined * (1 - pCombined) * (1 / visA + 1 / visB));
    const z = (crB - crA) / se;

    // Standard Normal CDF approximation
    function normalCDF(z) {
        const t = 1 / (1 + 0.2316419 * Math.abs(z));
        const d = 0.3989423 * Math.exp(-z * z / 2);
        const p = d * t * (0.3193815 + t * (-0.3565638 + t * (1.7814779 + t * (-1.8212560 + t * 1.3302744))));
        return z > 0 ? 1 - p : p;
    }

    const pValue = 1 - normalCDF(Math.abs(z));
    const confidence = (1 - (pValue * 2)) * 100; // Two-tailed

    const fmtPct = (val) => (val * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '%';

    document.getElementById('hc-res-ab-cra').innerText = fmtPct(crA);
    document.getElementById('hc-res-ab-crb').innerText = fmtPct(crB);
    document.getElementById('hc-res-ab-lift').innerText = (lift > 0 ? '+' : '') + fmtPct(lift);
    document.getElementById('hc-res-ab-conf').innerText = '%' + Math.max(0, confidence).toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    let desc = "";
    if (confidence >= 95) {
        desc = "Sonuç İstatistiksel Olarak Anlamlı! Versiyon B, Versiyon A'dan farklı performans gösteriyor.";
        document.getElementById('hc-res-ab-desc').style.color = "#27ae60";
    } else {
        desc = "Sonuç Anlamlı Değil. Daha fazla veri toplanması gerekebilir veya fark tesadüfi olabilir.";
        document.getElementById('hc-res-ab-desc').style.color = "#e67e22";
    }
    document.getElementById('hc-res-ab-desc').innerText = desc;

    document.getElementById('hc-a-b-testi-hesaplama-result').classList.add('visible');
}
