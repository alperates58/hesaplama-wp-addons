function hcDimWeightHesapla() {
    const w = parseFloat(document.getElementById('hc-dw-w').value);
    const l = parseFloat(document.getElementById('hc-dw-l').value);
    const h = parseFloat(document.getElementById('hc-dw-h').value);
    const density = parseFloat(document.getElementById('hc-dw-mat').value);

    if (!w || !l || !h) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    // Volume in m3 = (w/100 * l/100 * h/100)
    const vol = (w / 100) * (l / 100) * (h / 100);
    const weight = vol * density;

    const resVal = document.getElementById('hc-dw-res-val');
    resVal.innerText = weight.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-dim-weight-result').classList.add('visible');
}
