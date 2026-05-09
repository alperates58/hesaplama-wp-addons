function hcToggleTankInputs() {
    const shape = document.getElementById('hc-tc-shape').value;
    document.getElementById('hc-tc-cyl-inputs').style.display = shape === 'cyl' ? 'block' : 'none';
    document.getElementById('hc-tc-rect-inputs').style.display = shape === 'rect' ? 'block' : 'none';
}

function hcTankCapHesapla() {
    const shape = document.getElementById('hc-tc-shape').value;
    let volume = 0;

    if (shape === 'cyl') {
        const d = parseFloat(document.getElementById('hc-tc-dia').value) || 0;
        const h = parseFloat(document.getElementById('hc-tc-h').value) || 0;
        volume = Math.PI * Math.pow(d / 2, 2) * h;
    } else {
        const l = parseFloat(document.getElementById('hc-tc-l').value) || 0;
        const w = parseFloat(document.getElementById('hc-tc-w').value) || 0;
        const h = parseFloat(document.getElementById('hc-tc-rh').value) || 0;
        volume = l * w * h;
    }

    const liters = volume * 1000;

    document.getElementById('hc-res-tc-val').innerText = volume.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³';
    document.getElementById('hc-res-tc-lit').innerText = Math.round(liters).toLocaleString('tr-TR') + ' Litre';
    
    document.getElementById('hc-tank-cap-result').classList.add('visible');
}
