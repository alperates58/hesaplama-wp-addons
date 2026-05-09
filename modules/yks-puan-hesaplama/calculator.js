function hcYksGetNet(dId, yId) {
    const d = parseInt(document.getElementById(dId).value) || 0;
    const y = parseInt(document.getElementById(yId).value) || 0;
    return Math.max(0, d - (y / 4));
}

function hcYksHesapla() {
    // TYT Nets
    const tTur = hcYksGetNet('hc-yks-tyt-tur', 'hc-yks-tyt-tur-y');
    const tMat = hcYksGetNet('hc-yks-tyt-mat', 'hc-yks-tyt-mat-y');
    const tSos = hcYksGetNet('hc-yks-tyt-sos', 'hc-yks-tyt-sos-y');
    const tFen = hcYksGetNet('hc-yks-tyt-fen', 'hc-yks-tyt-fen-y');

    // AYT Nets
    const aMat = hcYksGetNet('hc-yks-ayt-mat', 'hc-yks-ayt-mat-y');
    const aEd = hcYksGetNet('hc-yks-ayt-ed', 'hc-yks-ayt-ed-y');
    const aSos2 = hcYksGetNet('hc-yks-ayt-sos2', 'hc-yks-ayt-sos2-y');
    const aFen = hcYksGetNet('hc-yks-ayt-fen', 'hc-yks-ayt-fen-y');

    const diploma = parseFloat(document.getElementById('hc-yks-diploma').value) || 0;
    const obp = diploma * 5 * 0.12;

    // Tahmini Katsayılar (2026)
    // TYT Base: 100
    const tytRaw = 100 + (tTur * 3.3) + (tMat * 3.3) + (tSos * 3.4) + (tFen * 3.4);
    
    // AYT SAY: TYT + (Mat * 3 + Fizik * 2.85 + Kimya * 3.07 + Biyo * 3.07) -> Approx coefficients
    // Simplified: TYT * 0.4 + AYT_Section * 0.6
    // Standard approach: 100 (Base) + TYT_Contrib + AYT_Contrib
    
    const sayRaw = 100 + (tTur * 1.32) + (tMat * 1.32) + (tSos * 1.36) + (tFen * 1.36) + (aMat * 3.0) + (aFen * 3.0);
    const sozRaw = 100 + (tTur * 1.32) + (tMat * 1.32) + (tSos * 1.36) + (tFen * 1.36) + (aEd * 3.0) + (aSos2 * 3.0);
    const eaRaw = 100 + (tTur * 1.32) + (tMat * 1.32) + (tSos * 1.36) + (tFen * 1.36) + (aMat * 3.0) + (aEd * 3.0);

    document.getElementById('hc-yks-res-tyt').innerText = (tytRaw + obp).toFixed(3);
    document.getElementById('hc-yks-res-say').innerText = (sayRaw + obp).toFixed(3);
    document.getElementById('hc-yks-res-soz').innerText = (sozRaw + obp).toFixed(3);
    document.getElementById('hc-yks-res-ea').innerText = (eaRaw + obp).toFixed(3);

    document.getElementById('hc-yks-result').classList.add('visible');
}
