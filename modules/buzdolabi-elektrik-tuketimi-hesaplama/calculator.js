function hcBuzdolabiElHesapla() {
    const energyClass = document.getElementById('hc-fridge-class').value;
    const price = parseFloat(document.getElementById('hc-fridge-price').value);

    if (isNaN(price) || price <= 0) {
        alert('Lütfen geçerli bir elektrik fiyatı giriniz.');
        return;
    }

    // 2026 Verileri (Yıllık ortalama kWh tüketimi - 300L No-Frost)
    const consumption = {
        'A': 110,
        'B': 140,
        'C': 170,
        'D': 210,
        'E': 260,
        'F': 320,
        'old': 550
    };

    const yearlyKWh = consumption[energyClass];
    const yearlyCost = yearlyKWh * price;
    
    // 2026 TR Grid Emisyonu: 0.49 kg CO2/kWh
    const yearlyCO2 = yearlyKWh * 0.49;

    document.getElementById('hc-res-fridge-kwh').innerText = yearlyKWh.toLocaleString('tr-TR') + ' kWh';
    document.getElementById('hc-res-fridge-cost').innerText = yearlyCost.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-res-fridge-co2').innerText = yearlyCO2.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' kg';
    
    document.getElementById('hc-buzdolabi-el-result').classList.add('visible');
}
