function hcEvIsiKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-hi-weight').value);
    const met = parseFloat(document.getElementById('hc-hi-activity').value);
    const duration = parseFloat(document.getElementById('hc-hi-duration').value);

    if (!weight || !duration) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const calories = met * weight * (duration / 60);

    document.getElementById('hc-hi-value').innerText = Math.round(calories).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-housework-calories-result').classList.add('visible');
}
