function hcSoilSettlementHesapla() {
    const h = parseFloat(document.getElementById('hc-ss-h').value) || 0;
    const cc = parseFloat(document.getElementById('hc-ss-cc').value) || 0;
    const e0 = parseFloat(document.getElementById('hc-ss-e0').value) || 1;
    const p0 = parseFloat(document.getElementById('hc-ss-p0').value) || 1;
    const dp = parseFloat(document.getElementById('hc-ss-dp').value) || 0;

    if (h <= 0 || p0 <= 0) return;

    // Settlement in meters
    const sc = h * (cc / (1 + e0)) * Math.log10((p0 + dp) / p0);
    const scCm = sc * 100;

    document.getElementById('hc-res-ss-val').innerText = scCm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm';
    document.getElementById('hc-soil-settlement-result').classList.add('visible');
}
