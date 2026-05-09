function hcEvCO2Hesapla() {
    const el = parseFloat(document.getElementById('hc-house-el').value) || 0;
    const gas = parseFloat(document.getElementById('hc-house-gas').value) || 0;
    const water = parseFloat(document.getElementById('hc-house-water').value) || 0;

    // 2026 Emisyon Faktörleri:
    const elFactor = 0.49; // kg/kWh
    const gasFactor = 1.95; // kg/m3
    const waterFactor = 0.35; // kg/m3 (Pompalama + Arıtma + Atık su LCA)

    const yearlyEl = el * 12 * elFactor;
    const yearlyGas = gas * 12 * gasFactor;
    const yearlyWater = water * 12 * waterFactor;

    const total = yearlyEl + yearlyGas + yearlyWater;

    document.getElementById('hc-res-house-total-co2').innerText = total.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' kg';
    document.getElementById('hc-res-break-el').innerText = yearlyEl.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' kg';
    document.getElementById('hc-res-break-gas').innerText = yearlyGas.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' kg';
    document.getElementById('hc-res-break-water').innerText = yearlyWater.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' kg';
    
    document.getElementById('hc-ev-karbon-ayak-izi-result').classList.add('visible');
}
