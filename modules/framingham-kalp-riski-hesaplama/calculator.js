function hcFraminghamHesapla() {
    const gender = document.getElementById('hc-fr-gender').value;
    const age = parseFloat(document.getElementById('hc-fr-age').value);
    const tc = parseFloat(document.getElementById('hc-fr-tc').value);
    const hdl = parseFloat(document.getElementById('hc-fr-hdl').value);
    const sbp = parseFloat(document.getElementById('hc-fr-sbp').value);
    const smoke = document.getElementById('hc-fr-smoke').checked;
    const htMed = document.getElementById('hc-fr-ht-med').checked;

    if (!age || !tc || !hdl || !sbp) return;

    let score = 0;

    if (gender === 'male') {
        // Age
        if (age < 35) score -= 9; else if (age < 40) score -= 4; else if (age < 45) score += 0; else if (age < 50) score += 3; else if (age < 55) score += 6; else if (age < 60) score += 8; else if (age < 65) score += 10; else if (age < 70) score += 11; else if (age < 75) score += 12; else score += 13;
        // TC
        if (tc < 160) score += 0; else if (tc < 200) score += 4; else if (tc < 240) score += 7; else if (tc < 280) score += 9; else score += 11;
        // Smoke
        if (smoke) score += 8;
        // HDL
        if (hdl >= 60) score -= 1; else if (hdl >= 50) score += 0; else if (hdl >= 40) score += 1; else score += 2;
        // SBP
        if (sbp < 120) score += (htMed ? 0 : 0); else if (sbp < 130) score += (htMed ? 1 : 0); else if (sbp < 140) score += (htMed ? 2 : 1); else if (sbp < 160) score += (htMed ? 2 : 2); else score += (htMed ? 3 : 3);
    } else {
        // Female (Simplified points)
        if (age < 35) score -= 7; else if (age < 45) score += 0; else if (age < 55) score += 7; else if (age < 65) score += 12; else score += 16;
        if (tc >= 240) score += 8; else if (tc >= 200) score += 4;
        if (smoke) score += 9;
        if (hdl < 40) score += 2;
        if (sbp >= 140) score += 3;
    }

    let risk = "Düşük";
    if (score > 15) risk = "> %20 (Yüksek)";
    else if (score > 10) risk = "%10 - %20 (Orta)";
    else risk = "< %10 (Düşük)";

    document.getElementById('hc-fr-stats').innerHTML = `
        Framingham Puanı: <strong>${score}</strong><br>
        10 Yıllık Risk: <strong>${risk}</strong><br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Bu hesaplama klasik Framingham kriterlerine dayanır. Profesyonel tıbbi tavsiye yerine geçmez.</p>
    `;
    document.getElementById('hc-fr-result').classList.add('visible');
}
