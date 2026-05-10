function hcTamponKapasitesiHesapla() {
    const mol = parseFloat(document.getElementById('hc-bc-mol').value);
    const ph1 = parseFloat(document.getElementById('hc-bc-ph1').value);
    const ph2 = parseFloat(document.getElementById('hc-bc-ph2').value);

    if (!mol || isNaN(ph1) || isNaN(ph2)) return;

    // β = Δn / ΔpH
    const dPh = Math.abs(ph2 - ph1);
    if (dPh === 0) return;

    const capacity = mol / dPh;

    document.getElementById('hc-bc-val').innerText = capacity.toFixed(4);
    document.getElementById('hc-bc-result').classList.add('visible');
}
