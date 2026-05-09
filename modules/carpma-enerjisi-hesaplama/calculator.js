function hcCEHesapla() {
    const m = parseFloat(document.getElementById('hc-ce-mass').value);
    const v = parseFloat(document.getElementById('hc-ce-speed').value);

    if (isNaN(m) || isNaN(v) || m < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // KE = 0.5 * m * v^2
    const energy = 0.5 * m * Math.pow(v, 2);

    document.getElementById('hc-ce-val').innerText = energy.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Joule';
    document.getElementById('hc-ce-result').classList.add('visible');
}
