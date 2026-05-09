function hcTennisCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-tn-weight').value);
    const met = parseFloat(document.getElementById('hc-tn-intensity').value);
    const time = parseFloat(document.getElementById('hc-tn-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-tn-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-tennis-result').classList.add('visible');
}
