function hcCuttingSpeedHesapla() {
    const d = parseFloat(document.getElementById('hc-cs-d').value);
    const n = parseFloat(document.getElementById('hc-cs-n').value);
    const fz = parseFloat(document.getElementById('hc-cs-fz').value);
    const z = parseFloat(document.getElementById('hc-cs-z').value);

    if (isNaN(d) || isNaN(n) || d <= 0 || n <= 0) {
        alert('Lütfen geçerli çap ve devir değerleri girin.');
        return;
    }

    // Vc = (PI * D * n) / 1000
    const vc = (Math.PI * d * n) / 1000;

    // Vf = fz * z * n
    let vf = 0;
    if (!isNaN(fz) && !isNaN(z)) {
        vf = fz * z * n;
    }

    document.getElementById('hc-cs-res-vc').innerText = vc.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/dak';
    document.getElementById('hc-cs-res-vf').innerText = vf.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' mm/dak';
    
    document.getElementById('hc-cs-result').classList.add('visible');
}
