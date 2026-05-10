function hcİşletmeKarbonAyakİziHesapla() {
    const elec = parseFloat(document.getElementById('hc-bc-elec').value) || 0;
    const gas = parseFloat(document.getElementById('hc-bc-gas').value) || 0;
    const fuel = parseFloat(document.getElementById('hc-bc-fuel').value) || 0;

    // 2026 Katsayılar: 
    // Elektrik: 0.45 kg CO2/kWh (Türkiye şebeke tahmini)
    // Doğalgaz: 2.1 kg CO2/m3
    // Akaryakıt: 2.6 kg CO2/L
    const annualElec = elec * 12 * 0.45;
    const annualGas = gas * 12 * 2.1;
    const annualFuel = fuel * 12 * 2.6;

    const total = annualElec + annualGas + annualFuel;

    document.getElementById('hc-bc-val').innerText = (total / 1000).toFixed(2) + ' Ton CO₂e';
    document.getElementById('hc-bc-info').innerText = `Kapsam 1 (Doğrudan) ve Kapsam 2 (Dolaylı) emisyonları içerir.`;
    document.getElementById('hc-bc-result').classList.add('visible');
}
