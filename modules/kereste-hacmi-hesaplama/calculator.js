function hcLumberVolHesapla() {
    const t = parseFloat(document.getElementById('hc-lv-t').value);
    const w = parseFloat(document.getElementById('hc-lv-w').value);
    const l = parseFloat(document.getElementById('hc-lv-l').value);
    const n = parseFloat(document.getElementById('hc-lv-n').value || 1);

    if (!t || !w || !l) {
        alert('Lütfen tüm boyutları giriniz.');
        return;
    }

    // Volume in m3 = (T/1000 * W/1000 * L) * N
    const totalVol = (t / 1000) * (w / 1000) * l * n;

    const resVal = document.getElementById('hc-lv-res-val');
    resVal.innerText = totalVol.toFixed(4).toLocaleString('tr-TR');

    document.getElementById('hc-lumber-vol-result').classList.add('visible');
}
