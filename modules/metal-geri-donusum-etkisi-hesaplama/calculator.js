function hcMetalGeriDönüşümEtkisiHesapla() {
    const alu = parseFloat(document.getElementById('hc-mr-alu').value) || 0;
    const steel = parseFloat(document.getElementById('hc-mr-steel').value) || 0;

    if (alu + steel === 0) return;

    // Alüminyum geri dönüşümü %95 enerji tasarrufu sağlar.
    // 1 ton Alüminyum: 14.000 kWh, 9 ton CO2 tasarrufu
    // 1 ton Çelik: 642 kWh, 1.5 ton CO2 tasarrufu
    const energy = (alu / 1000) * 14000 + (steel / 1000) * 642;
    const co2 = (alu / 1000) * 9000 + (steel / 1000) * 1500;
    const ore = (steel / 1000) * 1100; // Çelik geri dönüşümüyle kurtarılan demir cevheri

    document.getElementById('hc-mr-stats').innerHTML = `
        ⚡ <strong>Enerji Tasarrufu:</strong> ${Math.round(energy).toLocaleString('tr-TR')} kWh<br>
        🌍 <strong>CO₂ Tasarrufu:</strong> ${Math.round(co2).toLocaleString('tr-TR')} kg<br>
        ⛏️ <strong>Hammadde Tasarrufu:</strong> ${Math.round(ore).toLocaleString('tr-TR')} kg cevher
    `;
    document.getElementById('hc-mr-result').classList.add('visible');
}
