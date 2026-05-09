function hcCookTimeHesapla() {
    const type = document.getElementById('hc-ct-type').value;
    const weight = parseFloat(document.getElementById('hc-ct-weight').value) || 0;

    if (weight <= 0) return;

    let totalMins = 0;
    switch(type) {
        case 'chicken': totalMins = (weight * 40) + 20; break;
        case 'turkey': totalMins = (weight * 45) + 20; break;
        case 'beef_med': totalMins = (weight * 50) + 25; break;
        case 'beef_well': totalMins = (weight * 60) + 30; break;
        case 'lamb': totalMins = (weight * 55) + 25; break;
    }

    const h = Math.floor(totalMins / 60);
    const m = Math.round(totalMins % 60);

    document.getElementById('hc-res-ct-time').innerText = (h > 0 ? h + " Saat " : "") + m + " Dakika";
    document.getElementById('hc-cook-time-result').classList.add('visible');
}
