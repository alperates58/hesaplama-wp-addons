function hcJumpRopeCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-jr-weight').value);
    const met = parseFloat(document.getElementById('hc-jr-speed').value);
    const time = parseFloat(document.getElementById('hc-jr-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-jr-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-jumprope-cal-result').classList.add('visible');
}
