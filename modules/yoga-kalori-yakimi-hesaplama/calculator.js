function hcYogaCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-yg-weight').value);
    const met = parseFloat(document.getElementById('hc-yg-intensity').value);
    const time = parseFloat(document.getElementById('hc-yg-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-yg-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-yoga-result').classList.add('visible');
}
