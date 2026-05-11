function hcPanelLoadHesapla() {
    const power = parseFloat(document.getElementById('hc-pl-power').value);
    const factor = parseFloat(document.getElementById('hc-pl-factor').value);
    const volt = parseFloat(document.getElementById('hc-pl-volt').value);

    if (isNaN(power) || isNaN(factor) || power <= 0 || factor <= 0) {
        alert('Lütfen geçerli güç ve faktör değerleri girin.');
        return;
    }

    const demandPower = power * factor;
    let current = 0;

    if (volt === 220) {
        // I = P / V (cos phi assumed 0.95)
        current = (demandPower * 1000) / (volt * 0.95);
    } else {
        // I = P / (sqrt(3) * V * cos phi)
        current = (demandPower * 1000) / (Math.sqrt(3) * volt * 0.95);
    }

    document.getElementById('hc-pl-res-kw').innerText = demandPower.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kW';
    document.getElementById('hc-pl-res-i').innerText = current.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Amper';
    
    document.getElementById('hc-pl-result').classList.add('visible');
}
