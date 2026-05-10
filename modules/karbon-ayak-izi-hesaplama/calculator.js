function hcKarbonAyakİziHesapla() {
    const elec = parseFloat(document.getElementById('hc-cg-elec').value) || 0;
    const gas = parseFloat(document.getElementById('hc-cg-gas').value) || 0;
    const car = parseFloat(document.getElementById('hc-cg-car').value) || 0;
    const diet = parseFloat(document.getElementById('hc-cg-diet').value);

    // 2026 Tahmini Birim Fiyatlar & Katsayılar
    // Elektrik: 3.25 TL/kWh -> 0.45 kg CO2/kWh => ~0.14 kg/TL
    // Doğalgaz: 12.50 TL/m3 -> 2.1 kg CO2/m3 => ~0.17 kg/TL
    // Araba: 0.17 kg/km
    // Beslenme: ton CO2/yıl
    
    const yearlyElecCo2 = (elec * 12) * 0.14;
    const yearlyGasCo2 = (gas * 12) * 0.17;
    const yearlyCarCo2 = (car * 52) * 0.17;
    const yearlyDietCo2 = diet * 1000; // ton to kg

    const totalCo2 = yearlyElecCo2 + yearlyGasCo2 + yearlyCarCo2 + yearlyDietCo2;

    document.getElementById('hc-cg-val').innerText = (totalCo2 / 1000).toFixed(2) + ' Ton CO₂e';
    document.getElementById('hc-cg-info').innerText = `Dünya ortalaması kişi başı yıllık 4.5 tondur. Türkiye ortalaması ~5 tondur.`;
    document.getElementById('hc-cg-result').classList.add('visible');
}
