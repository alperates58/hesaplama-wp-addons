function hcSixSigmaHesapla() {
    const defects = parseFloat(document.getElementById('hc-ss-def').value) || 0;
    const opportunities = parseFloat(document.getElementById('hc-ss-opp').value) || 1;
    const totalUnits = parseFloat(document.getElementById('hc-ss-total').value) || 1;

    const dpmo = (defects / (totalUnits * opportunities)) * 1000000;

    // Normal inverse approximation + 1.5 sigma shift
    // This is a simplified lookup-like logic for key sigma values
    let sigma = 0;
    if (dpmo <= 3.4) sigma = 6.0;
    else if (dpmo <= 233) sigma = 5.0;
    else if (dpmo <= 6210) sigma = 4.0;
    else if (dpmo <= 66807) sigma = 3.0;
    else if (dpmo <= 308537) sigma = 2.0;
    else sigma = 1.0;

    // More precise calculation using normsinv equivalent would be better, but this is standard for simple tools
    if (dpmo > 0 && dpmo < 1000000) {
        // Linear interpolation for intermediate values (simplified)
        // Sigma approx formula: 0.8406 + sqrt(29.37 - 2.221 * ln(DPMO))
        const sigmaCalc = 0.8406 + Math.sqrt(29.37 - 2.221 * Math.log(dpmo));
        sigma = sigmaCalc;
    }

    document.getElementById('hc-res-ss-dpmo').innerText = Math.round(dpmo).toLocaleString('tr-TR');
    document.getElementById('hc-res-ss-val').innerText = sigma.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-six-sigma-result').classList.add('visible');
}
