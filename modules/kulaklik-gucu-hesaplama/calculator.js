function hcHeadphonePowerHesapla() {
    const sens = parseFloat(document.getElementById('hc-hp-sens').value) || 0;
    const imp = parseFloat(document.getElementById('hc-hp-imp').value) || 0;
    const target = parseFloat(document.getElementById('hc-hp-vol').value) || 110;

    if (sens <= 0 || imp <= 0) return;

    // P = 10^((Target - Sens) / 10)
    const requiredPower = Math.pow(10, (target - sens) / 10);
    // V = sqrt(P * R / 1000)
    const requiredVoltage = Math.sqrt(requiredPower * imp / 1000);

    document.getElementById('hc-res-hp-mw').innerText = requiredPower.toFixed(2) + ' mW';
    document.getElementById('hc-res-hp-v').innerText = requiredVoltage.toFixed(2) + ' Vrms';
    
    document.getElementById('hc-headphone-power-result').classList.add('visible');
}
