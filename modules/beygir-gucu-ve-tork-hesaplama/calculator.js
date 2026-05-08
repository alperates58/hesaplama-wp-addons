function hcHtHesapla() {
    const torque = parseFloat(document.getElementById('hc-ht-torque').value);
    const rpm = parseFloat(document.getElementById('hc-ht-rpm').value);

    if (isNaN(torque) || isNaN(rpm)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // Metric Formula: HP = (Nm * RPM) / 7127
    const hp = (torque * rpm) / 7127;

    document.getElementById('hc-ht-val').innerText = Math.round(hp) + " HP";
    document.getElementById('hc-ht-result').classList.add('visible');
}
