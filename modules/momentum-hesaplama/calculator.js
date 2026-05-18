function hcMomentumHesapla() {
    const m = parseFloat(document.getElementById('hc-mom-mass').value);
    const vVal = parseFloat(document.getElementById('hc-mom-v').value);
    const vUnit = document.getElementById('hc-mom-v-unit').value;

    if (isNaN(m) || isNaN(vVal) || m <= 0 || vVal < 0) {
        alert('Lütfen geçerli kütle ve hız değerleri giriniz.');
        return;
    }

    // Hızı m/s ye çevirme
    let v = vVal;
    if (vUnit === 'kms') {
        v = vVal / 3.6;
    }

    // p = m * v
    const p = m * v;

    // Ke = 0.5 * m * v^2
    const ke = 0.5 * m * Math.pow(v, 2);

    // de Broglie wavelength lambda = h / p (h = 6.62607015e-34 J s)
    const h = 6.62607015e-34;
    const lambda = p > 0 ? (h / p) : 0;

    document.getElementById('hc-mom-val').innerText = p.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg·m/s';
    document.getElementById('hc-mom-ke-val').innerText = ke.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' J';
    
    let lambdaStr = '-';
    if (lambda > 0) {
        lambdaStr = lambda.toExponential(4).replace('e-', ' &times; 10^-') + ' m';
    }
    document.getElementById('hc-mom-debroglie-val').innerHTML = lambdaStr;

    document.getElementById('hc-momentum-result').classList.add('visible');
}
