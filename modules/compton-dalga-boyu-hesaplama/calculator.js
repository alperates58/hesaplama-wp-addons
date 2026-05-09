function hcCDBToggle() {
    const type = document.getElementById('hc-cdb-type').value;
    document.getElementById('hc-cdb-mass-group').style.display = type === 'custom' ? 'block' : 'none';
}

function hcCDBHesapla() {
    const type = document.getElementById('hc-cdb-type').value;
    let m = 0;

    if (type === 'custom') {
        m = parseFloat(document.getElementById('hc-cdb-mass').value);
    } else {
        m = parseFloat(type);
    }

    if (isNaN(m) || m <= 0) {
        alert('Lütfen geçerli bir kütle değeri giriniz.');
        return;
    }

    const h = 6.62607015e-34; // Planck constant
    const c = 299792458; // Speed of light

    const lambda = h / (m * c);

    // Convert to picometers for readability if small
    let resultText = "";
    if (lambda < 1e-9) {
        resultText = (lambda * 1e12).toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' pm';
    } else {
        resultText = lambda.toExponential(4) + ' m';
    }

    document.getElementById('hc-cdb-val').innerText = resultText;
    document.getElementById('hc-cdb-result').classList.add('visible');
}
