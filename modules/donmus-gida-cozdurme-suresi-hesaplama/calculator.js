function hcThawTimeHesapla() {
    const method = document.getElementById('hc-tt-method').value;
    const weight = parseFloat(document.getElementById('hc-tt-weight').value) || 0;

    if (weight <= 0) return;

    let totalHours = 0;
    if (method === 'fridge') {
        // Buzdolabı: 24 saat per 2.5kg
        totalHours = (weight / 2.5) * 24;
    } else {
        // Soğuk Su: 1 saat per 1kg
        totalHours = weight * 1;
    }

    const h = Math.floor(totalHours);
    const m = Math.round((totalHours - h) * 60);

    document.getElementById('hc-res-tt-time').innerText = (h > 0 ? h + " Saat " : "") + (m > 0 ? m + " Dakika" : "");
    document.getElementById('hc-thaw-time-result').classList.add('visible');
}
