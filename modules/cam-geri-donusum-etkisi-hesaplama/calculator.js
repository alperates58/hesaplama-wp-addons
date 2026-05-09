function hcCamGeriDonusumHesapla() {
    const weight = parseFloat(document.getElementById('hc-glass-weight').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen geçerli bir ağırlık giriniz.');
        return;
    }

    // 2026 Verileri:
    // 1 kg Cam Geri Dönüşümü = 0.315 kg CO2 tasarrufu
    // 1 kg Cam Geri Dönüşümü = 0.4 kWh enerji tasarrufu
    // 1 kg Cam Geri Dönüşümü = 1.2 kg ham madde (kum, soda, kireç) tasarrufu

    const co2 = weight * 0.315;
    const energy = weight * 0.4;
    const raw = weight * 1.2;

    document.getElementById('hc-res-glass-co2').innerText = co2.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    document.getElementById('hc-res-glass-energy').innerText = energy.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kWh';
    document.getElementById('hc-res-glass-raw').innerText = raw.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    
    document.getElementById('hc-cam-geri-donusum-result').classList.add('visible');
}
