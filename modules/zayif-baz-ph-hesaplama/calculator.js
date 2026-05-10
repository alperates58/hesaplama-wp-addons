function hcZayıfBazpHHesapla() {
    const kb = parseFloat(document.getElementById('hc-wb-kb').value);
    const c = parseFloat(document.getElementById('hc-wb-c').value);

    if (!kb || !c) return;

    // [OH-] = sqrt(Kb * C) for weak bases (approx)
    const oh = Math.sqrt(kb * c);
    const poh = -Math.log10(oh);
    const ph = 14 - poh;

    document.getElementById('hc-wb-val').innerText = ph.toFixed(2);
    document.getElementById('hc-wb-result').classList.add('visible');
}
