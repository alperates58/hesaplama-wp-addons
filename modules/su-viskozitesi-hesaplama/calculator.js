function hcWaterViscHesapla() {
    const t = parseFloat(document.getElementById('hc-wv-temp').value) || 0;

    // Vogel empirical formula for dynamic viscosity of water
    // mu = A * 10^(B / (T - C)) -> units in cP
    // For water: A = 0.02414, B = 247.8, C = 140
    // Simplified approximation for 0-100C:
    const muCp = 0.02414 * Math.pow(10, 247.8 / (t + 273.15 - 140));
    const muPas = muCp / 1000;

    // Kinematic viscosity (nu = mu / rho)
    // rho approx = 1000 kg/m3 (simplified)
    const nu = muPas / 1000;

    document.getElementById('hc-res-wv-dyn').innerText = muPas.toExponential(4) + ' Pa·s';
    document.getElementById('hc-res-wv-kin').innerText = nu.toExponential(4) + ' m²/s';
    
    document.getElementById('hc-water-visc-result').classList.add('visible');
}
