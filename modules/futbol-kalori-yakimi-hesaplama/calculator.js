function hcFootballCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-fb-weight').value);
    const met = parseFloat(document.getElementById('hc-fb-intensity').value);
    const time = parseFloat(document.getElementById('hc-fb-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-fb-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-football-result').classList.add('visible');
}
