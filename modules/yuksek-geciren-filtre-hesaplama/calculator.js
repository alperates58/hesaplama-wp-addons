function hcHPFHesapla() {
    const r = parseFloat(document.getElementById('hc-hpf-r').value) || 0;
    const c = parseFloat(document.getElementById('hc-hpf-c').value) || 0;

    if (r <= 0 || c <= 0) return;

    const fc = 1 / (2 * Math.PI * r * c);

    let displayVal = fc;
    let unit = ' Hz';

    if (fc >= 1000000) {
        displayVal = fc / 1000000;
        unit = ' MHz';
    } else if (fc >= 1000) {
        displayVal = fc / 1000;
        unit = ' kHz';
    }

    document.getElementById('hc-res-hpf-val').innerText = displayVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + unit;
    document.getElementById('hc-hpf-calc-result').classList.add('visible');
}
