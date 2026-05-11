function hcEgzozBorusuHesapla() {
    const qM3h = parseFloat(document.getElementById('hc-eb-q').value);
    const v = parseFloat(document.getElementById('hc-eb-v').value);

    if (isNaN(qM3h) || isNaN(v) || v <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // m3/saat -> m3/sn
    const qM3s = qM3h / 3600;

    // D = sqrt(4Q / (pi * v))
    const dMetre = Math.sqrt((4 * qM3s) / (Math.PI * v));
    const dMm = dMetre * 1000;
    const dInch = dMm / 25.4;

    document.getElementById('hc-eb-res-mm').innerText = Math.ceil(dMm).toLocaleString('tr-TR') + ' mm';
    document.getElementById('hc-eb-res-inch').innerText = dInch.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' inç (yaklaşık)';
    
    document.getElementById('hc-eb-result').classList.add('visible');
}
