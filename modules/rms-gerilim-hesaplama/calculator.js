function hcRmsVoltHesapla() {
    const vp = parseFloat(document.getElementById('hc-rv-val').value) || 0;

    const vrms = vp / Math.sqrt(2);
    const vpp = vp * 2;

    document.getElementById('hc-res-rv-rms').innerText = vrms.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' V';
    document.getElementById('hc-res-rv-pp').innerText = vpp.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' V';
}
