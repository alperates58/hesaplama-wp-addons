function hcTamponpHHesapla() {
    const pka = parseFloat(document.getElementById('hc-bp-pka').value);
    const salt = parseFloat(document.getElementById('hc-bp-salt').value);
    const acid = parseFloat(document.getElementById('hc-bp-acid').value);

    if (isNaN(pka) || !salt || !acid) return;

    // pH = pKa + log([A-] / [HA])
    const ph = pka + Math.log10(salt / acid);

    document.getElementById('hc-bp-val').innerText = ph.toFixed(2);
    document.getElementById('hc-bp-result').classList.add('visible');
}
