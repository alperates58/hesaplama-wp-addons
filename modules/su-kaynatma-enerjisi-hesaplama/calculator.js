function hcWaterBoilEnergyHesapla() {
    const water = parseFloat(document.getElementById('hc-we-water').value);
    const startTemp = parseFloat(document.getElementById('hc-we-temp').value);

    if (isNaN(water) || water <= 0) {
        alert('Lütfen su miktarını giriniz.');
        return;
    }

    const deltaT = 100 - startTemp;
    if (deltaT <= 0) {
        alert('Başlangıç sıcaklığı 100°C\'den küçük olmalıdır.');
        return;
    }

    // Q = m * c * deltaT (c su = 4.186 kJ/kg°C)
    const energyKJ = water * 4.186 * deltaT;
    const energyKWh = energyKJ / 3600;

    // Ortalama elektrik birim fiyatı 2026 için ~4 TL (tahmini)
    const cost = energyKWh * 4;

    document.getElementById('hc-we-val').innerText = energyKWh.toFixed(3) + ' kWh';
    document.getElementById('hc-we-info').innerText = `Tahmini Maliyet: ${cost.toLocaleString('tr-TR', {maximumFractionDigits:2})} ₺. Bu değer cihaz verimliliğine göre %10-20 artabilir.`;
    
    document.getElementById('hc-boil-energy-result').classList.add('visible');
}
