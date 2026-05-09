function hcPilatesCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-pil-weight').value);
    const met = parseFloat(document.getElementById('hc-pil-intensity').value);
    const time = parseFloat(document.getElementById('hc-pil-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-pil-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-pilates-result').classList.add('visible');
}
