function hcEgzersizKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-ec-weight').value);
    const met = parseFloat(document.getElementById('hc-ec-activity').value);
    const duration = parseFloat(document.getElementById('hc-ec-duration').value);

    if (!weight || !duration) {
        alert('Lütfen kilonuzu ve süreyi girin.');
        return;
    }

    // Formula: Calories = MET * weight(kg) * time(hours)
    const calories = met * weight * (duration / 60);

    document.getElementById('hc-ec-value').innerText = Math.round(calories).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-exercise-calories-result').classList.add('visible');
}
