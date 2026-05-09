function hcMtHesapla() {
    const hp = parseFloat(document.getElementById('hc-mt-hp').value);
    const rpm = parseFloat(document.getElementById('hc-mt-rpm').value);

    if (isNaN(hp) || isNaN(rpm) || rpm === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Torque (Nm) = (HP * 7120.8) / RPM
    const torque = (hp * 7120.8) / rpm;

    document.getElementById('hc-mt-val').innerText = Math.round(torque) + " Nm";
    document.getElementById('hc-mt-result').classList.add('visible');
}
