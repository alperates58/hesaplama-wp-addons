function hcKalpRiskiSkoruHesapla() {
    const age = parseFloat(document.getElementById('hc-hs-age').value);
    const chol = parseFloat(document.getElementById('hc-hs-chol').value);
    const sbp = parseFloat(document.getElementById('hc-hs-sbp').value);

    if (!age || !chol || !sbp) return;

    let riskFactor = 0;
    if (age > 50) riskFactor += 1;
    if (chol > 155) riskFactor += 1;
    if (sbp > 140) riskFactor += 1;

    let status = "Düşük";
    if (riskFactor === 3) status = "Çok Yüksek";
    else if (riskFactor === 2) status = "Yüksek";
    else if (riskFactor === 1) status = "Orta";

    document.getElementById('hc-hs-stats').innerHTML = `
        Risk Kriterleri: <strong>${riskFactor} / 3</strong><br>
        Durum: <strong>${status} Risk</strong><br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Bu hızlı bir tarama skorudur. Detaylı analiz için hekiminize başvurun.</p>
    `;
    document.getElementById('hc-hs-result').classList.add('visible');
}
