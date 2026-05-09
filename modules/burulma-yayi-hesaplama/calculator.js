function hcBYHesapla() {
    const k = parseFloat(document.getElementById('hc-by-k').value);
    const angleDeg = parseFloat(document.getElementById('hc-by-angle').value);

    if (isNaN(k) || isNaN(angleDeg)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = angleDeg * (Math.PI / 180);
    const torque = k * rad;

    document.getElementById('hc-by-val').innerText = torque.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' N·m';
    document.getElementById('hc-by-result').classList.add('visible');
}
