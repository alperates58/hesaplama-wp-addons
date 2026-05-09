function hcAHHHesapla() {
    const v0 = parseFloat(document.getElementById('hc-ah-h-v0').value);
    const angleDeg = parseFloat(document.getElementById('hc-ah-h-angle').value);
    const g = 9.80665;

    if (isNaN(v0) || isNaN(angleDeg)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    const hMax = (Math.pow(v0, 2) * Math.pow(Math.sin(rad), 2)) / (2 * g);

    document.getElementById('hc-ah-h-val').innerText = hMax.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-ah-h-result').classList.add('visible');
}
