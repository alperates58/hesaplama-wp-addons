function hcOlrHesapla() {
    const q = parseFloat(document.getElementById('hc-ol-flow').value);
    const s = parseFloat(document.getElementById('hc-ol-conc').value);
    const v = parseFloat(document.getElementById('hc-ol-vol').value);

    if (!q || !s || !v) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // OLR = (Q * S) / (V * 1000) -> mg/L'den kg/m3'e dönüşüm için 1000'e bölüyoruz.
    const olr = (q * s) / (v * 1000);

    const resVal = document.getElementById('hc-ol-res-val');
    resVal.innerText = olr.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-olr-calc-result').classList.add('visible');
}
