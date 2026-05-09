function hcDogalgazEmisyonHesapla() {
    const m3 = parseFloat(document.getElementById('hc-gas-m3').value);

    if (isNaN(m3) || m3 <= 0) {
        alert('Lütfen geçerli bir m³ miktarı giriniz.');
        return;
    }

    // 2026 Verisi: 1 m³ Doğalgaz = 1.95 kg CO2
    const co2 = m3 * 1.95;

    document.getElementById('hc-res-gas-m3-co2').innerText = co2.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    
    document.getElementById('hc-dogalgaz-emisyon-result').classList.add('visible');
}
