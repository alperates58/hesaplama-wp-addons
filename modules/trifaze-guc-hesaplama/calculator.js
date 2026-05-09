function hcThreePhasePowerHesapla() {
    const v = parseFloat(document.getElementById('hc-tpg-v').value) || 0;
    const i = parseFloat(document.getElementById('hc-tpg-i').value) || 0;
    const pf = parseFloat(document.getElementById('hc-tpg-pf').value) || 0.85;

    // S = sqrt(3) * V * I
    const s = Math.sqrt(3) * v * i;
    const sKva = s / 1000;

    // P = S * cosPhi
    const p = s * pf;
    const pKw = p / 1000;

    document.getElementById('hc-res-tpg-p').innerText = pKw.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kW';
    document.getElementById('hc-res-tpg-s').innerText = sKva.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kVA';
    
    document.getElementById('hc-three-phase-power-result').classList.add('visible');
}
