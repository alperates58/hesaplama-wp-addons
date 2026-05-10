function hcPlateWeightHesapla() {
    const w = parseFloat(document.getElementById('hc-pw-w').value);
    const l = parseFloat(document.getElementById('hc-pw-l').value);
    const t = parseFloat(document.getElementById('hc-pw-t').value);
    const density = parseFloat(document.getElementById('hc-pw-mat').value);

    if (!w || !l || !t) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    // Weight = (W/1000 * L/1000 * T) * Density
    const weight = (w / 1000) * (l / 1000) * t * density;

    const resVal = document.getElementById('hc-pw-res-val');
    resVal.innerText = weight.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-plate-result').classList.add('visible');
}
