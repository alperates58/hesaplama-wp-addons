function hcEtCO2Hesapla() {
    const type = document.getElementById('hc-meat-type').value;
    const weight = parseFloat(document.getElementById('hc-meat-weight').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen geçerli bir miktar giriniz.');
        return;
    }

    // 2026 Verileri (kg CO2e / kg et):
    // Kaynak: Our World in Data / FAO 2026
    const factors = {
        beef: 60,
        lamb: 24,
        chicken: 6
    };

    const yearlyCO2 = weight * 52 * factors[type];
    const kmEquiv = yearlyCO2 / 0.16; // 0.16kg/km araba emisyonu

    document.getElementById('hc-res-meat-co2').innerText = yearlyCO2.toLocaleString('tr-TR') + ' kg';
    document.getElementById('hc-res-meat-equiv').innerText = `Bu miktar bir otomobille yaklaşık ${Math.round(kmEquiv).toLocaleString('tr-TR')} km yol yapmaya eşittir.`;
    
    document.getElementById('hc-meat-co2-result').classList.add('visible');
}
