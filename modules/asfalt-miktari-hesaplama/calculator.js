function hcAsfaltHesapla() {
    const l = parseFloat(document.getElementById('hc-asf-length').value);
    const w = parseFloat(document.getElementById('hc-asf-width').value);
    const d = parseFloat(document.getElementById('hc-asf-depth').value);

    if (isNaN(l) || isNaN(w) || isNaN(d) || l <= 0 || w <= 0 || d <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Weight (tons) = Area * Depth * Density
    // Volume (m3) = l * w * (d/100)
    const volume = l * w * (d / 100);
    const weight = volume * 2.35; // Tons per m3

    document.getElementById('hc-asf-val').innerText = weight.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Ton';
    document.getElementById('hc-asf-result').classList.add('visible');
}
