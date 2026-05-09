function hcBoxingCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-box-weight').value);
    const met = parseFloat(document.getElementById('hc-box-intensity').value);
    const time = parseFloat(document.getElementById('hc-box-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-box-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-boxing-result').classList.add('visible');
}
