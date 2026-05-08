function hcEstHesapla() {
    const capacity = parseFloat(document.getElementById('hc-est-capacity').value);
    const start = parseFloat(document.getElementById('hc-est-start').value);
    const end = parseFloat(document.getElementById('hc-est-end').value);
    const power = parseFloat(document.getElementById('hc-est-power').value);

    if (isNaN(capacity) || end <= start) {
        alert('Lütfen değerleri kontrol edin.');
        return;
    }

    const energyNeeded = capacity * (end - start) / 100;
    const efficiency = 0.90; // %90 verimlilik varsayımı
    const timeHours = energyNeeded / (power * efficiency);

    const hours = Math.floor(timeHours);
    const minutes = Math.round((timeHours - hours) * 60);

    let resultText = "";
    if (hours > 0) resultText += hours + " saat ";
    resultText += minutes + " dakika";

    document.getElementById('hc-est-val').innerText = resultText;
    document.getElementById('hc-est-result').classList.add('visible');
}
