function hcHwRatioHesapla() {
    const height = parseFloat(document.getElementById('hc-hr-height').value);
    const weight = parseFloat(document.getElementById('hc-hr-weight').value);

    if (!height || !weight) return;

    const ratio = (weight * 1000) / height;

    document.getElementById('hc-hr-res-val').innerText = Math.round(ratio).toLocaleString('tr-TR') + ' g/cm';
    document.getElementById('hc-hw-ratio-result').classList.add('visible');
}
