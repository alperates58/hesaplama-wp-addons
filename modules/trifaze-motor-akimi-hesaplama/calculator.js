function hcThreePhaseAmpHesapla() {
    const pKw = parseFloat(document.getElementById('hc-tma-p').value) || 0;
    const v = parseFloat(document.getElementById('hc-tma-v').value) || 400;
    const pf = parseFloat(document.getElementById('hc-tma-pf').value) || 0.85;
    const eff = parseFloat(document.getElementById('hc-tma-eff').value) || 90;

    if (v <= 0 || pf <= 0 || eff <= 0) return;

    const pWatts = pKw * 1000;
    // I = P / (sqrt(3) * V * cosPhi * eta)
    const i = pWatts / (Math.sqrt(3) * v * pf * (eff / 100));

    document.getElementById('hc-res-tma-val').innerText = i.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Amper';
    document.getElementById('hc-three-phase-amp-result').classList.add('visible');
}
