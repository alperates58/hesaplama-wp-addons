function hcHardnessHesapla() {
    const hrc = parseFloat(document.getElementById('hc-hc-val').value) || 0;

    // Polynomial approximations for HRC to HB/HV/TS
    // These are simplified for the common HRC range 20-70
    let hb = 0, hv = 0, ts = 0;

    if (hrc >= 20) {
        hb = 0.0001 * Math.pow(hrc, 3) + 0.11 * Math.pow(hrc, 2) + 1.8 * hrc + 185;
        hv = 0.0001 * Math.pow(hrc, 3) + 0.12 * Math.pow(hrc, 2) + 2.0 * hrc + 190;
        ts = hb * 3.45; // Rough estimate
    }

    document.getElementById('hc-res-hc-hb').innerText = Math.round(hb);
    document.getElementById('hc-res-hc-hv').innerText = Math.round(hv);
    document.getElementById('hc-res-hc-ts').innerText = Math.round(ts);
}
