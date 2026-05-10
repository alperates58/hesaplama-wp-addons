function hcPctIncHesapla() {
    const val = parseFloat(document.getElementById('hc-pi-val').value);
    const pct = parseFloat(document.getElementById('hc-pi-pct').value);

    if (isNaN(val) || isNaN(pct)) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    const diff = (val * pct) / 100;
    const newVal = val + diff;

    document.getElementById('hc-pi-res-val').innerText = newVal.toLocaleString('tr-TR');
    document.getElementById('hc-pi-diff').innerText = `Artış Miktarı: ${diff.toLocaleString('tr-TR')}`;
    document.getElementById('hc-yuzde-artis-result').classList.add('visible');
}
