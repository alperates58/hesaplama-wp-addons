function hcBAHesapla() {
    const n1 = parseFloat(document.getElementById('hc-ba-n1').value);
    const n2 = parseFloat(document.getElementById('hc-ba-n2').value);

    if (isNaN(n1) || isNaN(n2) || n1 <= 0 || n2 <= 0) {
        alert('Lütfen geçerli pozitif kırılma indisleri giriniz.');
        return;
    }

    // theta_B = arctan(n2 / n1)
    const angleRad = Math.atan(n2 / n1);
    const angleDeg = angleRad * (180 / Math.PI);

    document.getElementById('hc-ba-val').innerText = angleDeg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '°';
    document.getElementById('hc-ba-result').classList.add('visible');
}
