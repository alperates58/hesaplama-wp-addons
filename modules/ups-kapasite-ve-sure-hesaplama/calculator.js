function hcUpsHesapla() {
    const load = parseFloat(document.getElementById('hc-us-load').value);
    const volt = parseFloat(document.getElementById('hc-us-batt-v').value);
    const ah = parseFloat(document.getElementById('hc-us-batt-ah').value);

    if (isNaN(load) || isNaN(ah)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (load <= 0) {
        alert('Yük değeri 0\'dan büyük olmalıdır.');
        return;
    }

    // Backup Time (hours) = (V * Ah * Efficiency) / Load
    // Efficiency ~0.8
    const timeHours = (volt * ah * 0.8) / load;
    const totalMinutes = timeHours * 60;

    const h = Math.floor(timeHours);
    const m = Math.round((timeHours - h) * 60);

    let resultText = '';
    if (h > 0) resultText += h + ' Saat ';
    resultText += m + ' Dakika';

    document.getElementById('hc-res-us-time').innerText = resultText;

    document.getElementById('hc-us-result').classList.add('visible');
}
