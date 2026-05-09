function hcBisikletKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-bc-weight').value);
    const met = parseFloat(document.getElementById('hc-bc-speed').value);
    const duration = parseFloat(document.getElementById('hc-bc-duration').value);

    if (!weight || !duration) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const calories = met * weight * (duration / 60);

    document.getElementById('hc-bc-value').innerText = Math.round(calories).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-cycling-calories-result').classList.add('visible');
}
