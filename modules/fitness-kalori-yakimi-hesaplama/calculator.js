function hcFitnessCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-fit-weight').value);
    const met = parseFloat(document.getElementById('hc-fit-intensity').value);
    const time = parseFloat(document.getElementById('hc-fit-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-fit-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-fitness-result').classList.add('visible');
}
