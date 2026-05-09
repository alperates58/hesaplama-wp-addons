function hcKosuKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-rc-weight').value);
    const met = parseFloat(document.getElementById('hc-rc-speed').value);
    const duration = parseFloat(document.getElementById('hc-rc-duration').value);

    if (!weight || !duration) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const calories = met * weight * (duration / 60);

    document.getElementById('hc-rc-value').innerText = Math.round(calories).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-running-calories-result').classList.add('visible');
}
