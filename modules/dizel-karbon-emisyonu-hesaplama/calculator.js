function hcDizelEmisyonHesapla() {
    const liters = parseFloat(document.getElementById('hc-diesel-liters').value);

    if (isNaN(liters) || liters <= 0) {
        alert('Lütfen geçerli bir litre miktarı giriniz.');
        return;
    }

    // 2026 Verisi: 1 Litre Dizel = 2.69 kg CO2
    const co2 = liters * 2.69;

    document.getElementById('hc-res-diesel-co2').innerText = co2.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    
    document.getElementById('hc-dizel-emisyon-result').classList.add('visible');
}
