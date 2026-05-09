function hcAHRHesapla() {
    const v0 = parseFloat(document.getElementById('hc-ah-r-v0').value);
    const angleDeg = parseFloat(document.getElementById('hc-ah-r-angle').value);
    const g = 9.80665;

    if (isNaN(v0) || isNaN(angleDeg)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    const range = (Math.pow(v0, 2) * Math.sin(2 * rad)) / g;

    document.getElementById('hc-ah-r-val').innerText = range.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-ah-r-result').classList.add('visible');
}
