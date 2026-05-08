function hcStepCaloriesHesapla() {
    const steps = parseFloat(document.getElementById('hc-s-steps').value);
    const weight = parseFloat(document.getElementById('hc-s-weight').value);
    const paceFactor = parseFloat(document.getElementById('hc-s-pace').value);

    if (!steps || !weight) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // Basitleştirilmiş formül: Adım * Kilo katsayısı * Tempo
    // 70kg için baz katsayı tempo ile çarpılır
    const calories = steps * (weight / 70) * paceFactor;
    
    // Mesafe tahmini (ortalama 0.75m adım boyu)
    const distanceKm = (steps * 0.75) / 1000;

    document.getElementById('hc-s-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-s-distance').innerText = 'Tahmini Mesafe: ' + distanceKm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km';

    document.getElementById('hc-step-calories-result').classList.add('visible');
}
