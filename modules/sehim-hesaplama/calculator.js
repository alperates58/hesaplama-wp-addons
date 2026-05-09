function hcDeflectionHesapla() {
    const pKn = parseFloat(document.getElementById('hc-sd-p').value) || 0;
    const lM = parseFloat(document.getElementById('hc-sd-l').value) || 0;
    const eGpa = parseFloat(document.getElementById('hc-sd-e').value) || 1;
    const iCm4 = parseFloat(document.getElementById('hc-sd-i').value) || 1;

    // Convert to SI: N, m, Pa, m^4
    const p = pKn * 1000;
    const l = lM;
    const e = eGpa * 1e9;
    const i = iCm4 * 1e-8; // cm4 to m4: 1e-8

    // Delta = (P * L^3) / (48 * E * I)
    const deltaM = (p * Math.pow(l, 3)) / (48 * e * i);
    const deltaMm = deltaM * 1000;

    document.getElementById('hc-res-sd-val').innerText = deltaMm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mm';
    document.getElementById('hc-deflection-result').classList.add('visible');
}
