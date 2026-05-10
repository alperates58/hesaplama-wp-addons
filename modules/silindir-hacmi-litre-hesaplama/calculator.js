function hcCylLitreHesapla() {
    const r = parseFloat(document.getElementById('hc-cl-radius').value); // cm
    const h = parseFloat(document.getElementById('hc-cl-height').value); // cm

    if (isNaN(r) || isNaN(h) || r <= 0 || h <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // V = π * r² * h (cm³)
    // 1000 cm³ = 1 Litre
    const volCm3 = Math.PI * Math.pow(r, 2) * h;
    const litre = volCm3 / 1000;

    document.getElementById('hc-cl-res-val').innerText = litre.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-silindir-litre-result').classList.add('visible');
}
