function hcACKHesapla() {
    const mass = parseFloat(document.getElementById('hc-ack-mass').value);
    const speedKmh = parseFloat(document.getElementById('hc-ack-speed').value);
    const distCm = parseFloat(document.getElementById('hc-ack-dist').value);

    if (isNaN(mass) || isNaN(speedKmh) || isNaN(distCm) || mass <= 0 || speedKmh <= 0 || distCm <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const v = speedKmh / 3.6; // to m/s
    const d = distCm / 100; // to m

    const force = (0.5 * mass * Math.pow(v, 2)) / d;
    const gForce = force / (mass * 9.81);

    document.getElementById('hc-ack-val').innerText = force.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' N';
    document.getElementById('hc-ack-result').classList.add('visible');
}
