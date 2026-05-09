function hcDHHesapla() {
    const m = parseFloat(document.getElementById('hc-dh-mass').value);
    const r = parseFloat(document.getElementById('hc-dh-radius').value);
    const v = parseFloat(document.getElementById('hc-dh-v').value);

    if (isNaN(m) || isNaN(r) || isNaN(v) || r <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const accel = Math.pow(v, 2) / r;
    const force = m * accel;

    document.getElementById('hc-dh-accel').innerText = accel.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s²';
    document.getElementById('hc-dh-force').innerText = force.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    
    document.getElementById('hc-dh-result').classList.add('visible');
}
