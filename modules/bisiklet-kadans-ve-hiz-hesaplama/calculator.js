function hcBisikletKadansVeHizHesapla() {
    const cad = parseFloat(document.getElementById('hc-bike-cadence').value);
    const front = parseFloat(document.getElementById('hc-bike-chainring').value);
    const rear = parseFloat(document.getElementById('hc-bike-cog').value);
    const circ = parseFloat(document.getElementById('hc-bike-tire').value); // mm

    if (!cad || !front || !rear || !circ) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Ratio = Front / Rear
    const ratio = front / rear;
    // Speed (km/h) = (Cadence * Ratio * Circumference * 60) / 1,000,000
    const speed = (cad * ratio * circ * 60) / 1000000;

    document.getElementById('hc-bike-speed-val').innerText = speed.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km/h';
    document.getElementById('hc-bike-ratio').innerText = `Vites Oranı: ${ratio.toFixed(2)}`;
    document.getElementById('hc-bike-result').classList.add('visible');
}
