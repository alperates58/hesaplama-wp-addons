function hcLiftForceHesapla() {
    const cl = parseFloat(document.getElementById('hc-lf-cl').value);
    const rho = parseFloat(document.getElementById('hc-lf-rho').value);
    const v = parseFloat(document.getElementById('hc-lf-v').value);
    const s = parseFloat(document.getElementById('hc-lf-s').value);

    if (isNaN(cl) || isNaN(rho) || isNaN(v) || isNaN(s)) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // L = 0.5 * Cl * rho * v^2 * s
    const liftN = 0.5 * cl * rho * Math.pow(v, 2) * s;
    const liftKg = liftN / 9.80665;

    document.getElementById('hc-lf-res-val').innerText = Math.round(liftN).toLocaleString('tr-TR') + ' N';
    document.getElementById('hc-lf-res-kg').innerText = '~' + Math.round(liftKg).toLocaleString('tr-TR') + ' kgf (Kilogram-kuvvet)';
    
    document.getElementById('hc-lf-result').classList.add('visible');
}
