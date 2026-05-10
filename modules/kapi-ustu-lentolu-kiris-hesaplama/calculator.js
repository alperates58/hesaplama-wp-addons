function hcHeaderBeamHesapla() {
    const span = parseFloat(document.getElementById('hc-hb-span').value);
    const loadPerM = parseFloat(document.getElementById('hc-hb-load').value);

    if (!span || !loadPerM) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    const totalLoad = span * loadPerM;

    const resVal = document.getElementById('hc-hb-res-val');
    resVal.innerText = Math.round(totalLoad).toLocaleString('tr-TR');

    document.getElementById('hc-header-result').classList.add('visible');
}
