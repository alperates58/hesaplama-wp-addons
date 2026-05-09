function hcSolarYonHesapla() {
    const power = parseFloat(document.getElementById('hc-sd-power').value);
    const dirCoeff = parseFloat(document.getElementById('hc-sd-direction').value);
    const tiltCoeff = parseFloat(document.getElementById('hc-sd-tilt').value);

    if (isNaN(power)) {
        alert('Lütfen sistem gücünü girin.');
        return;
    }

    const totalCoeff = dirCoeff * tiltCoeff;
    const lossPercent = (1 - totalCoeff) * 100;

    document.getElementById('hc-res-sd-coeff').innerText = '%' + (totalCoeff * 100).toFixed(1);
    document.getElementById('hc-res-sd-loss').innerText = '%' + lossPercent.toFixed(1);

    document.getElementById('hc-sd-result').classList.add('visible');
}
