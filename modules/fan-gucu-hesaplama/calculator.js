function hcFanPowerHesapla() {
    const qM3h = parseFloat(document.getElementById('hc-fp-q').value);
    const pPa = parseFloat(document.getElementById('hc-fp-p').value);
    const eta = parseFloat(document.getElementById('hc-fp-eta').value);

    if (isNaN(qM3h) || isNaN(pPa) || isNaN(eta) || eta <= 0 || qM3h < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Q in m3/s = Q(m3/h) / 3600
    const qM3s = qM3h / 3600;

    // P(Watt) = (Q * p) / eta
    const power = (qM3s * pPa) / eta;

    document.getElementById('hc-fp-res-val').innerText = Math.round(power).toLocaleString('tr-TR') + ' Watt';
    document.getElementById('hc-fp-res-kw').innerText = (power / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kW';
    
    document.getElementById('hc-fp-result').classList.add('visible');
}
