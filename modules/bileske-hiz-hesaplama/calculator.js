function hcBHHesapla() {
    const v1 = parseFloat(document.getElementById('hc-bh-v1').value);
    const v2 = parseFloat(document.getElementById('hc-bh-v2').value);
    const angleDeg = parseFloat(document.getElementById('hc-bh-angle').value);

    if (isNaN(v1) || isNaN(v2) || isNaN(angleDeg)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    // V = sqrt(v1^2 + v2^2 + 2*v1*v2*cos(theta))
    const vTotal = Math.sqrt(Math.pow(v1, 2) + Math.pow(v2, 2) + (2 * v1 * v2 * Math.cos(rad)));

    document.getElementById('hc-bh-val').innerText = vTotal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m/s';
    document.getElementById('hc-bh-result').classList.add('visible');
}
