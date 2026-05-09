function hcTurbinePowerHesapla() {
    const q = parseFloat(document.getElementById('hc-tp-q').value) || 0;
    const h = parseFloat(document.getElementById('hc-tp-h').value) || 0;
    const eff = parseFloat(document.getElementById('hc-tp-eff').value) || 90;
    const rho = 1000; // Density of water
    const g = 9.81; // Gravity

    // P = eta * rho * g * Q * H
    const pWatts = (eff / 100) * rho * g * q * h;
    const pKw = pWatts / 1000;

    document.getElementById('hc-res-tp-val').innerText = pKw.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kW';
    document.getElementById('hc-turbine-power-result').classList.add('visible');
}
