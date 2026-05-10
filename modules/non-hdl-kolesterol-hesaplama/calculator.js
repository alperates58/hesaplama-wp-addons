function hcNonHDLHesapla() {
    const tc = parseFloat(document.getElementById('hc-nh-tc').value);
    const hdl = parseFloat(document.getElementById('hc-nh-hdl').value);

    if (!tc || !hdl) return;

    // Non-HDL = TC - HDL
    const nonHdl = tc - hdl;

    document.getElementById('hc-nh-val').innerText = nonHdl + ' mg/dL';
    document.getElementById('hc-nh-result').classList.add('visible');
}
