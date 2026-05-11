function hcSolarSizeHesapla() {
    const usage = parseFloat(document.getElementById('hc-ss-usage').value);
    const sun = parseFloat(document.getElementById('hc-ss-sun').value);
    const eff = parseFloat(document.getElementById('hc-ss-eff').value) / 100;
    const pWatt = parseFloat(document.getElementById('hc-ss-p-watt').value);

    if (isNaN(usage) || isNaN(sun) || isNaN(eff) || isNaN(pWatt) || sun <= 0 || eff <= 0 || pWatt <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // Required Power (kW) = Daily Usage (kWh) / (Sun hours * Efficiency)
    const reqKw = usage / (sun * eff);
    const panelCount = (reqKw * 1000) / pWatt;

    document.getElementById('hc-ss-res-kwp').innerText = reqKw.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWp';
    document.getElementById('hc-ss-res-count').innerText = Math.ceil(panelCount).toLocaleString('tr-TR') + ' Adet';
    
    document.getElementById('hc-ss-result').classList.add('visible');
}
