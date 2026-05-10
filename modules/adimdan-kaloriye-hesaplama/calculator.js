function hcAdımdanKaloriyeHesapla() {
    const steps = parseFloat(document.getElementById('hc-steps-count').value);
    const weight = parseFloat(document.getElementById('hc-steps-weight').value);
    const factor = parseFloat(document.getElementById('hc-steps-pace').value);

    if (!steps || !weight) return;

    // Yaklaşık Kalori = Adım Sayısı * (Ağırlık Faktörü)
    // Basit bir model: 0.04 kcal per step for 70kg person.
    // Düzeltme faktörü ile: kcal = steps * weight * multiplier
    const kcalMultiplier = (factor / 75) * weight;
    const totalKcal = steps * kcalMultiplier;
    
    // Yaklaşık mesafe: 1000 adım = 0.75 km
    const dist = steps * 0.00075;

    document.getElementById('hc-steps-val').innerText = Math.round(totalKcal) + ' kcal';
    document.getElementById('hc-steps-km').innerText = `Tahmini Mesafe: ${dist.toFixed(2)} km`;
    document.getElementById('hc-steps-result').classList.add('visible');
}
