function hcATHHesapla() {
    const v0 = parseFloat(document.getElementById('hc-ah-t-v0').value);
    const angleDeg = parseFloat(document.getElementById('hc-ah-t-angle').value);
    const g = 9.80665;

    if (isNaN(v0) || isNaN(angleDeg)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    const tFlight = (2 * v0 * Math.sin(rad)) / g;

    document.getElementById('hc-ah-t-val').innerText = tFlight.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' s';
    document.getElementById('hc-ah-t-result').classList.add('visible');
}
