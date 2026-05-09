function hcPpmConvert() {
    const ppm = parseFloat(document.getElementById('hc-ppm-val').value);
    if (isNaN(ppm)) return;

    document.getElementById('hc-ppm-pct').innerText = (ppm / 10000).toLocaleString('tr-TR') + " %";
    document.getElementById('hc-ppm-mgl').innerText = ppm.toLocaleString('tr-TR') + " mg/L";
    document.getElementById('hc-ppm-ppb').innerText = (ppm * 1000).toLocaleString('tr-TR') + " ppb";
    document.getElementById('hc-ppm-dec').innerText = (ppm / 1000000).toFixed(6);
}
window.addEventListener('load', hcPpmConvert);
