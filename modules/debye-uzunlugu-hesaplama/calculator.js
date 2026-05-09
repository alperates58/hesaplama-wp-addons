function hcDUHesapla() {
    const te = parseFloat(document.getElementById('hc-du-te').value);
    const ne = parseFloat(document.getElementById('hc-du-ne').value);

    if (isNaN(te) || isNaN(ne) || te <= 0 || ne <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const eps0 = 8.8541878128e-12; // Vacuum permittivity
    const kb = 1.380649e-23; // Boltzmann constant
    const e = 1.602176634e-19; // Elementary charge

    // lambda_D = sqrt( (eps0 * kb * Te) / (ne * e^2) )
    const lambdaD = Math.sqrt( (eps0 * kb * te) / (ne * Math.pow(e, 2)) );

    let resultText = "";
    if (lambdaD < 1e-6) {
        resultText = (lambdaD * 1e9).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' nm';
    } else if (lambdaD < 1e-3) {
        resultText = (lambdaD * 1e6).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' µm';
    } else {
        resultText = lambdaD.toExponential(4) + ' m';
    }

    document.getElementById('hc-du-val').innerText = resultText;
    document.getElementById('hc-du-result').classList.add('visible');
}
