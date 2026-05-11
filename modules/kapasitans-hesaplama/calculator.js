function hcCapacitanceHesapla() {
    const areaCm2 = parseFloat(document.getElementById('hc-cc-area').value);
    const distMm = parseFloat(document.getElementById('hc-cc-dist').value);
    const epsR = parseFloat(document.getElementById('hc-cc-eps').value);
    const eps0 = 8.854187e-12; // Farad/m

    if (isNaN(areaCm2) || isNaN(distMm) || areaCm2 <= 0 || distMm <= 0) {
        alert('Lütfen geçerli alan ve uzaklık değerleri girin.');
        return;
    }

    // Convert to meters
    const areaM2 = areaCm2 / 10000;
    const distM = distMm / 1000;

    // C = epsilon_r * epsilon_0 * (A / d)
    const capFarad = epsR * eps0 * (areaM2 / distM);
    
    const capPf = capFarad * 1e12;
    const capUf = capFarad * 1e6;

    document.getElementById('hc-cc-res-val').innerText = capPf.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' pF';
    document.getElementById('hc-cc-res-uf').innerText = capUf.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' μF';
    
    document.getElementById('hc-cc-result').classList.add('visible');
}
