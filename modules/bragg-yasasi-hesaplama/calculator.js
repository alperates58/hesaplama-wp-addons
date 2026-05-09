function hcBYHesapla() {
    const n = parseInt(document.getElementById('hc-by-n').value);
    const d = parseFloat(document.getElementById('hc-by-d').value);
    const angleDeg = parseFloat(document.getElementById('hc-by-angle').value);

    if (isNaN(n) || isNaN(d) || isNaN(angleDeg) || n < 1 || d <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    // n * lambda = 2 * d * sin(theta)
    const lambda = (2 * d * Math.sin(rad)) / n;

    document.getElementById('hc-by-val').innerText = lambda.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' Å';
    document.getElementById('hc-by-result').classList.add('visible');
}
