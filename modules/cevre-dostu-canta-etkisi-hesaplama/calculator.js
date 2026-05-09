function hcCevreCantaHesapla() {
    const saved = parseFloat(document.getElementById('hc-bag-saved').value);

    if (isNaN(saved) || saved <= 0) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    // 2026 Verileri:
    // 1 Plastik poşet ~5g plastik
    // 1 Plastik poşet lifecycle CO2 ~1.6g (basit üretim bazlı)
    
    const yearlyBags = saved * 52;
    const plasticSaved = (yearlyBags * 5) / 1000; // kg
    const co2Saved = (yearlyBags * 1.6) / 1000; // kg

    document.getElementById('hc-res-bag-plastic').innerText = plasticSaved.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    document.getElementById('hc-res-bag-co2').innerText = co2Saved.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    
    document.getElementById('hc-cevre-canta-result').classList.add('visible');
}
