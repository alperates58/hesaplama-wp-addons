function hcEvEmisyonHesapla() {
    const dist = parseFloat(document.getElementById('hc-ev-dist').value);
    const eff = parseFloat(document.getElementById('hc-ev-eff').value);

    if (isNaN(dist) || dist <= 0 || isNaN(eff) || eff <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // 2026 TR Grid: 0.49 kg CO2/kWh
    const totalKWh = (eff / 100) * dist;
    const evCO2 = totalKWh * 0.49;

    // Benzinli karşılaştırma: Ortalama 160g/km (0.16 kg/km)
    const iceCO2 = dist * 0.16;
    const reduction = ((iceCO2 - evCO2) / iceCO2) * 100;

    document.getElementById('hc-res-ev-co2').innerText = evCO2.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    document.getElementById('hc-res-ev-vs-ice').innerText = `Benzinli bir araca göre %${Math.round(reduction)} daha az emisyon salınmıştır.`;
    
    document.getElementById('hc-ev-emisyon-result').classList.add('visible');
}
