function hcHipRoofHesapla() {
    const W = parseFloat(document.getElementById('hc-hr-width').value);
    const L = parseFloat(document.getElementById('hc-hr-length').value);
    const pitchDeg = parseFloat(document.getElementById('hc-hr-pitch').value);

    if (!W || !L || !pitchDeg) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    const pitchRad = (pitchDeg * Math.PI) / 180;
    
    // Flat Area
    const flatArea = W * L;
    // Sloped Area = Flat Area / cos(pitch)
    const slopedArea = flatArea / Math.cos(pitchRad);
    
    // Rafter Length (Common) = (W/2) / cos(pitch)
    const rafterLen = (W / 2) / Math.cos(pitchRad);

    document.getElementById('hc-hr-res-area').innerText = slopedArea.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-hr-res-rafter').innerText = rafterLen.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-hip-roof-result').classList.add('visible');
}
