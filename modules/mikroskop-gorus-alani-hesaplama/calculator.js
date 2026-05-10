function hcMicFovHesapla() {
    const fn = parseFloat(document.getElementById('hc-mf-fn').value);
    const objective = parseFloat(document.getElementById('hc-mf-obj').value);

    if (!fn || !objective) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    // FOV Diameter = Field Number / Objective Magnification
    const fov = fn / objective;

    const resVal = document.getElementById('hc-mf-res-val');
    resVal.innerText = fov.toFixed(3).toLocaleString('tr-TR');

    document.getElementById('hc-mic-fov-result').classList.add('visible');
}
