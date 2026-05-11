function hcCompPowerHesapla() {
    const qMin = parseFloat(document.getElementById('hc-cp-q').value);
    const p1 = parseFloat(document.getElementById('hc-cp-p1').value);
    const p2 = parseFloat(document.getElementById('hc-cp-p2').value);
    const eta = parseFloat(document.getElementById('hc-cp-eta').value);
    const k = 1.4; // Adiabatic index for air

    if (isNaN(qMin) || isNaN(p1) || isNaN(p2) || isNaN(eta) || p1 <= 0 || p2 <= p1 || eta <= 0) {
        alert('Lütfen geçerli değerler girin. P2 > P1 olmalıdır.');
        return;
    }

    // Q in m3/s
    const qSec = qMin / 60;
    
    // P1, P2 in Pascal
    const p1Pa = p1 * 100000;
    const p2Pa = p2 * 100000;

    // Adiabatic Power P = (k/(k-1)) * P1 * Q * [(P2/P1)^((k-1)/k) - 1] / eta
    const factor = k / (k - 1);
    const ratio = Math.pow(p2 / p1, (k - 1) / k);
    const powerWatt = (factor * p1Pa * qSec * (ratio - 1)) / eta;
    const powerKw = powerWatt / 1000;

    document.getElementById('hc-cp-res-val').innerText = powerKw.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kW';
    document.getElementById('hc-cp-res-hp').innerText = (powerKw * 1.341).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' HP';
    
    document.getElementById('hc-cp-result').classList.add('visible');
}
