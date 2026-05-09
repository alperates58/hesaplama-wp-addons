function hcElEmisyonHesapla() {
    const kwh = parseFloat(document.getElementById('hc-el-kwh').value);
    const period = parseFloat(document.getElementById('hc-el-period').value);

    if (isNaN(kwh) || kwh <= 0) {
        alert('Lütfen geçerli bir kWh değeri giriniz.');
        return;
    }

    // 2026 TR Grid Emisyonu: 0.49 kg CO2/kWh
    const co2 = kwh * 0.49 * period;

    document.getElementById('hc-res-el-co2').innerText = co2.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' kg';
    
    document.getElementById('hc-el-emisyon-result').classList.add('visible');
}
