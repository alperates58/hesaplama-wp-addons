function hcDondurmaSuresiHesapla() {
    const a = parseFloat(document.getElementById('hc-ds-thk').value) / 100; // m
    const Ta = parseFloat(document.getElementById('hc-ds-ta').value); // dondurucu C
    const Ti = parseFloat(document.getElementById('hc-ds-ti').value); // urun C
    const water = parseFloat(document.getElementById('hc-ds-type').value);

    if (isNaN(a) || isNaN(Ta) || Ta >= 0) {
        alert('Lütfen geçerli değerler girin (Dondurucu sıcaklığı 0\'ın altında olmalıdır).');
        return;
    }

    // Plank's simplified constants for slab geometry
    const rho = 1000; // kg/m3 approx
    const L = 334000 * water; // Latent heat of freezing (adjusted by water content) J/kg
    const Tf = -1; // Freezing point
    const h = 10; // Convective heat transfer coeff
    const k = 1.5; // Thermal conductivity
    const P = 1/2; // Slab geometry constant
    const R = 1/8; // Slab geometry constant

    // t (saniye) = (rho * L / (Tf - Ta)) * (P * a / h + R * a^2 / k)
    const tSn = (rho * L / (Tf - Ta)) * (P * a / h + R * (a * a) / k);
    
    // Add cooling time from Ti to Tf (Sensible heat part ~ 15% extra)
    const totalSn = tSn * 1.15;
    const totalHr = totalSn / 3600;

    const hr = Math.floor(totalHr);
    const min = Math.round((totalHr - hr) * 60);

    document.getElementById('hc-ds-res-val').innerText = hr + ' saat ' + min + ' dk';
    
    document.getElementById('hc-ds-result').classList.add('visible');
}
