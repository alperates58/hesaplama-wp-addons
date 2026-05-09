function hcRunningCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-r-weight').value);
    const met = parseFloat(document.getElementById('hc-r-speed').value);
    const time = parseFloat(document.getElementById('hc-r-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);
    
    // Hız tahmini (MET değerinden hıza yaklaşık dönüşüm)
    let speed = 0;
    if (met === 6.0) speed = 6;
    else if (met === 8.3) speed = 8;
    else if (met === 9.8) speed = 10;
    else if (met === 11.5) speed = 12;
    else if (met === 14.5) speed = 16;

    const distance = speed * (time / 60);

    document.getElementById('hc-r-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-r-distance').innerText = 'Tahmini Mesafe: ' + distance.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km';

    document.getElementById('hc-running-cal-result').classList.add('visible');
}
