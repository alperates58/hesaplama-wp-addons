function hcDRHesapla() {
    const gGpa = parseFloat(document.getElementById('hc-dr-g').value);
    const dMm = parseFloat(document.getElementById('hc-dr-d').value);
    const l = parseFloat(document.getElementById('hc-dr-l').value);

    if (isNaN(gGpa) || isNaN(dMm) || isNaN(l) || l <= 0 || dMm <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const g = gGpa * 1e9; // to Pa
    const d = dMm / 1000; // to m
    
    // J = (PI * d^4) / 32
    const j = (Math.PI * Math.pow(d, 4)) / 32;
    
    // k = (G * J) / L
    const k = (g * j) / l;

    document.getElementById('hc-dr-val').innerText = k.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' N·m/rad';
    document.getElementById('hc-dr-result').classList.add('visible');
}
