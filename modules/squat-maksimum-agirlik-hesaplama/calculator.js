function hcSquatMaksimumAgirlikHesapla() {
    const weight = parseFloat(document.getElementById('hc-squat-weight').value);
    const reps = parseInt(document.getElementById('hc-squat-reps').value);

    if (!weight || !reps) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Brzycki Formülü
    const oneRM = weight / (1.0278 - (0.0278 * reps));

    document.getElementById('hc-squat-val').innerText = oneRM.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    document.getElementById('hc-squat-result').classList.add('visible');
}
