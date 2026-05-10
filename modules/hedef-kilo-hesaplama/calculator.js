function hcTargetWeightHesapla() {
    const height = parseFloat(document.getElementById('hc-tw-height').value) / 100;
    const targetVki = parseFloat(document.getElementById('hc-tw-vki').value);

    if (!height || !targetVki) return;

    const targetWeight = targetVki * (height * height);

    document.getElementById('hc-tw-res-val').innerText = targetWeight.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-target-weight-result').classList.add('visible');
}
