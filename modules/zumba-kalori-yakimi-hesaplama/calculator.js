function hcZumbaCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-zb-weight').value);
    const met = parseFloat(document.getElementById('hc-zb-intensity').value);
    const time = parseFloat(document.getElementById('hc-zb-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-zb-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-zumba-result').classList.add('visible');
}
