function hcAciliKesimHesapla() {
    const wallAngle = parseFloat(document.getElementById('hc-ac-wall').value);
    const count = parseInt(document.getElementById('hc-ac-count').value);

    if (isNaN(wallAngle) || isNaN(count) || count < 2) {
        alert('Lütfen geçerli bir açı ve en az 2 parça giriniz.');
        return;
    }

    // Standard miter: (180 - wallAngle) / 2
    // If multiple segments: (180 - wallAngle) / (2 * segments?) 
    // Actually for a corner of X degrees, each cut is (180 - X) / 2 from the face.
    // For a frame: 360 / (2 * corners)
    
    const miterAngle = (180 - wallAngle) / count;

    document.getElementById('hc-ac-val').innerText = miterAngle.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '°';
    document.getElementById('hc-ac-result').classList.add('visible');
}
