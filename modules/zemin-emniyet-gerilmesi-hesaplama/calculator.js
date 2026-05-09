function hcSoilBearingHesapla() {
    const qu = parseFloat(document.getElementById('hc-sb-qu').value) || 0;
    const fs = parseFloat(document.getElementById('hc-sb-fs').value) || 3;

    if (qu <= 0 || fs <= 0) return;

    const qem = qu / fs;

    document.getElementById('hc-res-sb-val').innerText = qem.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kPa';
    document.getElementById('hc-soil-bearing-result').classList.add('visible');
}
