function hcAHHesapla() {
    const v0 = parseFloat(document.getElementById('hc-ah-v0').value);
    const angleDeg = parseFloat(document.getElementById('hc-ah-angle').value);
    const g = 9.80665;

    if (isNaN(v0) || isNaN(angleDeg) || v0 < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    
    // Flight time: t = (2 * v0 * sin(theta)) / g
    const tFlight = (2 * v0 * Math.sin(rad)) / g;
    
    // Max height: h = (v0^2 * sin^2(theta)) / (2 * g)
    const hMax = (Math.pow(v0, 2) * Math.pow(Math.sin(rad), 2)) / (2 * g);
    
    // Range: R = (v0^2 * sin(2*theta)) / g
    const range = (Math.pow(v0, 2) * Math.sin(2 * rad)) / g;

    document.getElementById('hc-ah-time').innerText = tFlight.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' s';
    document.getElementById('hc-ah-hmax').innerText = hMax.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-ah-range').innerText = range.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    
    document.getElementById('hc-ah-result').classList.add('visible');
}
