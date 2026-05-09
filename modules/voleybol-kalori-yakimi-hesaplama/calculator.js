function hcVolleyballCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-vb-weight').value);
    const met = parseFloat(document.getElementById('hc-vb-intensity').value);
    const time = parseFloat(document.getElementById('hc-vb-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-vb-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-volleyball-result').classList.add('visible');
}
