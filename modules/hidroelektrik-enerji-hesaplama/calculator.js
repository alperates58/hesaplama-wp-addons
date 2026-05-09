function hcHidroEnerjiHesapla() {
    const power = parseFloat(document.getElementById('hc-he-power').value);
    const hours = parseFloat(document.getElementById('hc-he-hours').value);
    const days = parseFloat(document.getElementById('hc-he-days').value);

    if (isNaN(power) || isNaN(hours) || isNaN(days)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const totalKwh = power * hours * days;
    const totalMwh = totalKwh / 1000;

    document.getElementById('hc-res-he-kwh').innerText = totalKwh.toLocaleString('tr-TR') + ' kWh';
    document.getElementById('hc-res-he-mwh').innerText = totalMwh.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' MWh';

    document.getElementById('hc-he-result').classList.add('visible');
}
