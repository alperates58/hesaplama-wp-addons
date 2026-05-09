function hcHikingCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-hk-weight').value);
    const met = parseFloat(document.getElementById('hc-hk-intensity').value);
    const time = parseFloat(document.getElementById('hc-hk-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-hk-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-hiking-result').classList.add('visible');
}
