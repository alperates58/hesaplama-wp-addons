function hcKonsolHesapla() {
    const activeWatt = parseFloat(document.getElementById('hc-cp-type').value);
    const activeHours = parseFloat(document.getElementById('hc-cp-hours').value);
    const standbyHours = parseFloat(document.getElementById('hc-cp-standby').value);

    if (isNaN(activeHours) || isNaN(standbyHours)) {
        alert('Lütfen süreleri girin.');
        return;
    }

    const standbyWatt = 3; // Average rest mode
    const dailyKwh = ((activeWatt * activeHours) + (standbyWatt * standbyHours)) / 1000;
    const monthlyKwh = dailyKwh * 30;
    const price = 3.11;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-cp-kwh').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-cp-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-cp-result').classList.add('visible');
}
