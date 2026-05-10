function hcTrapAreaHesapla() {
    const a = parseFloat(document.getElementById('hc-ta-a').value);
    const b = parseFloat(document.getElementById('hc-ta-b').value);
    const h = parseFloat(document.getElementById('hc-ta-h').value);

    if (isNaN(a) || isNaN(b) || isNaN(h) || a <= 0 || b <= 0 || h <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Area = ((a + b) / 2) * h
    const area = ((a + b) / 2) * h;

    document.getElementById('hc-ta-res-val').innerText = area.toLocaleString('tr-TR');
    document.getElementById('hc-yamuk-alan-result').classList.add('visible');
}
