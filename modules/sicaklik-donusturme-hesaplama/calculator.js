function hcTempConvHesapla() {
    const val = parseFloat(document.getElementById('hc-tc-val').value) || 0;
    const unit = document.getElementById('hc-tc-unit').value;

    let c = 0;
    if (unit === 'C') c = val;
    else if (unit === 'F') c = (val - 32) * 5 / 9;
    else if (unit === 'K') c = val - 273.15;

    const f = (c * 9 / 5) + 32;
    const k = c + 273.15;

    document.getElementById('hc-res-tc-c').innerText = c.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C';
    document.getElementById('hc-res-tc-f').innerText = f.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °F';
    document.getElementById('hc-res-tc-k').innerText = k.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' K';
}
