function hcKmHesapla() {
    const v = parseFloat(document.getElementById('hc-km-v').value);
    const s = parseFloat(document.getElementById('hc-km-s').value);
    const vmax = parseFloat(document.getElementById('hc-km-vmax').value);

    if (isNaN(v) || isNaN(s) || isNaN(vmax)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    if (v >= vmax) {
        alert('Reaksiyon hızı Vmax değerinden küçük olmalıdır.');
        return;
    }

    // v = (Vmax * [S]) / (Km + [S])
    // Km + [S] = (Vmax * [S]) / v
    // Km = ((Vmax * [S]) / v) - [S]
    const km = ((vmax * s) / v) - s;

    const resVal = document.getElementById('hc-km-res-val');
    resVal.innerText = km.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-km-calc-result').classList.add('visible');
}
