function hcIvFlowHesapla() {
    const vol = parseFloat(document.getElementById('hc-iv-vol').value);
    const hours = parseFloat(document.getElementById('hc-iv-hours').value);
    const factor = parseFloat(document.getElementById('hc-iv-factor').value);

    if (isNaN(vol) || isNaN(hours) || hours <= 0) {
        alert('Lütfen geçerli hacim ve süre değerleri girin.');
        return;
    }

    const minutes = hours * 60;
    const mlPerHour = vol / hours;
    const dropsPerMin = (vol * factor) / minutes;

    document.getElementById('hc-iv-res-gtt').innerText = Math.round(dropsPerMin).toLocaleString('tr-TR') + ' damla/dak';
    document.getElementById('hc-iv-res-mlhr').innerText = mlPerHour.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' ml/saat';
    
    document.getElementById('hc-iv-result').classList.add('visible');
}
