function hcCVDRiskiHesapla() {
    const age = parseFloat(document.getElementById('hc-cv-age').value);
    const smoke = document.getElementById('hc-cv-smoke').checked;
    const dm = document.getElementById('hc-cv-dm').checked;
    const ht = document.getElementById('hc-cv-ht').checked;

    if (!age) return;

    let points = 0;
    if (age > 45) points += 2;
    if (age > 60) points += 3;
    if (smoke) points += 3;
    if (dm) points += 4;
    if (ht) points += 2;

    let risk = "Düşük";
    if (points > 10) risk = "Çok Yüksek";
    else if (points > 6) risk = "Yüksek";
    else if (points > 3) risk = "Orta";

    document.getElementById('hc-cv-stats').innerHTML = `
        Risk Skoru: <strong>${points}</strong><br>
        Tahmini Risk Seviyesi: <strong>${risk}</strong><br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Bu basitleştirilmiş bir değerlendirmedir. Kesin risk için Framingham veya SCORE gibi klinik testler gereklidir.</p>
    `;
    document.getElementById('hc-cv-result').classList.add('visible');
}
