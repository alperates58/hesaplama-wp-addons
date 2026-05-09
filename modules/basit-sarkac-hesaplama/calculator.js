function hcBSHesapla() {
    const l = parseFloat(document.getElementById('hc-bs-len').value);
    const g = parseFloat(document.getElementById('hc-bs-g').value);

    if (isNaN(l) || isNaN(g) || l <= 0 || g <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // T = 2 * PI * SQRT(L / g)
    const period = 2 * Math.PI * Math.sqrt(l / g);

    document.getElementById('hc-bs-val').innerText = period.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' s';
    document.getElementById('hc-bs-result').classList.add('visible');
}
