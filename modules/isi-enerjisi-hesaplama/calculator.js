function hcHeatEnergyHesapla() {
    const m = parseFloat(document.getElementById('hc-he-m').value);
    const c = parseFloat(document.getElementById('hc-he-c').value);
    const dt = parseFloat(document.getElementById('hc-he-dt').value);

    if (isNaN(m) || isNaN(c) || isNaN(dt)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // Q = m * c * ΔT
    const qKj = m * c * dt;
    const qKcal = qKj / 4.184;

    document.getElementById('hc-he-res-val').innerText = qKj.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kJ';
    document.getElementById('hc-he-res-kcal').innerText = qKcal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kcal';
    
    document.getElementById('hc-he-result').classList.add('visible');
}
