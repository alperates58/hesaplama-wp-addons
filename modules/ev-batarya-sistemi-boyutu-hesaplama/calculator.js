function hcBataryaBoyutuHesapla() {
    const daily = parseFloat(document.getElementById('hc-hbs-daily').value);
    const days = parseFloat(document.getElementById('hc-hbs-days').value);
    const dod = parseFloat(document.getElementById('hc-hbs-dod').value);

    if (isNaN(daily) || isNaN(days) || isNaN(dod)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const netCapacity = daily * days;
    const totalCapacity = netCapacity / (dod / 100);

    document.getElementById('hc-res-hbs-net').innerText = netCapacity.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    document.getElementById('hc-res-hbs-total').innerText = totalCapacity.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';

    document.getElementById('hc-hbs-result').classList.add('visible');
}
