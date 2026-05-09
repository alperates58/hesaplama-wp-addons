function hcBenzinEmisyonHesapla() {
    const liters = parseFloat(document.getElementById('hc-gas-liters').value);

    if (isNaN(liters) || liters <= 0) {
        alert('Lütfen geçerli bir litre miktarı giriniz.');
        return;
    }

    // 2026 Verisi: 1 Litre Benzin = 2.32 kg CO2
    const co2 = liters * 2.32;
    
    // Ortalama bir araç 100km'de 7L yaksa, km başına 0.162 kg CO2 salar
    const kmEquiv = co2 / 0.162;

    document.getElementById('hc-res-gas-co2').innerText = co2.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    document.getElementById('hc-res-gas-desc').innerText = `Bu miktar yaklaşık ${kmEquiv.toLocaleString('tr-TR', {maximumFractionDigits: 0})} km yol kat eden bir aracın salınımına eşdeğerdir.`;
    
    document.getElementById('hc-benzin-emisyon-result').classList.add('visible');
}
