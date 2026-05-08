function hcAdımKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-ac-weight').value);
    const steps = parseFloat(document.getElementById('hc-ac-steps').value);

    if (!weight || !steps) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Average factor: 0.00058 kcal per step per kg
    const calories = steps * weight * 0.00058;

    document.getElementById('hc-ac-value').innerText = Math.round(calories).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-step-calories-result').classList.add('visible');
}
