function hcPcHesapla() {
    const watt = parseFloat(document.getElementById('hc-pc-type').value);
    const hours = parseFloat(document.getElementById('hc-pc-hours').value);

    if (isNaN(hours)) {
        alert('Lütfen kullanım süresini girin.');
        return;
    }

    const psuEfficiency = 1.15; // 85% efficient PSU draws 15% more from wall
    const totalWatt = watt * psuEfficiency;
    const monthlyKwh = (totalWatt * hours * 30) / 1000;
    const price = 3.11;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-pc-kwh').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    document.getElementById('hc-res-pc-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-pc-result').classList.add('visible');
}
