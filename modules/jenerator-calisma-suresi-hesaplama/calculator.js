function hcJenSureHesapla() {
    const tank = parseFloat(document.getElementById('hc-gt-tank').value);
    const cons = parseFloat(document.getElementById('hc-gt-cons').value);
    const load = parseFloat(document.getElementById('hc-gt-load').value);

    if (isNaN(tank) || isNaN(cons)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Adjust consumption based on load (simplified linear model)
    const realCons = cons * (load / 100);
    const hours = tank / realCons;

    const h = Math.floor(hours);
    const m = Math.round((hours - h) * 60);

    document.getElementById('hc-res-gt-hours').innerText = h + ' Saat ' + m + ' Dakika';

    document.getElementById('hc-gt-result').classList.add('visible');
}
