function hcAHYHesapla() {
    const v0 = parseFloat(document.getElementById('hc-ah-y-v0').value);
    const angleDeg = parseFloat(document.getElementById('hc-ah-y-angle').value);
    const x = parseFloat(document.getElementById('hc-ah-y-x').value);
    const g = 9.80665;

    if (isNaN(v0) || isNaN(angleDeg) || isNaN(x)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    
    // y = x*tan(theta) - (g*x^2) / (2*v0^2*cos^2(theta))
    const term1 = x * Math.tan(rad);
    const term2 = (g * Math.pow(x, 2)) / (2 * Math.pow(v0, 2) * Math.pow(Math.cos(rad), 2));
    const y = term1 - term2;

    if (y < 0) {
        document.getElementById('hc-ah-y-val').innerText = '0 m (Yere Çarptı)';
    } else {
        document.getElementById('hc-ah-y-val').innerText = y.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    }
    
    document.getElementById('hc-ah-y-result').classList.add('visible');
}
