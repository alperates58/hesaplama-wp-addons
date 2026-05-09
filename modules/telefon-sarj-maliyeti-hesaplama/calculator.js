function hcPhoneChargeHesapla() {
    const mah = parseFloat(document.getElementById('hc-phone-batt').value) || 0;
    const freq = parseFloat(document.getElementById('hc-phone-freq').value) || 0;

    // Batarya voltajı (ortalama 3.7V)
    const voltage = 3.7;
    const efficiency = 0.85; // Şarj verimliliği
    
    // Wh = (mAh * V) / 1000
    const whPerCharge = (mah * voltage) / 1000 / efficiency;
    const kwhYearly = (whPerCharge * freq * 365) / 1000;
    
    const priceKWh = 3.50; // 2026 tahmini
    const totalCost = kwhYearly * priceKWh;

    document.getElementById('hc-res-charge-total').innerText = totalCost.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    document.getElementById('hc-phone-charge-result').classList.add('visible');
}
