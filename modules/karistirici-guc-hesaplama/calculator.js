function hcMixerPowerHesapla() {
    const np = parseFloat(document.getElementById('hc-mp-np').value);
    const rho = parseFloat(document.getElementById('hc-mp-rho').value);
    const rpm = parseFloat(document.getElementById('hc-mp-n').value);
    const d = parseFloat(document.getElementById('hc-mp-d').value);

    if (isNaN(np) || isNaN(rho) || isNaN(rpm) || isNaN(d) || rpm <= 0 || d <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Convert RPM to RPS (revolutions per second)
    const n = rpm / 60;

    // P = Np * rho * n^3 * D^5
    const power = np * rho * Math.pow(n, 3) * Math.pow(d, 5);

    document.getElementById('hc-mp-res-val').innerText = Math.round(power).toLocaleString('tr-TR') + ' Watt';
    document.getElementById('hc-mp-res-kw').innerText = (power / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kW';
    
    document.getElementById('hc-mp-result').classList.add('visible');
}
