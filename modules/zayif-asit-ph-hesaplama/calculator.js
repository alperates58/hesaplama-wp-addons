function hcZayıfAsitpHHesapla() {
    const ka = parseFloat(document.getElementById('hc-wa-ka').value);
    const c = parseFloat(document.getElementById('hc-wa-c').value);

    if (!ka || !c) return;

    // [H+] = sqrt(Ka * C) for weak acids (approx)
    const h = Math.sqrt(ka * c);
    const ph = -Math.log10(h);

    document.getElementById('hc-wa-val').innerText = ph.toFixed(2);
    document.getElementById('hc-wa-result').classList.add('visible');
}
