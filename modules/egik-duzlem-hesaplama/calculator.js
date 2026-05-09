function hcEDHesapla() {
    const m = parseFloat(document.getElementById('hc-ed-mass').value);
    const angleDeg = parseFloat(document.getElementById('hc-ed-angle').value);
    const mu = parseFloat(document.getElementById('hc-ed-mu').value);

    if (isNaN(m) || isNaN(angleDeg) || isNaN(mu)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const g = 9.80665;
    const theta = angleDeg * (Math.PI / 180);

    const fx = m * g * Math.sin(theta);
    const fy = m * g * Math.cos(theta);
    const friction = mu * fy;

    let accel = g * (Math.sin(theta) - mu * Math.cos(theta));
    if (accel < 0) accel = 0; // Won't move backwards due to friction alone

    document.getElementById('hc-ed-accel').innerText = accel.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s²';
    document.getElementById('hc-ed-fx').innerText = fx.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' N';
    
    document.getElementById('hc-ed-result').classList.add('visible');
}
