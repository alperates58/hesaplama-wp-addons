function hcTuzlulukHesapla() {
    const ec = parseFloat(document.getElementById('hc-sl-ec').value);

    if (!ec) return;

    // Simplified EC to ppt conversion for seawater-like samples
    // Salinity (ppt) ≈ EC (μS/cm) * 0.00064
    const salinity = ec * 0.00067; // approx factor

    document.getElementById('hc-sl-val').innerText = salinity.toFixed(2) + ' ppt (g/L)';
    document.getElementById('hc-sl-result').classList.add('visible');
}
