function hcNumPctHesapla() {
    const val = parseFloat(document.getElementById('hc-np-val').value);
    const pct = parseFloat(document.getElementById('hc-np-pct').value);

    if (isNaN(val) || isNaN(pct)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const result = (val * pct) / 100;

    document.getElementById('hc-np-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-sayinin-yuzdesi-result').classList.add('visible');
}
