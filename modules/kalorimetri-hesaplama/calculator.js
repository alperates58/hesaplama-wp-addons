function hcCalorimetryHesapla() {
    const m = parseFloat(document.getElementById('hc-km-m').value);
    const c = parseFloat(document.getElementById('hc-km-c').value);
    const dt = parseFloat(document.getElementById('hc-km-dt').value);

    if (isNaN(m) || isNaN(c) || isNaN(dt)) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // Q = m * c * deltaT
    const q = m * c * dt;
    const qKj = q / 1000;
    const qKcal = q / 4186.8;

    document.getElementById('hc-km-res-val').innerText = Math.round(q).toLocaleString('tr-TR') + ' Joule';
    document.getElementById('hc-km-res-kj').innerText = qKj.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kJ (' + qKcal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kcal)';
    
    document.getElementById('hc-km-result').classList.add('visible');
}
