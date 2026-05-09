function hcCSHesapla() {
    const angleDeg = parseFloat(document.getElementById('hc-cs-angle').value);
    const initialWave = parseFloat(document.getElementById('hc-cs-wave').value);

    if (isNaN(angleDeg)) {
        alert('Lütfen geçerli bir açı giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    const lambdaC = 2.4263102367e-12; // Electron Compton wavelength in meters

    const deltaLambda = lambdaC * (1 - Math.cos(rad));
    const deltaLambdaPm = deltaLambda * 1e12;

    document.getElementById('hc-cs-shift').innerText = deltaLambdaPm.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' pm';

    if (!isNaN(initialWave) && initialWave > 0) {
        const newWave = initialWave + deltaLambdaPm;
        document.getElementById('hc-cs-new-wave').innerText = newWave.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' pm';
        document.getElementById('hc-cs-new-wave-group').style.display = 'block';
    } else {
        document.getElementById('hc-cs-new-wave-group').style.display = 'none';
    }

    document.getElementById('hc-cs-result').classList.add('visible');
}
