function hcCovidPollHesapla() {
    const masks = parseFloat(document.getElementById('hc-covid-masks').value) || 0;
    const gloves = parseFloat(document.getElementById('hc-covid-gloves').value) || 0;

    // Maske ağırlığı: ~4g
    // Eldiven çifti ağırlığı: ~8g
    
    const dailyWaste = (masks * 4) + (gloves * 8); // gram
    const yearlyWaste = (dailyWaste * 365) / 1000; // kg

    document.getElementById('hc-res-covid-waste').innerText = yearlyWaste.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    
    document.getElementById('hc-covid-poll-result').classList.add('visible');
}
