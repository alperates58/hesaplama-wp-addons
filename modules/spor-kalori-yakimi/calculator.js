function hcSporKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-sc-weight').value);
    const met = parseFloat(document.getElementById('hc-sc-sport').value);
    const duration = parseFloat(document.getElementById('hc-sc-duration').value);

    if (!weight || !duration) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const calories = met * weight * (duration / 60);

    document.getElementById('hc-sc-value').innerText = Math.round(calories).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-sports-calories-result').classList.add('visible');
}
