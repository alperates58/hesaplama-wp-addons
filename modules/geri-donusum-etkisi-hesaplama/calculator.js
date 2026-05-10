function hcGeriDönüşümEtkisiHesapla() {
    const paper = parseFloat(document.getElementById('hc-ri-paper').value) || 0;
    const plastic = parseFloat(document.getElementById('hc-ri-plastic').value) || 0;
    const glass = parseFloat(document.getElementById('hc-ri-glass').value) || 0;
    const metal = parseFloat(document.getElementById('hc-ri-metal').value) || 0;

    if (paper + plastic + glass + metal === 0) return;

    // Yaklaşık tasarruf değerleri
    // 1 ton kağıt = 17 ağaç, 26.500 L su, 4000 kWh enerji
    const savedTrees = (paper / 1000) * 17;
    const savedWater = (paper / 1000) * 26500 + (plastic / 1000) * 5000;
    const savedEnergy = (paper / 1000) * 4000 + (plastic / 1000) * 5700 + (glass / 1000) * 42 + (metal / 1000) * 14000;
    const savedCo2 = (paper / 1000) * 2500 + (plastic / 1000) * 1500 + (glass / 1000) * 300 + (metal / 1000) * 9000;

    document.getElementById('hc-ri-stats').innerHTML = `
        <strong>🌲 Kurtarılan Ağaç:</strong> ${savedTrees.toFixed(2)} adet<br>
        <strong>💧 Su Tasarrufu:</strong> ${Math.round(savedWater).toLocaleString('tr-TR')} Litre<br>
        <strong>⚡ Enerji Tasarrufu:</strong> ${Math.round(savedEnergy).toLocaleString('tr-TR')} kWh<br>
        <strong>🌍 CO₂ Engelleme:</strong> ${Math.round(savedCo2).toLocaleString('tr-TR')} kg
    `;
    document.getElementById('hc-ri-result').classList.add('visible');
}
