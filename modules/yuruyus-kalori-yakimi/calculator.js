function hcYuruyusKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-wc-weight').value);
    const met = parseFloat(document.getElementById('hc-wc-speed').value);
    const duration = parseFloat(document.getElementById('hc-wc-duration').value);

    if (!weight || !duration) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const calories = met * weight * (duration / 60);

    document.getElementById('hc-wc-value').innerText = Math.round(calories).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-walking-calories-result').classList.add('visible');
}
