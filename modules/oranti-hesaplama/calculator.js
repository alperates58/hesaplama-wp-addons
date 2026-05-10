function hcPropHesapla() {
    const a = parseFloat(document.getElementById('hc-p-a').value);
    const b = parseFloat(document.getElementById('hc-p-b').value);
    const c = parseFloat(document.getElementById('hc-p-c').value);

    if (isNaN(a) || isNaN(b) || isNaN(c)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    if (a === 0) {
        alert('a değeri 0 olamaz.');
        return;
    }

    // a/b = c/x => x = (b * c) / a
    const x = (b * c) / a;

    document.getElementById('hc-p-res-val').innerText = x.toLocaleString('tr-TR');
    document.getElementById('hc-prop-result').classList.add('visible');
}
