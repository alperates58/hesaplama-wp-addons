function hcOvenTempHesapla() {
    const val = parseFloat(document.getElementById('hc-ot-val').value) || 0;
    const from = document.getElementById('hc-ot-from').value;

    let c = 0;
    if (from === 'C') c = val;
    else if (from === 'F') c = (val - 32) * 5 / 9;
    else if (from === 'G') c = (val * 14) + 121; // Approximate Gas Mark conversion

    const f = (c * 9 / 5) + 32;
    const g = Math.round((c - 121) / 14);

    document.getElementById('hc-res-ot-c').innerText = Math.round(c) + ' °C';
    document.getElementById('hc-res-ot-f').innerText = Math.round(f) + ' °F';
    document.getElementById('hc-res-ot-g').innerText = g > 0 ? g : '1/4';
    
    document.getElementById('hc-oven-temp-result').classList.add('visible');
}
