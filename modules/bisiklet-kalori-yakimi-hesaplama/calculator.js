function hcCyclingCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-bi-weight').value);
    const met = parseFloat(document.getElementById('hc-bi-speed').value);
    const time = parseFloat(document.getElementById('hc-bi-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);
    
    let speed = 0;
    if (met === 4.0) speed = 14;
    else if (met === 6.8) speed = 17.5;
    else if (met === 8.0) speed = 20.5;
    else if (met === 10.0) speed = 23.5;
    else if (met === 12.0) speed = 27;

    const distance = speed * (time / 60);

    document.getElementById('hc-bi-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-bi-distance').innerText = 'Tahmini Mesafe: ' + distance.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km';

    document.getElementById('hc-cycling-cal-result').classList.add('visible');
}
