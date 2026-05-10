function hcCylVolHesapla() {
    const r = parseFloat(document.getElementById('hc-cv-radius').value);
    const h = parseFloat(document.getElementById('hc-cv-height').value);

    if (isNaN(r) || isNaN(h) || r <= 0 || h <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // V = π * r² * h
    const vol = Math.PI * Math.pow(r, 2) * h;

    document.getElementById('hc-cv-res-val').innerText = vol.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-silindir-hacmi-result').classList.add('visible');
}
