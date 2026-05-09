function hcBMHesapla() {
    const steps = parseInt(document.getElementById('hc-bm-steps').value);
    const width = parseFloat(document.getElementById('hc-bm-width').value) / 100;
    const riser = parseFloat(document.getElementById('hc-bm-riser').value) / 100;
    const tread = parseFloat(document.getElementById('hc-bm-tread').value) / 100;
    const waist = parseFloat(document.getElementById('hc-bm-waist').value) / 100;

    if (isNaN(steps) || isNaN(width) || isNaN(riser) || isNaN(tread) || isNaN(waist)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Volume of steps (triangles)
    const stepsVolume = (riser * tread / 2) * width * steps;
    
    // Volume of waist (slanting plate)
    // Slant length = sqrt(riser^2 + tread^2) * steps
    const slantLength = Math.sqrt(Math.pow(riser, 2) + Math.pow(tread, 2)) * steps;
    const waistVolume = slantLength * width * waist;

    const totalVolume = stepsVolume + waistVolume;

    document.getElementById('hc-bm-val').innerText = totalVolume.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m³';
    document.getElementById('hc-bm-result').classList.add('visible');
}
