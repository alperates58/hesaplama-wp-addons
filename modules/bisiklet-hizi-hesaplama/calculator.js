function hcBisikletHiziHesapla() {
    const cad = parseFloat(document.getElementById('hc-speed-cad').value);
    const front = parseFloat(document.getElementById('hc-speed-front').value);
    const rear = parseFloat(document.getElementById('hc-speed-rear').value);
    const circ = parseFloat(document.getElementById('hc-speed-tire').value);

    if (!cad || !front || !rear || !circ) return;

    const speed = (cad * (front / rear) * circ * 60) / 1000000;

    document.getElementById('hc-bike-speed-res').innerText = speed.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km/h';
    document.getElementById('hc-bike-speed-result').classList.add('visible');
}
