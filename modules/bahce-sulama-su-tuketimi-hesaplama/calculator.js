function hcBahceSulamaHesapla() {
    const method = document.getElementById('hc-irr-method').value;
    const size = parseFloat(document.getElementById('hc-irr-size').value);
    const duration = parseFloat(document.getElementById('hc-irr-duration').value);

    if (isNaN(size) || size <= 0 || isNaN(duration) || duration <= 0) {
        alert('Lütfen geçerli alan ve süre değerleri giriniz.');
        return;
    }

    // 2026 Verileri (Litre / Dakika / Birim)
    let flowRate = 0;
    if (method === 'hose') {
        // Standart hortum ~15 L/dk, 100m2 için dk başına tüketim 
        flowRate = 15; 
    } else if (method === 'sprinkler') {
        // Fıskiye ~20 L/dk
        flowRate = 20;
    } else if (method === 'drip') {
        // Damlama: Metre başına ~4 L/saat = ~0.066 L/dk
        flowRate = 0.066 * size; 
    }

    let weeklyLiters = 0;
    if (method === 'drip') {
        weeklyLiters = flowRate * duration;
    } else {
        // Hortum/Fıskiye için süre tüm bahçe içindir
        weeklyLiters = flowRate * duration;
    }

    const yearlyM3 = (weeklyLiters * 30) / 1000; // Yaklaşık 30 haftalık sulama sezonu

    document.getElementById('hc-res-weekly-water').innerText = weeklyLiters.toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-res-yearly-water').innerText = yearlyM3.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' m³';
    
    document.getElementById('hc-bahce-sulama-result').classList.add('visible');
}

document.getElementById('hc-irr-method').addEventListener('change', function() {
    const hint = document.getElementById('hc-irr-size-hint');
    if (this.value === 'drip') {
        hint.innerText = 'Damlama borusu uzunluğu (Metre)';
    } else {
        hint.innerText = 'Bahçe alanı (m²)';
    }
});
