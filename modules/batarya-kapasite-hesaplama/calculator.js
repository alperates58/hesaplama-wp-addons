function hcBataryaKapasiteHesapla() {
    const v = parseFloat(document.getElementById('hc-bc-voltage').value);
    const ah = parseFloat(document.getElementById('hc-bc-ah').value);

    if (isNaN(v) || isNaN(ah)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const wh = v * ah;
    const kwh = wh / 1000;

    document.getElementById('hc-res-bc-wh').innerText = wh.toLocaleString('tr-TR') + ' Wh';
    document.getElementById('hc-res-bc-kwh').innerText = kwh.toLocaleString('tr-TR', { minimumFractionDigits: 3 }) + ' kWh';

    document.getElementById('hc-bc-result').classList.add('visible');
}
