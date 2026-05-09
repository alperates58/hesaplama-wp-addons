function hcCoolingLoadHesapla() {
    const m = parseFloat(document.getElementById('hc-cl-mass').value) || 0;
    const cp = parseFloat(document.getElementById('hc-cl-cp').value) || 0;
    const dt = parseFloat(document.getElementById('hc-cl-dt').value) || 0;
    const timeMin = parseFloat(document.getElementById('hc-cl-time').value) || 1;

    // Q = m * cp * deltaT
    const qKj = m * cp * dt;
    // Power (kW) = Q(kJ) / time(sec)
    const powerKw = qKj / (timeMin * 60);

    document.getElementById('hc-res-cl-total').innerText = qKj.toLocaleString('tr-TR') + ' kJ';
    document.getElementById('hc-res-cl-val').innerText = powerKw.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kW';
    
    document.getElementById('hc-cooling-load-result').classList.add('visible');
}
