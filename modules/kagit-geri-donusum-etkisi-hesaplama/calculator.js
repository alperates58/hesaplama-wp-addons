function hcKağıtGeriDönüşümEtkisiHesapla() {
    const weight = parseFloat(document.getElementById('hc-pr-weight').value);

    if (!weight) return;

    // 1 ton (1000 kg) kağıt tasarrufu:
    // 17 ağaç, 26.500 L su, 4100 kWh enerji, 2.5 ton CO2
    const trees = (weight / 1000) * 17;
    const water = (weight / 1000) * 26500;
    const energy = (weight / 1000) * 4100;
    const co2 = (weight / 1000) * 2500;

    document.getElementById('hc-pr-stats').innerHTML = `
        🌲 <strong>Kurtarılan Ağaç:</strong> ${trees.toFixed(2)} adet<br>
        💧 <strong>Su Tasarrufu:</strong> ${Math.round(water).toLocaleString('tr-TR')} Litre<br>
        ⚡ <strong>Enerji Tasarrufu:</strong> ${Math.round(energy).toLocaleString('tr-TR')} kWh<br>
        🌍 <strong>CO₂ Tasarrufu:</strong> ${Math.round(co2).toLocaleString('tr-TR')} kg
    `;
    document.getElementById('hc-pr-result').classList.add('visible');
}
