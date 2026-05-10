function hcDeadliftMaksimumAgirlikHesapla() {
    const weight = parseFloat(document.getElementById('hc-deadlift-weight').value);
    const reps = parseInt(document.getElementById('hc-deadlift-reps').value);

    if (!weight || !reps) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Epley Formülü
    const oneRM = weight * (1 + 0.0333 * reps);

    document.getElementById('hc-deadlift-val').innerText = oneRM.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    document.getElementById('hc-deadlift-result').classList.add('visible');
}
