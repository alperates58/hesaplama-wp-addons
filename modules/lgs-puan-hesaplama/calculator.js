function hcLgsGetNet(dId, yId) {
    const d = parseInt(document.getElementById(dId).value) || 0;
    const y = parseInt(document.getElementById(yId).value) || 0;
    return Math.max(0, d - (y / 3));
}

function hcLgsHesapla() {
    const tur = hcLgsGetNet('hc-lgs-tur', 'hc-lgs-tur-y');
    const mat = hcLgsGetNet('hc-lgs-mat', 'hc-lgs-mat-y');
    const fen = hcLgsGetNet('hc-lgs-fen', 'hc-lgs-fen-y');
    const ink = hcLgsGetNet('hc-lgs-ink', 'hc-lgs-ink-y');
    const din = hcLgsGetNet('hc-lgs-din', 'hc-lgs-din-y');
    const ing = hcLgsGetNet('hc-lgs-ing', 'hc-lgs-ing-y');

    // Tahmini Katsayılar (2026)
    const base = 197.5;
    const pTur = tur * 4.3;
    const pMat = mat * 4.3;
    const pFen = fen * 4.3;
    const pInk = ink * 1.6;
    const pDin = din * 1.6;
    const pIng = ing * 1.6;

    let score = base + pTur + pMat + pFen + pInk + pDin + pIng;
    if (score > 500) score = 500;

    document.getElementById('hc-lgs-val').innerText = score.toFixed(4);
    document.getElementById('hc-lgs-result').classList.add('visible');
}
