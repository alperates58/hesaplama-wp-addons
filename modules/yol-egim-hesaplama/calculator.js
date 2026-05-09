function hcRoadSlopeHesapla() {
    const rise = parseFloat(document.getElementById('hc-rs-rise').value) || 0;
    const run = parseFloat(document.getElementById('hc-rs-run').value) || 1;

    if (run === 0) return;

    const slopePerc = (rise / run) * 100;
    const angleRad = Math.atan(rise / run);
    const angleDeg = angleRad * (180 / Math.PI);

    document.getElementById('hc-res-rs-perc').innerText = '%' + slopePerc.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-res-rs-deg').innerText = angleDeg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '°';
    
    document.getElementById('hc-road-slope-result').classList.add('visible');
}
