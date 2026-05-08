function hcSwimmingCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-swi-weight').value);
    const met = parseFloat(document.getElementById('hc-swi-style').value);
    const time = parseFloat(document.getElementById('hc-swi-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-swi-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-swimming-cal-result').classList.add('visible');
}
