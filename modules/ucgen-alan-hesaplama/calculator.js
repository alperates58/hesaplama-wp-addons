function hcTriAreaHesapla() {
    const b = parseFloat(document.getElementById('hc-ta-base').value);
    const h = parseFloat(document.getElementById('hc-ta-height').value);

    if (isNaN(b) || isNaN(h) || b <= 0 || h <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const area = (b * h) / 2;

    document.getElementById('hc-ta-res-val').innerText = area.toLocaleString('tr-TR');
    document.getElementById('hc-ucgen-alan-result').classList.add('visible');
}
