function hcKargoKarbonAyakİziHesapla() {
    const weight = parseFloat(document.getElementById('hc-cr-weight').value);
    const dist = parseFloat(document.getElementById('hc-cr-dist').value);
    const modeFactor = parseFloat(document.getElementById('hc-cr-mode').value);

    if (!weight || !dist) return;

    // Emisyon = (Ton * km * Faktör)
    const co2 = (weight / 1000) * dist * modeFactor;

    document.getElementById('hc-cr-val').innerText = co2.toFixed(3) + ' kg CO₂e';
    document.getElementById('hc-cr-result').classList.add('visible');
}
