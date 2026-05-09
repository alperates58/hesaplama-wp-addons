function hcEvSuHesapla() {
    const people = parseFloat(document.getElementById('hc-water-people').value) || 1;
    const shower = parseFloat(document.getElementById('hc-water-shower').value) || 0;
    const toilet = parseFloat(document.getElementById('hc-water-toilet').value) || 0;
    const faucet = parseFloat(document.getElementById('hc-water-faucet').value) || 0;

    // 2026 Ortalama Tüketim Değerleri:
    // Duş: 9.5 L/dk
    // Tuvalet: 6 L/basım (Yarım/Tam ortalama)
    // Musluk: 6 L/dk
    // Çamaşır/Bulaşık payı (kişi başı günlük): ~20 L
    
    const dailyShower = people * shower * 9.5;
    const dailyToilet = people * toilet * 6;
    const dailyFaucet = people * faucet * 6;
    const dailyMisc = people * 20;

    const totalDaily = dailyShower + dailyToilet + dailyFaucet + dailyMisc;
    const totalMonthlyM3 = (totalDaily * 30) / 1000;

    document.getElementById('hc-res-water-daily').innerText = Math.round(totalDaily).toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-res-water-monthly').innerText = totalMonthlyM3.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' m³';
    
    document.getElementById('hc-ev-su-tuketimi-result').classList.add('visible');
}
