function hcRivetCalcHesapla() {
    const T = parseFloat(document.getElementById('hc-rc-thick').value);
    const D = parseFloat(document.getElementById('hc-rc-diam').value);

    if (!T || !D) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    // Standard formula: L = T + 1.5D
    const L = T + (1.5 * D);

    const resVal = document.getElementById('hc-rc-res-val');
    resVal.innerText = L.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-rivet-result').classList.add('visible');
}
