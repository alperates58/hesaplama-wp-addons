function hcCompressionRatioHesapla() {
    const vd = parseFloat(document.getElementById('hc-cr-stroke').value) || 0;
    const vc = parseFloat(document.getElementById('hc-cr-comb').value) || 1;

    const cr = (vd + vc) / vc;

    document.getElementById('hc-res-cr-val').innerText = cr.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ':1';
    document.getElementById('hc-compression-ratio-result').classList.add('visible');
}
