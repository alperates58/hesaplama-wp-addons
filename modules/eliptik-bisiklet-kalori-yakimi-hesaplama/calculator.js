function hcEllipticalCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-e-weight').value);
    const met = parseFloat(document.getElementById('hc-e-intensity').value);
    const time = parseFloat(document.getElementById('hc-e-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-e-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-elliptical-cal-result').classList.add('visible');
}
