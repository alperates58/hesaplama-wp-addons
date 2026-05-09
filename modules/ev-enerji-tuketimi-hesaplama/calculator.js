function hcHCEkle() {
    const container = document.getElementById('hc-hc-devices');
    const row = document.createElement('div');
    row.className = 'hc-hc-device-row';
    row.innerHTML = `
        <input type="text" placeholder="Cihaz Adı" class="hc-hc-name">
        <input type="number" placeholder="Watt" class="hc-hc-watt">
        <input type="number" placeholder="Saat/Gün" class="hc-hc-hours">
        <button onclick="this.parentElement.remove()" class="hc-hc-remove">×</button>
    `;
    container.appendChild(row);
}

function hcEvEnerjiHesapla() {
    const names = document.querySelectorAll('.hc-hc-name');
    const watts = document.querySelectorAll('.hc-hc-watt');
    const hours = document.querySelectorAll('.hc-hc-hours');

    let dailyTotalWh = 0;

    for (let i = 0; i < watts.length; i++) {
        const w = parseFloat(watts[i].value) || 0;
        const h = parseFloat(hours[i].value) || 0;
        dailyTotalWh += (w * h);
    }

    const dailyKwh = dailyTotalWh / 1000;
    const monthlyKwh = dailyKwh * 30;

    document.getElementById('hc-res-hc-daily').innerText = dailyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-hc-monthly').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';

    document.getElementById('hc-hc-result').classList.add('visible');
}
