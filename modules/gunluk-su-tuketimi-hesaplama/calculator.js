function hcDailyWaterHesapla() {
    const weight = parseFloat(document.getElementById('hc-water-weight').value);
    const activity = parseFloat(document.getElementById('hc-water-activity').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen kilonuzu giriniz.');
        return;
    }

    // Temel formül: Kilo x 0.033 litre. 
    // Ekstra aktivite için +0.5 veya +1.0 litre eklenebilir.
    let water = weight * 0.033 + activity;

    document.getElementById('hc-water-val').innerText = water.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Litre';
    
    const glasses = Math.ceil(water / 0.2); // 200ml bardak
    document.getElementById('hc-water-glasses').innerText = `Yaklaşık ${glasses} standart (200ml) bardak.`;
    
    document.getElementById('hc-daily-water-result').classList.add('visible');
}
