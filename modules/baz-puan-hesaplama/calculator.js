function hcBPSHesapla() {
    const val = parseFloat(document.getElementById('hc-bps-val').value) || 0;
    const dir = document.getElementById('hc-bps-dir').value;

    let res = 0;
    let unit = "";

    if (dir === 'bps-to-perc') {
        res = val / 100;
        unit = " %";
    } else {
        res = val * 100;
        unit = " bps";
    }

    document.getElementById('hc-bps-res-val').innerText = res.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 }) + unit;

    document.getElementById('hc-bps-result').classList.add('visible');
}
