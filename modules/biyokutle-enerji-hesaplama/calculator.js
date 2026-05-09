function hcBiyokutleEnerjiHesapla() {
    const mass = parseFloat(document.getElementById('hc-be-mass').value);
    const lhv = parseFloat(document.getElementById('hc-be-type').value);

    if (isNaN(mass)) {
        alert('Lütfen biyokütle miktarını girin.');
        return;
    }

    const totalMJ = mass * lhv;
    const totalKwh = totalMJ / 3.6; // 1 kWh = 3.6 MJ

    document.getElementById('hc-res-be-mj').innerText = totalMJ.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' MJ';
    document.getElementById('hc-res-be-kwh').innerText = totalKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';

    document.getElementById('hc-be-result').classList.add('visible');
}
