function hcPctDecHesapla() {
    const val = parseFloat(document.getElementById('hc-pd-val').value);
    const pct = parseFloat(document.getElementById('hc-pd-pct').value);

    if (isNaN(val) || isNaN(pct)) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    const diff = (val * pct) / 100;
    const newVal = val - diff;

    document.getElementById('hc-pd-res-val').innerText = newVal.toLocaleString('tr-TR');
    document.getElementById('hc-pd-diff').innerText = `Azalış Miktarı: ${diff.toLocaleString('tr-TR')}`;
    document.getElementById('hc-yuzde-azalis-result').classList.add('visible');
}
