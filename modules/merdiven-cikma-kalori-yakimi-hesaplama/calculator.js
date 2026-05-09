function hcStairsCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-st-weight').value);
    const met = parseFloat(document.getElementById('hc-st-type').value);
    const time = parseFloat(document.getElementById('hc-st-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-st-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-stairs-cal-result').classList.add('visible');
}
