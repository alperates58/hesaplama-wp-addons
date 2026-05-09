function hcCEHesapla() {
    const rise = parseFloat(document.getElementById('hc-ce-rise').value);
    const run = parseFloat(document.getElementById('hc-ce-run').value);

    if (isNaN(rise) || isNaN(run) || run <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const percent = (rise / run) * 100;
    const angleRad = Math.atan(rise / run);
    const angleDeg = angleRad * (180 / Math.PI);

    document.getElementById('hc-ce-percent').innerText = '%' + percent.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-ce-angle').innerText = angleDeg.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + '°';
    
    document.getElementById('hc-ce-result').classList.add('visible');
}
