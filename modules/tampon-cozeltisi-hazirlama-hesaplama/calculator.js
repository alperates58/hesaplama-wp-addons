function hcBufferPrepHesapla() {
    const mw = parseFloat(document.getElementById('hc-bp-mw').value);
    const molarity = parseFloat(document.getElementById('hc-bp-molarity').value);
    const volumeMl = parseFloat(document.getElementById('hc-bp-volume').value);

    if (!mw || !molarity || !volumeMl) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // m = M * V * MW (V Litre cinsinden)
    const mass = molarity * (volumeMl / 1000) * mw;

    const resVal = document.getElementById('hc-bp-res-val');
    resVal.innerText = mass.toFixed(4).toLocaleString('tr-TR');

    document.getElementById('hc-buffer-prep-result').classList.add('visible');
}
