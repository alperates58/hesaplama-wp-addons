function hcACHesapla() {
    const lambdaNm = parseFloat(document.getElementById('hc-ac-wave').value);
    const diamMm = parseFloat(document.getElementById('hc-ac-diam').value);

    if (isNaN(lambdaNm) || isNaN(diamMm) || lambdaNm <= 0 || diamMm <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const lambdaM = lambdaNm * 1e-9;
    const diamM = diamMm * 1e-3;

    // Rayleigh criterion: theta = 1.22 * lambda / D (in radians)
    const thetaRad = 1.22 * (lambdaM / diamM);
    const thetaArcsec = thetaRad * (180 / Math.PI) * 3600;

    document.getElementById('hc-ac-val').innerText = thetaArcsec.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' arcsec';
    document.getElementById('hc-ac-result').classList.add('visible');
}
