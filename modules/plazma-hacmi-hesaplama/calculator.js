function hcPlazmaHacmiHesapla() {
    const bv = parseFloat(document.getElementById('hc-pv-bv').value);
    const hct = parseFloat(document.getElementById('hc-pv-hct').value) / 100;

    if (!bv || isNaN(hct)) return;

    // PV = BV * (1 - Hct)
    const pv = bv * (1 - hct);

    document.getElementById('hc-pv-val').innerText = pv.toFixed(2) + ' Litre';
    document.getElementById('hc-pv-result').classList.add('visible');
}
