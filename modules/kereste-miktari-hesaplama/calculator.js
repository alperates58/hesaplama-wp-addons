function hcLumberQtyHesapla() {
    const t = parseFloat(document.getElementById('hc-lq-t').value);
    const w = parseFloat(document.getElementById('hc-lq-w').value);
    const l = parseFloat(document.getElementById('hc-lq-l').value);
    const n = parseFloat(document.getElementById('hc-lq-n').value || 1);

    if (!t || !w || !l) {
        alert('Lütfen tüm boyutları giriniz.');
        return;
    }

    // Volume in m3 = (Thickness/100 * Width/100 * Length) * Count
    const totalVol = (t / 100) * (w / 100) * l * n;

    const resVal = document.getElementById('hc-lq-res-val');
    resVal.innerText = totalVol.toFixed(4).toLocaleString('tr-TR');

    document.getElementById('hc-lumber-qty-result').classList.add('visible');
}
