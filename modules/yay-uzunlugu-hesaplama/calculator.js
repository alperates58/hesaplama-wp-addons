function hcArcLenHesapla() {
    const r = parseFloat(document.getElementById('hc-al-r').value);
    const angle = parseFloat(document.getElementById('hc-al-angle').value);

    if (isNaN(r) || isNaN(angle) || r <= 0 || angle <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // s = 2 * π * r * (angle / 360)
    const s = 2 * Math.PI * r * (angle / 360);

    document.getElementById('hc-al-res-val').innerText = s.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-yay-uzunlugu-result').classList.add('visible');
}
