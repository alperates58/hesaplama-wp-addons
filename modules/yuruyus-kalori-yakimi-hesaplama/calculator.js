function hcWalkingCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-w-weight').value);
    const met = parseFloat(document.getElementById('hc-w-speed').value);
    const time = parseFloat(document.getElementById('hc-w-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);
    
    let speed = 0;
    if (met === 3.0) speed = 4;
    else if (met === 3.5) speed = 5;
    else if (met === 4.3) speed = 6;
    else if (met === 5.0) speed = 7;
    else if (met === 7.0) speed = 8;

    const distance = speed * (time / 60);

    document.getElementById('hc-w-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-w-distance').innerText = 'Tahmini Mesafe: ' + distance.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km';

    document.getElementById('hc-walking-cal-result').classList.add('visible');
}
