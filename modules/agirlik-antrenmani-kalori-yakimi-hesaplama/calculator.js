function hcWeightTrainingCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-wt-weight').value);
    const met = parseFloat(document.getElementById('hc-wt-intensity').value);
    const time = parseFloat(document.getElementById('hc-wt-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    // MET değerleri: Hafif=3.5, Orta=5.0, Yoğun=7.0
    const calories = met * weight * (time / 60);

    document.getElementById('hc-wt-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-weight-train-result').classList.add('visible');
}
