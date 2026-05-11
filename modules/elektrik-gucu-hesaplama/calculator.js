function hcEpTogglePf() {
    const phase = document.getElementById('hc-ep-phase').value;
    document.getElementById('hc-ep-pf-group').style.display = (phase === 'dc' ? 'none' : 'block');
}

function hcElecPowerHesapla() {
    const i = parseFloat(document.getElementById('hc-ep-i').value);
    const v = parseFloat(document.getElementById('hc-ep-v').value);
    const phase = document.getElementById('hc-ep-phase').value;
    let pf = parseFloat(document.getElementById('hc-ep-pf').value);

    if (isNaN(i) || isNaN(v) || i < 0 || v < 0) {
        alert('Lütfen geçerli akım ve gerilim değerleri girin.');
        return;
    }

    if (phase === 'dc') pf = 1;
    if (isNaN(pf) || pf < 0 || pf > 1) pf = 1;

    let power = 0;
    if (phase === 'dc' || phase === '1ac') {
        // P = V * I * pf
        power = v * i * pf;
    } else if (phase === '3ac') {
        // P = sqrt(3) * V * I * pf
        power = Math.sqrt(3) * v * i * pf;
    }

    document.getElementById('hc-ep-res-val').innerText = Math.round(power).toLocaleString('tr-TR') + ' Watt';
    document.getElementById('hc-ep-res-kw').innerText = (power / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kW';
    
    document.getElementById('hc-ep-result').classList.add('visible');
}
