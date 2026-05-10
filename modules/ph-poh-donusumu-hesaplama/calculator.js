function hcpHpOHDönüşümüHesapla() {
    const val = parseFloat(document.getElementById('hc-pp-val').value);
    const type = document.getElementById('hc-pp-type').value;

    if (isNaN(val)) return;

    // pH + pOH = 14
    const res = 14 - val;
    const label = type === 'ph' ? 'pOH: ' : 'pH: ';

    document.getElementById('hc-pp-res').innerText = label + res.toFixed(2);
    document.getElementById('hc-pp-result').classList.add('visible');
}
