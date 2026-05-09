function hcRuzgarYogunlukHesapla() {
    const speed = parseFloat(document.getElementById('hc-wd-speed').value);
    const rho = parseFloat(document.getElementById('hc-wd-rho').value);

    if (isNaN(speed) || isNaN(rho)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Power Density (W/m2) = 0.5 * rho * v^3
    const density = 0.5 * rho * Math.pow(speed, 3);

    document.getElementById('hc-res-wd-val').innerText = density.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' W/m²';

    document.getElementById('hc-wd-result').classList.add('visible');
}
