function hcCMHesapla() {
    const span = parseFloat(document.getElementById('hc-cm-span').value);
    const rise = parseFloat(document.getElementById('hc-cm-rise').value);
    const overhang = parseFloat(document.getElementById('hc-cm-overhang').value) / 100;

    if (isNaN(span) || isNaN(rise) || span <= 0 || rise <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const run = span / 2;
    const angleRad = Math.atan(rise / run);
    const angleDeg = angleRad * (180 / Math.PI);
    
    // Rafter length = sqrt(rise^2 + run^2) + overhang_adjusted
    const rafterBase = Math.sqrt(Math.pow(rise, 2) + Math.pow(run, 2));
    const rafterTotal = rafterBase + (overhang / Math.cos(angleRad));

    document.getElementById('hc-cm-rafter').innerText = rafterTotal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-cm-angle').innerText = angleDeg.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + '°';
    
    document.getElementById('hc-cm-result').classList.add('visible');
}
