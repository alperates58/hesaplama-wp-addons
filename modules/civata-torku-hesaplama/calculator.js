function hcCTHesapla() {
    const d = parseFloat(document.getElementById('hc-ct-diam').value);
    const grade = parseFloat(document.getElementById('hc-ct-grade').value);
    const k = parseFloat(document.getElementById('hc-ct-lub').value);

    // Yield strength (roughly): Grade X.Y -> X * Y * 10 MPa
    // Proof load area (approximate for metric)
    const areas = {
        6: 20.1, 8: 36.6, 10: 58.0, 12: 84.3, 14: 115, 16: 157, 20: 245, 24: 353
    };

    const yieldStrength = (grade * 10 * Math.floor(grade)) * 0.9; // Simplified
    const forceN = yieldStrength * areas[d] * 0.75; // 75% of yield
    
    // T = K * D * P (D in meters, P in Newtons)
    const torkNm = k * (d / 1000) * forceN;

    document.getElementById('hc-ct-val').innerText = torkNm.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Nm';
    document.getElementById('hc-ct-result').classList.add('visible');
}
