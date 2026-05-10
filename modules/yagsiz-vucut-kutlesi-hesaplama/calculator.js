function hcLbmCalcHesapla() {
    const weight = parseFloat(document.getElementById('hc-lbm-weight').value);
    const percent = parseFloat(document.getElementById('hc-lbm-percent').value);

    if (!weight || isNaN(percent)) return;

    const leanMass = weight * (1 - (percent / 100));

    document.getElementById('hc-lbm-res-val').innerText = leanMass.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-lbm-calc-result').classList.add('visible');
}
