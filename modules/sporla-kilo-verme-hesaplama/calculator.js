function hcSportWeightLossHesapla() {
    const targetKg = parseFloat(document.getElementById('hc-sw-target').value);
    const weight = parseFloat(document.getElementById('hc-sw-weight').value);
    const met = parseFloat(document.getElementById('hc-sw-activity').value);
    const dailyMins = parseFloat(document.getElementById('hc-sw-daily').value);

    if (!targetKg || !weight || !dailyMins) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // 1kg yağ kaybı yaklaşık 7700 kcal
    const totalKcalNeeded = targetKg * 7700;
    
    // Saat başına yakılan kalori = MET * kg
    const kcalPerHour = met * weight;
    
    const totalHoursNeeded = totalKcalNeeded / kcalPerHour;
    const totalDaysNeeded = (totalHoursNeeded * 60) / dailyMins;

    document.getElementById('hc-sw-res-total-kcal').innerText = totalKcalNeeded.toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-sw-res-days').innerText = Math.ceil(totalDaysNeeded) + ' Gün';
    document.getElementById('hc-sw-res-val').innerText = totalHoursNeeded.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Saat';

    document.getElementById('hc-sport-weightloss-result').classList.add('visible');
}
