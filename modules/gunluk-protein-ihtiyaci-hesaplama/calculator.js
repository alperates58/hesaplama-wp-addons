function hcProteinHesapla() {
    const weight = parseFloat(document.getElementById('hc-p-weight').value);
    const factor = parseFloat(document.getElementById('hc-p-activity').value);

    if (!weight) return;

    const total = weight * factor;

    document.getElementById('hc-p-res-val').innerText = Math.round(total);
    document.getElementById('hc-protein-result').classList.add('visible');
}
