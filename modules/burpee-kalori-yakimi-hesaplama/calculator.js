function hcToggleBurpeeMode() {
    const type = document.getElementById('hc-b-type').value;
    document.getElementById('hc-b-count-group').style.display = type === 'count' ? 'block' : 'none';
    document.getElementById('hc-b-time-group').style.display = type === 'time' ? 'block' : 'none';
}

function hcBurpeeCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-b-weight').value);
    const type = document.getElementById('hc-b-type').value;
    
    if (!weight) {
        alert('Lütfen kilonuzu giriniz.');
        return;
    }

    let calories = 0;

    if (type === 'count') {
        const count = parseFloat(document.getElementById('hc-b-count').value);
        if (!count) return;
        // Ortalama 1 burpee = 0.5 kcal (70kg için)
        calories = count * (weight / 70) * 0.5;
    } else {
        const time = parseFloat(document.getElementById('hc-b-time').value);
        if (!time) return;
        // MET 8.0
        calories = 8.0 * weight * (time / 60);
    }

    document.getElementById('hc-b-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-burpee-cal-result').classList.add('visible');
}
