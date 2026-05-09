function hcFootingBearingHesapla() {
    const c = parseFloat(document.getElementById('hc-fb-c').value) || 0;
    const phi = parseFloat(document.getElementById('hc-fb-phi').value) || 0;
    const gamma = parseFloat(document.getElementById('hc-fb-gamma').value) || 0;
    const B = parseFloat(document.getElementById('hc-fb-b').value) || 1;
    const Df = parseFloat(document.getElementById('hc-fb-df').value) || 0;

    // Terzaghi Bearing Capacity Factors (simplified table/approx)
    const phiRad = (phi * Math.PI) / 180;
    const Nq = Math.pow(Math.tan(Math.PI / 4 + phiRad / 2), 2) * Math.exp(Math.PI * Math.tan(phiRad));
    const Nc = (phi === 0) ? 5.14 : (Nq - 1) / Math.tan(phiRad);
    const Ny = 2 * (Nq + 1) * Math.tan(phiRad); // Vesic approximation for Ny

    const q = gamma * Df;
    // qult = c*Nc + q*Nq + 0.5*gamma*B*Ny
    const qult = (c * Nc) + (q * Nq) + (0.5 * gamma * B * Ny);

    document.getElementById('hc-res-fb-val').innerText = Math.round(qult).toLocaleString('tr-TR') + ' kPa';
    document.getElementById('hc-footing-bearing-result').classList.add('visible');
}
