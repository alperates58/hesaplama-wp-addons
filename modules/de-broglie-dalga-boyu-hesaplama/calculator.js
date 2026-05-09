function hcDBDHesapla() {
    const m = parseFloat(document.getElementById('hc-dbd-mass').value);
    const v = parseFloat(document.getElementById('hc-dbd-v').value);

    if (isNaN(m) || isNaN(v) || m <= 0 || v <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const h = 6.62607015e-34;
    const lambda = h / (m * v);

    let resultText = "";
    if (lambda < 1e-9) {
        resultText = (lambda * 1e12).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' pm';
    } else if (lambda < 1e-6) {
        resultText = (lambda * 1e9).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' nm';
    } else {
        resultText = lambda.toExponential(4) + ' m';
    }

    document.getElementById('hc-dbd-val').innerText = resultText;
    document.getElementById('hc-dbd-result').classList.add('visible');
}
