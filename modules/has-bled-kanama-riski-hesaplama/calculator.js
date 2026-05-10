function hcHASBLEDHesapla() {
    const checks = document.querySelectorAll('.hc-hb-check');
    let score = 0;
    checks.forEach(c => { if(c.checked) score++; });

    let risk = "Düşük (%1.1)";
    if (score >= 3) risk = "Yüksek (Dikkatli İzlem Gerekir)";
    else if (score === 2) risk = "Orta (%1.9)";
    else if (score === 1) risk = "Düşük (%1.0)";

    document.getElementById('hc-hb-stats').innerHTML = `
        HAS-BLED Skoru: <strong>${score}</strong><br>
        Risk Durumu: <strong>${risk}</strong><br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Skor ≥ 3 olması yüksek kanama riskini gösterir.</p>
    `;
    document.getElementById('hc-hb-result').classList.add('visible');
}
