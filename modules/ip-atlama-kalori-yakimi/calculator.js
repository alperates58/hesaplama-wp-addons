function hcIpAtlamaKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-jrc-weight').value);
    const met = parseFloat(document.getElementById('hc-jrc-tempo').value);
    const duration = parseFloat(document.getElementById('hc-jrc-duration').value);

    if (!weight || !duration) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const calories = met * weight * (duration / 60);

    document.getElementById('hc-jrc-value').innerText = Math.round(calories).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-jump-rope-calories-result').classList.add('visible');
}
