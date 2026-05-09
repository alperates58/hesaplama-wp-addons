function hcCKMetHesapla() {
    const area = parseFloat(document.getElementById('hc-ckmet-area').value);
    const pitchPercent = parseFloat(document.getElementById('hc-ckmet-pitch').value);

    if (isNaN(area) || isNaN(pitchPercent) || area <= 0 || pitchPercent < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // pitch = rise/run -> angle = atan(pitch/100)
    const angleRad = Math.atan(pitchPercent / 100);
    const actualArea = area / Math.cos(angleRad);

    document.getElementById('hc-ckmet-val').innerText = actualArea.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m²';
    document.getElementById('hc-ckmet-result').classList.add('visible');
}
