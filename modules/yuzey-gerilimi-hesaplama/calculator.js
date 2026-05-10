function hcYüzeyGerilimiHesapla() {
    const h = parseFloat(document.getElementById('hc-st-h').value) / 1000; // m
    const r = parseFloat(document.getElementById('hc-st-r').value) / 1000; // m
    const rho = parseFloat(document.getElementById('hc-st-rho').value) * 1000; // kg/m3
    const g = 9.81;

    if (!h || !r || !rho) return;

    // γ = 1/2 * rho * g * r * h
    const gamma = 0.5 * rho * g * r * h; // N/m

    document.getElementById('hc-st-val').innerText = (gamma * 1000).toFixed(2) + ' mN/m';
    document.getElementById('hc-st-result').classList.add('visible');
}
