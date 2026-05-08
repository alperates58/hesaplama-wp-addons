function hcCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-c-weight').value);
    const met = parseFloat(document.getElementById('hc-c-activity').value);
    const duration = parseFloat(document.getElementById('hc-c-duration').value);

    if (!weight || !duration) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    // Formül: Kalori = MET * Ağırlık (kg) * Süre (saat)
    const hours = duration / 60;
    const calories = met * weight * hours;

    document.getElementById('hc-c-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-calories-result').classList.add('visible');
}
