function hcFatMassHesapla() {
    const weight = parseFloat(document.getElementById('hc-fm-weight').value);
    const percent = parseFloat(document.getElementById('hc-fm-percent').value);

    if (!weight || isNaN(percent)) return;

    const fatMass = weight * (percent / 100);

    document.getElementById('hc-fm-res-val').innerText = fatMass.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-fat-mass-result').classList.add('visible');
}
