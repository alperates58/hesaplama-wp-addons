function hcPanelSayisiHesapla() {
    const monthly = parseFloat(document.getElementById('hc-sq-monthly').value);
    const sun = parseFloat(document.getElementById('hc-sq-sun').value);
    const panelWatt = parseFloat(document.getElementById('hc-sq-panel').value);

    if (isNaN(monthly) || isNaN(sun)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const dailyKwh = monthly / 30;
    const systemLoss = 0.75; // 25% losses (inverter, cables, dirt)
    
    // Required kWp = Daily kWh / (Daily Sun Hours * Loss)
    const requiredKwp = dailyKwh / (sun * systemLoss);
    const panelCount = Math.ceil((requiredKwp * 1000) / panelWatt);

    document.getElementById('hc-res-sq-power').innerText = requiredKwp.toFixed(2) + ' kWp';
    document.getElementById('hc-res-sq-count').innerText = panelCount + ' Adet';

    document.getElementById('hc-sq-result').classList.add('visible');
}
