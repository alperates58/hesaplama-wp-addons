function hcAdımMesafeHesapla() {
    const steps = parseFloat(document.getElementById('hc-sd-steps').value);
    const height = parseFloat(document.getElementById('hc-sd-height').value);
    const sex = document.getElementById('hc-sd-sex').value;

    if (isNaN(steps) || isNaN(height)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Average stride length: height * 0.413 for male, 0.415 for female
    const factor = (sex === 'male') ? 0.413 : 0.415;
    const strideLengthCm = height * factor;
    const totalDistanceCm = steps * strideLengthCm;
    const totalDistanceKm = totalDistanceCm / 100000;

    document.getElementById('hc-sd-value').innerText = totalDistanceKm.toFixed(2).toLocaleString('tr-TR') + ' km';
    document.getElementById('hc-step-dist-result').classList.add('visible');
}
