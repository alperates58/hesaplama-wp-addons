function hcActuatorHesapla() {
    const torque = parseFloat(document.getElementById('hc-la-torque').value);
    const pitch = parseFloat(document.getElementById('hc-la-pitch').value);
    const eff = parseFloat(document.getElementById('hc-la-eff').value) / 100;

    if (isNaN(torque) || isNaN(pitch) || isNaN(eff) || pitch <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // Force F = (2 * PI * T * eff) / (p / 1000)
    // where T is torque (Nm), eff is efficiency, p is pitch (mm)
    const forceN = (2 * Math.PI * torque * eff) / (pitch / 1000);
    const forceKg = forceN / 9.80665;

    document.getElementById('hc-la-res-val').innerText = Math.round(forceN).toLocaleString('tr-TR') + ' N';
    document.getElementById('hc-la-res-kg').innerText = '~' + Math.round(forceKg).toLocaleString('tr-TR') + ' kgf';
    
    document.getElementById('hc-la-result').classList.add('visible');
}
