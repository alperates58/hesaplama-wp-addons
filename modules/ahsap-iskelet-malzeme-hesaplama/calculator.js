function hcAIMHesapla() {
    const length = parseFloat(document.getElementById('hc-aim-length').value);
    const spacingCm = parseFloat(document.getElementById('hc-aim-spacing').value);
    const corners = parseInt(document.getElementById('hc-aim-corners').value) || 0;

    if (isNaN(length) || isNaN(spacingCm) || length <= 0 || spacingCm <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Studs = (Length / Spacing) + 1, plus 2 extra per corner (general practice)
    const spacingM = spacingCm / 100;
    const baseStuds = Math.ceil(length / spacingM) + 1;
    const totalStuds = baseStuds + (corners * 2);

    // Plates: 1 bottom, 2 top
    const totalPlates = length * 3;

    document.getElementById('hc-aim-studs').innerText = totalStuds.toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-aim-plates').innerText = totalPlates.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    
    document.getElementById('hc-aim-result').classList.add('visible');
}
